<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\support\Facades\Auth;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use App\Admin;
use App\Institution;
use DB;
use Validator;

class LoginController extends Controller
{
    //
    use ThrottlesLogins;
    // number of attempts

    public $maxAttempts = 3;
  
    // number of minute to lock login

    public $decayMinutes = 5000;

    public function __construct(){
        $this->middleware('guest:admins')->except('logout');
    }

    public function showLoginForm(){
        
        return view('Admin.Login');
    }

    public function authenticate(Request $request){
        /* 
        using login throttle to check attempt
        */
        
        if($this->hasTooManyLoginAttempts($request)){
            //fire out lockout event
            $this->fireLockoutEvent($request);

            // send user out of lock

            //redirect the user back after lockout.
            return $this->sendLockoutResponse($request);
        }

        // keep track of user login attempts
        $this->incrementLoginAttempts($request);

        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required',
        ]);

        if ($validator->passes()) {
            $credentials = $request->only('username', 'password');
            $institutionFromSubdomain = $request->institution;
            //$checkadmin = DB::table('admins')->where('is_activated',1)->where('username', $request['username'])->where('password', $request['password'])->first();
            $checkadmin = Admin::where('username', $credentials['username'])->first();
            
            /*
            *   First check if the current admin institution username is same as the subdomain name
            *
            */

            if($checkadmin->institutions->username == $institutionFromSubdomain){
                if (Auth::guard('admins')->attempt($credentials)/* && !is_null($checkadmin)*/){
                    return redirect()->intended(route('dashboard'));
                }else{
                    return redirect()->back()->withErrors("Incorrect username or password");
                }
            }else{
                //dd($institutionFromSubdomain);
                return redirect()->back()->withErrors("Make sure you are signing in with correct username of ypur school");
            }

        }else{
            return redirect()->back()->withErrors($validator);
        }

    }

    public function logout(){
        Auth::guard('admins')->logout();
        return redirect('admin/login');
    }

    public function username(){
        return 'username';
    }
    
}

