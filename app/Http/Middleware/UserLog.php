<?php

namespace App\Http\Middleware;

use App\Helper\IP;
use App\Models\BannedIp;
use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class UserLog
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
		
		if( ( empty(request()->headers->get("referer")) || is_null(request()->headers->get("referer"))) && empty(request()->session()->put('first_input_referer')) ){
			$url = ((!empty($_SERVER['HTTPS'])) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
			request()->session()->put('first_input_referer', $url);
		} else {
			$url = '';
		}
		
		//echo $url;
		
        if(IP::isBanned($request->ip())){
            abort(404);
        }
        if(strpos($request->url(),"admin")){
            return $next($request);
        }
        if(Auth::check() && Auth::user() instanceof User){
            Auth::user()->log()->create(
                [
                    "ip" => $request->ip(),
                    "referrer" => $request->session()->get("first_input_referer"),
                    "url" => $request->url(),
                    "user_agent" => $request->userAgent()
                ]
            );
        }else{
            \App\Models\UserLog::create([
                "ip" => $request->ip(),
                "referrer" => $request->session()->get("first_input_referer"),
                "url" => $request->url(),
                "user_id" => 0,
                "user_agent" => $request->userAgent()
            ]);
        }



        return $next($request);
    }
}
