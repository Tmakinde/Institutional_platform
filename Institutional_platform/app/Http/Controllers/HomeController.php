<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Response;
use App\Http\Controllers\Controller;
use App\Admin;
use App\User;
use App\Classes;
use App\Institution;
use App\Subject;
class HomeController extends Controller
{
    //
    public function index(){
        $currentUser = Auth::user();
        $currentInstitution = Institution::where('id', $currentUser->institution_id)->first();
        $userClass = Classes::where('id', $currentUser ->classes_id)->first();
        $userClassSubjects = $userClass->subjects;
     //   dd($currentInstitution);
        return view('User.welcome', compact('currentUser', 'currentInstitution','userClassSubjects','userClass'));
    }

    public function createUserSubject(Request $resquest){
      
        $currentUser = User::where('id', Auth::user()->id)->first();
        $subjectClicked = $resquest->get('subject');
        $currentUser->subjects()->detach();
        if(!empty($subjectClicked)){
            foreach ($subjectClicked  as $key => $value) {
                
                    $userClassSubjects = Subject::where('Subjectname', $value)->first();
                    $currentUser->subjects()->attach($userClassSubjects->id);
                }
                
                
            //    $currentUser->subjects->each(function($subject){
             //       if($subject->pivot->subject_id != $userClassSubjects->id){
                //        $currentUser->subjects()->attach($userClassSubjects->id);
                //    }

             //   });
            
            }
            return redirect()->back();
        
      //  dd($subjectClicked);
    }

    public function displayUserSubjects(Request $resquest){
        $currentUser = User::where('id', Auth::user()->id)->first();
        $userSubjects = $currentUser->subjects;
        
       // dd($userSubjects);
        $currentInstitution = Institution::where('id', $currentUser->institution_id)->first();
        return view('User.subject', compact('currentInstitution','userSubjects'));
    }

}
