<?php

namespace App\Http\Middleware;

use Closure;
use App\Admin;
use App\Institution;
use Illuminate\Support\Facades\Route;

class Subdomain
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    
    public function handle($request, Closure $next)
    {
        /** All this is to compare the subdomain and check for the subdomain name in 
         *  
         *  the institution table if it matches any username.
         * **/
        $domain = $request->getHost();
        if(str_is('*.'.env('APP_NAME', 'localhost').'', $domain)){
            $arrayUrl = explode('.', $domain);
            if (count($arrayUrl) == 2) {
                $subdomain = $arrayUrl[0];
                //$subdomain =  Route::getCurrentRoute()->getParameter('subdomain');
                $checkInstitution = Institution::where('username', $subdomain)->firstOrFail();
                $checkUsername = $checkInstitution->username;
                $request->merge([
                    'institution' => $checkUsername,
                ]);
            }
            
        }
        
        return $next($request);
    }
}
