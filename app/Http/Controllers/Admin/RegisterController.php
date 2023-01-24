<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Institution;
use Mail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use DB;
use Illuminate\Http\Request;
use App\Events\InstitutionRegistered;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */
    
    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    
    public function __construct()
    {
        $this->middleware('guest:admins');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255',],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8',],
            'username' => ['required', 'string', 'alpha'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return Institution::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'username' => $data['username'],
        ]);
    }

    public function showRegisterForm(){
        
        return view('Admin.Register');
    }

    public function register(Request $request){
        $input = $request->all();

        $validator = $this->validator($input);
        if($validator->passes()){
            $institution = $this->create($input)->toArray();
            /*
                get institution details so that has been insert into database
            */
            $institutions_details =  DB::table('institutions')->where(['username' => $institution['username']])->first();

            $institution['link'] = Str::random(20);

            $hashpassword = Hash::make($input['password']);
           
            // fire event when insitution register
           // event(new InstitutionRegistered($institution));

            DB::table('admins')->insert( ['username' => trim($institution['username']),'password'=>$hashpassword, 'institution_id' => $institutions_details->id]);

            $admins_details = DB::table('admins')->where(['username' => trim($institution['username']),'institution_id' => $institutions_details->id])->first();
            // insert the link into database ass token
            DB::table('admins_activations')->insert( ['token' => $institution['link'], 'admins_id' =>  $admins_details->id]);
        
        //    dd($institution['email']);
            return redirect()->back()->with('success', 'We have sent you a virtual activation code, Do not check your email...');
        }
        return redirect()->back()->withErrors($validator);
        
    }
   
    public function adminActivation($token){
        $check = DB::table('admins_activations')->where('token', $token)->first();
        if(!is_null($check)){
            //update is_activaed column to 1 so that admin can be authorize to login
            $checkadmin = DB::table('admins')->where('id', $check->admins_id)->update(['is_activated' => 1 ]);

            //delete token
            $check = DB::table('admins_activations')->where('token', $token)->delete();
            return redirect('admin/login')->with('Success', 'Admin activated successfully');

        }
        return redirect('admin/login')->with('Error', 'Your token is invalid');
    }

}





