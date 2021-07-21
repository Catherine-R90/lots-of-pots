<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Route;
use App\Http\Requests\RegisterUser;
use App\Http\Requests\EditUser;
use App\Http\Requests\Login;
use App\Http\Requests\ResetPassword;
use App\Http\Controllers\PageController;
use Cartalyst\Sentinel\Native\Facades\Sentinel;
use Cartalyst\Sentinel\Laravel\Facades\Activation;
use Cartalyst\Sentinel\Laravel\Facades\Reminder;
use Jenssegers\Agent\Agent;
use Illuminate\Support\Facades\Mail;
use App\Mail\PasswordReset;

class UserController extends Controller
{
    // CUSTOMER VIEWS
    public function UserLoginView(Request $request) {
        if($user = Sentinel::check()) {
            return redirect()->to('/');
        } else {
            $url = $request->input('current_url');
            $agent = new Agent;
            return view('users.user_login', [
                'url' => $url,
                'agent' => $agent,
            ]);
        }
    }

    public function UserRegisterView() {
        $agent = new Agent;
        return view('users.user_register', [
            'agent' => $agent,
        ]);
    }

    public function UserDetailsView($id) {
        $agent = new Agent;

        if($user = Sentinel::check()) {
            return view('users.user_details', [
                'agent' => $agent,
                'user' => $user,
            ]);
        } else {
            return redirect()->to('/');
        }
    }

    // ADMIN VIEWS
    public function AdminLoginView() {       
        if($user = Sentinel::check()) {
            if(Sentinel::inRole('admin')) {
                return redirect()->to('/admin/overview');
            }
            elseif(Sentinel::inRole('user')) {
                return redirect()->to('/');
            }
        } else {
            return view('users.admin_login');
        }
    }

    public function AdminRegisterView() {
        return view('users.admin_register');
    }

    public function AdminManageUserView() {
        if($user = Sentinel::check()) {
            if(Sentinel::inRole('admin')) {
                return view('admin.users.admin_users', [
                    'user' => $user,
                ]);
            }
            elseif(Sentinel::inRole('user')) {
                return redirect()->to('/');
            }
        } else {
            return view('users.admin_login');
        }
    }

    public function AdminActivatedUsersView() {        
        $role = Role::where('slug', 'admin')->first();
        $users = $role->user()->get();

        if($user = Sentinel::check()) {
            if(Sentinel::inRole('admin')) {
                return view('admin.users.activated_users', [
                    'users' => $users,
                ]);
            }
            elseif(Sentinel::inRole('user')) {
                return redirect()->to('/');
            }
        } else {
            return view('users.admin_login');
        }        
    }

    public function AdminNoneActivatedUsersView() {        
        $users = User::all();

        if($user = Sentinel::check()) {
            if(Sentinel::inRole('admin')) {
                return view('admin.users.none_activated_users', [
                    'users' => $users,
                ]);
            }
            elseif(Sentinel::inRole('user')) {
                return redirect()->to('/');
            }
        } else {
            return view('users.admin_login');
        }
    }

    public function AdminEditUserView($id) {
        $id = Sentinel::findById($id);

        if($user = Sentinel::check()) {
            if(Sentinel::inRole('admin')) {
                if($user->id == $id->id) {
                    return view('admin.users.edit_user', [
                        'user' => $user
                    ]);
                }
            }
            elseif(Sentinel::inRole('user')) {
                return redirect()->to('/');
            }
        } else {
            return view('users.admin_login');
        }
        
    }

    public function ForgottenPasswordView() {
        return view('users.forgotten_password');
    }

    public function PasswordResetView() {
        return view('users.reset_password');
    }

    // FUNCTIONS
    // LOGIN AND LOGOUT
    public function Login(Login $request) {
        $email = $request->input('email_address');
        $password = $request->input('password');
        $id = User::where('email', $email)->value('id');
        if($id == null) {
            return redirect()->back()
            ->withErrors(['Email or password not recognised. Please try again.']);
        }
        $user = Sentinel::findById($id);

        $credentials = [
            'email' => $email,
            'password' => $password
        ];

        if(Activation::completed($user) == false) {
            return redirect()->back()->withErrors(['Your account has not yet been activated. Contact your line manager.']);
        }

        $autheticate = Sentinel::authenticate($credentials);

        if($autheticate == true) {
            
            Sentinel::login($user);

            if(Sentinel::inRole('admin') == true) {
                return redirect()->action([
                    PageController::class, 'AdminOverviewView'
                ]);
            }

            elseif(Sentinel::inRole('user' == true)) {
                if($request->input('url') != null) {
                    $url =  $request->input('url');
                    return redirect()->to($url);
                } else {
                    return redirect()->to('/');
                }
            }
        } else {
            return redirect()->back()
            ->withErrors(['Email or password not recognised. Please try again.']);
        }     
    }

