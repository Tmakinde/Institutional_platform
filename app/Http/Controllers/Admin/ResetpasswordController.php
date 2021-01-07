<?php

namespace App\Http\Controllers\Admin;

use Auth;
use Password;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;

class ResetpasswordController extends Controller
{
    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/admin/';

    /**
     * Only guests for "admin" guard are allowed except
     * for logout.
     * 
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:admin');
    }

    public function showResetForm(Request $request, $token = null){
        return view('auth.passwords.reset',[
            'title' => 'Reset Admin Password',
            'passwordUpdateRoute' => 'admin.password-update',
            'token' => $token,
        ]);
    }
    /**
     * Get the broker to be used during password reset.
     *
     * @return \Illuminate\Contracts\Auth\PasswordBroker
     */
    protected function broker(){
        return Password::broker('admins');
    }

    /**
     * Get the guard to be used during password reset.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard(){
        return Auth::guard('admins');
    }

}
