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
use App\Option;
use App\Exam;
use App\Question;
use DB;
use Hash;
use Validator;
use Illuminate\support\Facades\Storage;
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

      //  return response()->json([
        //    'currentClass' => "$currentClass",
          //  'listStudents'=>"$listStudents",
         //   '$currentInstitution'=>
     //   ]);

        return view('Admin.User')->with([
            'currentClass'=>$currentClass,
            'listStudents'=>$listStudents,
            'currentInstitution'=>$currentInstitution
        ]);

    }

    public function createUser(Request $request) // create user for each class by the admin of the current institution
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            "email" => 'required',
            "password "=> 'required',
        ]);
        if($request->name !== null ){
           // $validator->passes()
            $currentAdminInstitutionId = Auth::user()->institution_id;
            $newUser = new User;

            $newUser->name = $request->name;

            $newUser->email = $request->email;
            
            $newUser->password = Hash::make($request->password);

            // request for the id of the class to which the student is to be added to from the url

            $newUser->classes_id = $request->id;
            
            $newUser->institution_id = $currentAdminInstitutionId;
            $newUser->save();
            
            return redirect()->back();
        }
       
        return response()->json([
            'Error' => 'Unable to Submit your details',
        ]);
    }
        
    public function listUser(Request $request)
    {
        $currentClass = Classes::where('id',$request->id)->where('institution_id', Auth::user()->institution_id)->first();
        $listStudents = $currentClass->users;
        return response()->json([

            'listStudents' => '$listStudents',

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
    
      //  return view('Admin.Dashboard', compact('institutionUsersDetails', 'currentInstitution'));
        return response()->json([
            'institutionUsersDetails' => "$institutionUsersDetails",
            'currentInstitution' => '$currentInstitution',
        ]);
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

    public function Topic(Request $request)
    {
        $currentAdminInstitutionId = Auth::user()->institution_id;
        $currentInstitution = Institution::where('id', $currentAdminInstitutionId)->first();
        $subject = Subject::where('id',$request->id)->first();
        $topics = $subject->topics; //get topic under the subject
       // dd($topics);
        return view('Admin.Topic', compact('currentInstitution', 'subject', 'topics'));
    }

    public function createTopic(Request $request)
    {
        $content = $request->content;
        $dom = new \DomDocument();
        $dom->loadHtml($content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD); 
           
        $images = $dom->getElementsByTagName('img');
        
        foreach($images as $k => $img){
            $data = $img->getAttribute('src');

            list($type, $data) = explode(';', $data);
            list(, $data)      = explode(',', $data);
            $data = base64_decode($data);

            $image_name= "/img/" . time().$k.'.png';
            $path = public_path() . $image_name;

            file_put_contents($path, $data);
            
            $img->removeAttribute('src');
            $img->setAttribute('src', $image_name);
        }

        $content = $dom->saveHTML();

        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);
        
        $topic = new Topic;
        $topic->Title = $request->title;
        $topic->content = $content;
        $topic->subject_id = $request->id;
        if($request->has('file') && $request->file('file')->isvalid()){
            $file = $request->file('file');
        
            $filename = time().$file->getClientOriginalName();
            Storage::disk('local')->putFileAs(
                'files/'.$filename,
                $file,
                $filename
            );
           // $request->file->move(public_path('uploads'), $filename);
            $topic->filename = $filename;
        }
        $topic->save();
        return redirect()->back();

    }

    //create topic Crud
    public function topicQuestion(Request $request){
        $currentAdminInstitutionId = Auth::user()->institution_id;
        $currentInstitution = Institution::where('id', $currentAdminInstitutionId)->first();
        $currentTopic = Topic::where('id', $request->topic_id)->first();

        // get all questions
        
        // get all questions assign to topic
        $topicQuestions = $currentTopic->questions;
        
       
        return view('Admin.question', compact('currentInstitution', 'currentTopic','topicQuestions'));
    }
    
    public function createTopicQuestion(Request $request){
    //    dd($request->all());
        // save question in question table
        
        //summernote
        $content = $request->content;
        $dom = new \DomDocument();
        $dom->loadHtml($content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD); 
           
        $images = $dom->getElementsByTagName('img');
        
        foreach($images as $k => $img){
            $data = $img->getAttribute('src');

            list($type, $data) = explode(';', $data);
            list(, $data)      = explode(',', $data);
            $data = base64_decode($data);

            $image_name= "/img/" . time().$k.'.png';
            $path = public_path() . $image_name;

            file_put_contents($path, $data);
            
            $img->removeAttribute('src');
            $img->setAttribute('src', $image_name);
        }
        //end summernote
        $content = $dom->saveHTML();
        $question = new Question;
        $question->content = $content;
        $question->topic_id = $request->topic_id;
        $question->mark = $request->mark;
        $answer = $request->answer;
        switch($answer){
            case $answer == "option_A":
                $question->answer = $request->option_A;
                break;
            case $answer == "option_B":
                $question->answer = $request->option_B;
                break;
            case $answer == "option_C":
                $question->answer = $request->option_C;
                break;
            case $answer == "option_D":
                $question->answer = $request->option_D; 
                break;    
        }
        
        $question->save();
        // retrive question id from db
        if($question->save()){
            $questionsData = DB::table('questions')->where('answer', $question->answer)->where('topic_id', $request->topic_id)->first(); 
        }
        $countquestions = DB::table('questions')->where('topic_id', $request->topic_id)->count();
     //   dd($questionsData);

        // save option in option table
        $options = new Option;
        $options->question_id = $questionsData->id;
        $options->option_A = $request->option_A;
        $options->option_B = $request->option_B;
        $options->option_C = $request->option_C;
        $options->option_D = $request->option_D;
        $options->save();
        
        return response()->json([
            'success' => "sucessfully added",
            'totalquestions' => $countquestions,
        ]);
    }
   
    public function getTopicQuestionAndOption(Request $request){
        
        //get id of question 
        $id = $request->id;
        $question = Question::where('id', $id)->first();
        $option = $question->options;
        $answer = "";
        if($question->answer == $option->option_A){
            $answer = "option_A";
        }elseif($question->answer == $option->option_B){
            $answer = "option_B";
        }elseif($question->answer == $option->option_C){
            $answer = "option_C";
        }else{
            $answer = "option_D";
        }
        // get single question assign to topic
        
        return response()->json([
            'question' => $question,
            'option' => $option,
            "answer" => $answer,
        ]);
    }

    public function getAllTopicQuestionAndOption(Request $request){
        
        //get id of question 
        $id = $request->id;
        $topic= Topic::where('id', $id)->first();
        $topicQuestions = $topic->questions; 
        return response()->json([
            'topicQuestions' => $topicQuestions,
        ]);
    }

    public function updateTopicQuestionAndOption(Request $request){
        $question = Question::where('id', $request->id)->first();
        $question->content = $request->content;
        $question->mark = $request->mark;
        $answer = $request->answer;
        switch($answer){
            case $answer == "option_A":
                $question->answer = $request->option_A;
                break;
            case $answer == "option_B":
                $question->answer = $request->option_B;
                break;
            case $answer == "option_C":
                $question->answer = $request->option_C;
                break;
            case $answer == "option_D":
                $question->answer = $request->option_D;     
        }
        
        $question->save();
        
        $options = Option::where('question_id', $question->id)->first();
        $options->question_id = $question->id;
        $options->option_A = $request->option_A;
        $options->option_B = $request->option_B;
        $options->option_C = $request->option_C;
        $options->option_D = $request->option_D;
        $options->save();
        
        return response()->json([
            'success' => "Sucessfully Updated",
        ]);
    }
    public function testTable(){
        return view('Admin.table');
    }
    
    public function setExamTimeView(Request $request){
        $currentAdminInstitutionId = Auth::user()->institution_id;
        $currentInstitution = Institution::where('id', $currentAdminInstitutionId)->first();
       // $subject = Subject::where('id',$request->id)->first();
        $topics = Topic::find($request->id); //get topic under the subject
       // dd($topics);
        return view('Admin.settime', compact('currentInstitution', 'topics'));
       
    }

    public function setExamTime(Request $request, $id){
        
        try {
            $topic = Topic::find($id);
            if($topic != null ){
                $Exam = Exam::firstOrCreate(['id'=>$id]);
                $Exam->hrs = $request->hrs;
                $Exam->min = $request->min;
                $Exam->sec = $request->sec;
                $Exam->topic_id = $id;
                $Exam->is_activated = 0;
                $Exam->save();
                return redirect()->back()->with([
                    'success'=> "Exam Time Successfully set",
                ]);
            }else{
                return abort('404');
            }
        } catch (Exception $e) {
            return abort('500');
        }

       
       
    }
}

   