    public function Logout(Request $request) {
        if(Sentinel::inRole('admin')) {
            $admin = true; 
        }
        elseif(Sentinel::inRole('user')) {
            $admin = false;
        }

        Sentinel::logout();
        
        if($admin == true) {
            return redirect()->action([
                UserController::class, 'AdminLoginView'
            ]);
        }
        elseif($admin == false) {
            return redirect()->action([
                PageController::class, 'HomepageView'
            ]);
        }
        
    }

    public function RegisterAdmin(RegisterUser $request) {
        // REGISTER
        $first_name = $request->input('first_name');
        $second_name = $request->input('second_name');
        $email = $request->input('email_address');
        $password = $request->input('password');

        $credentials = [
            'first_name' => $first_name,
            'last_name' => $second_name,
            'email' => $email,
            'password' => $password
        ];

        $user = Sentinel::register($credentials, false);

        // ROLES
        $role = Sentinel::findRoleBySlug('admin');
        if($role == null) {
            $role = Sentinel::getRoleRepository()->createModel()->create([
                'name' => 'Admin',
                'slug' => 'admin',
                'permissions' => [
                    'user.create' => true,
                    'user.delete' => true,
                    "user.view" => true,
                    "user.update" => true,
                ]
            ]);
        }

        $user->roles()->attach($role);

        return redirect()->action([UserController::class, 'AdminLoginView'])->withErrors(['Once the admin has activated your account you may login.']);
    }

    public function ActivateUser($id) {
        $user = Sentinel::findById($id);
        $create = Activation::create($user);
        $code = $create->code;
        Activation::complete($user, $code);

        return redirect()->back();
    }

    public function DeleteUser($id) {
        $user = Sentinel::findById($id);
        $user->delete();
        return redirect()->back();
    }

    public function RegisterUser(RegisterUser $request) {
        // REGISTER
        $first_name = $request->input('first_name');
        $second_name = $request->input('second_name');
        $email = $request->input('email_address');
        $password = $request->input('password');

        $credentials = [
            'first_name' => $first_name,
            'last_name' => $second_name,
            'email' => $email,
            'password' => $password
        ];

        $user = Sentinel::registerAndActivate($credentials);

        // ROLES
        $role = Sentinel::findRoleBySlug('user');
        if($role == null) {
            $role = Sentinel::getRoleRepository()->createModel()->create([
                'name' => 'User',
                'slug' => 'user',
                'permissions' => [
                    'user.create' => false,
                    'user.delete' => false,
                    "user.view" => false,
                    "user.update" => false,
                ]
            ]);
        }

        $user->roles()->attach($role);

        return redirect()->action([
            UserController::class, 'UserLoginView'
        ]);
    }

    public function AdminEditUser($id, EditUser $request) {
        $user = Sentinel::findById($id);
        if($request->input('first_name') != null) {
            $f_name = $request->input('first_name');
        } else {
            $f_name = $user->first_name;
        }
        if($request->input('last_name') != null) {
            $l_name = $request->input('last_name');
        } else {
            $l_name = $user->last_name;
        }
        if($request->input('email') != null) {
            $email = $request->input('email');
        } else {
            $email = $user->email;
        }
        if($request->input('password') != null) {
            $password = $request->input('password');
        } else {
            $password = $user->password;
        }
    
        $credentials = [
            'first_name' => $f_name,
            'last_name' => $l_name,
            'email' => $email,
            'password' => $password
        ];

        Sentinel::update($user, $credentials);

        return redirect()->to('/admin/users');
    }

    public function PasswordResetEmail(Request $request) {
        $email = $request->input('email');
        $id = User::where('email', $email)->value('id');

        if($id == null) {
            return redirect()->back()->withErrors('Email not recognised. Please try again.');
        }

        Reminder::removeExpired();

        $user = Sentinel::findById($id);
        $reminder = Reminder::create($user);

        Mail::to($email)->send(new PasswordReset($user, $reminder));

        return redirect()->to('/login')->withErrors('Password reset email has been sent.');
    }

    public function ResetPassword(ResetPassword $request) {
        $email = $request->input('email');
        $code = $request->input('code');
        $password = $request->input('password');
        $id = User::where('email', $email)->value('id');

        if($id == null) {
            return redirect()->back()->withErrors('Something went wrong. Please check your email and reminder code are correct and try again.');
        }
        
        $user = Sentinel::findById($id);

        if($reminder = Reminder::complete($user, $code, $password)) {
            return redirect()->to('/login')->withErrors('Password reset successful!');
        } else {
            return redirect()->back()->withErrors('Something went wrong. Please check your email and reminder code are correct and try again.');
        }
    }
}
