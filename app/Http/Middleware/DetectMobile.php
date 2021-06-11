<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Contracts\Session\Session;
use Jenssegers\Agent\Agent;

class DetectMobile
{
    protected $agent;

    protected $session;

    public function __construct(Agent $agent, Session $session) {
        $this->agent = $agent;
        $this->session = $session; 
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(!$this->session->exists('mobile')) {
            if  ($this->agent->isMobile() || $this->agent->isTablet()) {
                $this->session->put('mobile', true);
            } else {
                $this->session->put('mobile', false);
            }
        }

        $response = $next($request);

        return $response->setVary('User-Agent');
    }
}
