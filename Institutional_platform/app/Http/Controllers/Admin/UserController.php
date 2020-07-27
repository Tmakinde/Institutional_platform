<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin;
use App\Classes;
use App\Institution;
use Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct(){
        $this->middleware('guest:admins');
    }
    
    protected function validator(array $data ){
        return Validator::make($data, [

            'class'=> ['required'], 

        ]);
    }

    protected function register(array $data ){
        return Classes::create([
           'class' => $data['class'],

           'institution_id' => Auth::user()->institution_id,
        ]);
    }
    //note that user are refer to as the student

    public function createUser(Request $request) // create user for each class by the admin of the current institution
    {
    
        $newUser = new User;

        $newUser->name = $request->name;

        $newUser->email = $request->email;
        
        $newUser->password = $request->password;

        // request for the id of the class to which the student is to be added to from the url

        $newUser->classes_id = $request->id;
        
        $newUser->save();

        
    }

    public function editUser($id)
    {
        $currentAdmin = Auth::user();
        /*
            getting current admin institution id
        */
        $adminInstitutionId = $currentAdmin->institution_id;
        /*
            getting current admin institution details
        */
        $currentInstitution = Institution::where('id', $adminInstitutionId)->first();
        /*
            getting users using the current admin under the admin institution
        */
        $institutionUsersDetails = $currentInstitution->users()->first();
       // $institution = Institution::all();
    
        return view('Admin.Dashboard', compact('institutionUsersDetails', 'currentInstitution'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
      //  $user = User::where('id', $request->id)->first();
    //    $user->email = $request->username;
     //   $user->password = $request->password;
    //    $user->save();
    //    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function addClass(Request $request)
    {
        // allow admin to create a new clas that will be register with admin 
        $validator =$this->validator($request->all());
        if($validator->passes()){

            $this->register($request->all());

        }else{
            return $validator->errors();
        }
    }

    public function deleteClass(Request $request)
    {
        // allow admin to delete student
        $class = Classes::where('id', $request->id)->first();
        $class->delete();
  
    }

}

