<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Auth;
use Password;

class ForgotpaswordController extends Controller
{
    use SendsPasswordResetEmails;

    function __construct(){
        $this->middleware('guest:admins');
    }
    // to show the form where admin will input the email for the password to be reset
    public function showLinkForm(){
        return view('auth.passwords.email', [
            'title' => 'Admin Password Reset',
            'passwordEmailRoute' => 'admin.password-email'
        ]);
    
    }
    // broker will use the password settings for admins guard in auth.php file
    public function broker(){
        
        return Password::broker('admins');
    
    }

    // get the guard to be used for authentication after Password reset

    public function guard(){
        
        return Auth::guard('admins');
    
    }

}
