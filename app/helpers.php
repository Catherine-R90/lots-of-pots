<?php
use Illuminate\Support\Facades\DB;

if(!function_exists('is_mobile')) {
    function is_mobile() {
        $session = app()->make('Illuminate\Contracts\Session\Session');
        return $session->get('mobile') == true;
    }
}

if(!function_exists('is_desktop')) {
    function is_desktop() {
        $session = app()->make('Illuminate\Contracts\Session\Session');
        return $session->get('mobile') == false;
    }
}

class dateHelper {
    public static function dateFormat($value) {
        return date('d.m.Y', strtotime($value));
    }
}

class userHelper {
    public static function activated($user) {
        $completed = DB::table('activations')->where('user_id', $user->id)->value('completed');
        if($completed == 1) {
            return true;
        }
    }

    public static function notActivated($user) {
        $completed = DB::table('activations')->where('user_id', $user->id)->value('completed');
        if($completed == 0) {
            return true;
        }
    }
}

?>