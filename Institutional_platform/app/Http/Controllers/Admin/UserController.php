<?php

namespace App\Http\Controllers\Admin;

use Auth;
use Illuminate\Http\Request;
use Response;
use App\Http\Controllers\Controller;
use App\Admin;
use App\User;
use App\Classes;
use App\Institution;
use App\Subject;
use App\Topic;
use Hash;
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
        $this->middleware('auth:admins');
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

    public function Users(Request $request){
        $currentAdminInstitutionId = Auth::user()->institution_id;
        $currentInstitution = Institution::where('id', $currentAdminInstitutionId)->first();
        $currentClass = Classes::where('id',$request->id)->where('institution_id', Auth::user()->institution_id)->first();
        $listStudents = $currentClass->users;

        return view('Admin.User')->with([
            'currentClass'=>$currentClass,
            'listStudents'=>$listStudents,
            'currentInstitution'=>$currentInstitution
        ]);

    }

    public function createUser(Request $request) // create user for each class by the admin of the current institution
    {
        $validator = Validator::make($request->all(), [
            $request->name => 'required',
            $request->email => 'required',
            $request->password => 'required',
        ]);
        if($validator->fails()){
            $currentAdminInstitutionId = Auth::user()->institution_id;
            $newUser = new User;

            $newUser->name = $request->name;

            $newUser->email = $request->email;
            
            $newUser->password = Hash::make($request->password);

        // request for the id of the class to which the student is to be added to from the url

        $newUser->classes_id = $request->id;
        
        $newUser->institution_id = $currentAdminInstitutionId;
        $newUser->save();
        
        return response()->json([
            'Success' => "User successfully added",
        ]);
        }
       
        return response()->json([
            'Error' => 'Unable to Submit your details',
        ]);
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
    public function destroy(Request $request)
    {
        //
        $class = User::where('id', $request->id)->first();
        $class->delete();
        return redirect()->back();
    }

    public function Class()
    {
        
        $currentAdminInstitutionId = Auth::user()->institution_id;
        $currentInstitution = Institution::where('id', $currentAdminInstitutionId)->first();
        $classes = $currentInstitution->classes;
        return view('Admin.Class')->with([
            'classes'=>$classes,
            'currentInstitution'=>$currentInstitution
        ]);
    }

    public function addClass(Request $request)
    {
        // allow admin to create a new clas that will be register with admin 
        $validator =$this->validator($request->all());
        if($validator->passes()){
            $this->register($request->all());
        }      
        return redirect()->to('/admin/ClassSection')->withErrors($validator);
    }

    public function deleteClass(Request $request)
    {
        // allow admin to delete student
        $class = Classes::where('id', $request->id)->first();
        $class->delete();
        return redirect()->to('/admin/ClassSection');
    }

    public function Subjects(Request $request)
    {
        $currentAdminInstitutionId = Auth::user()->institution_id;
        $currentInstitution = Institution::where('id', $currentAdminInstitutionId)->first();
        $currentClass = Classes::where('id', $request->id)->first();
        $subjects = $currentClass->subjects;
        return view('Admin.Subject')->with([
            'subjects'=>$subjects,
            'currentInstitution'=>$currentInstitution,
            'currentClass'=>$currentClass,
        ]);
    }

    public function createSubject(Request $request)
    {
        $subject = new Subject;
        $subject->Subjectname = $request->subjectName;
        $subject->classes_id = $request->id;
        $subject->save();
        return redirect()->back();
    }

    public function deleteSubject(Request $request)
    {
        // allow admin to delete subject
        $subject = Subject::where('id', $request->id)->first();
        $subject->delete();
        return redirect()->back();
    }

    public function createTopic(Request $request)
    {
        $subject = new Subject;
        $subject->Subjectname = $request->subjectName;
        $subject->classes_id = $request->id;
        $subject->save();
        return redirect()->back();
    }
}

   
