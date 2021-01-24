<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Institution;
use App\Exam;
use App\Timer;

class API extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        $institution = Institution::paginate(3);

        return response()->json([
            "institution" => $institution,
        ]);
    }
    // sorting an API

    public function sort(Request $request){
        $sortInstitution = Institution::query();
        
        $id = $request->sorted;
        
        $username = $request->sort;
        
        $sortArray = [$username, $id];
            
        $order = ['asc', 'desc'];
        
        //$InstitutionByUsername = Institution::query()->orderBy($sort, 'asc')->paginate(15);
        
        for ($i=0; $i < count($sortArray); $i++) {
            $checkerForOrder = \starts_with($sortArray[$i], '-') ? $order[1] : $order[0];   
            if($checkerForOrder){
                $key = \ltrim($sortArray[$i], '-');
            }

            $sortInstitution->orderBy($sortArray[$i], $checkerForOrder);
        }
        
        return response()->json([
            "institution" => $sortInstitution->paginate(10),
        ]);

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // filter result
    public function filter(Request $request){
        if ($request->has('filter')){
            list($criteria, $value) = explode(':', $request->filter);

            $sortInstitution = Institution::query()->where($criteria,'>',  $value);
            return response()->json([
                "result" => $sortInstitution->paginate(3),
            ]);
        }
    }

    public function search(Request $request){
        if ($request->has('search')){
            list($criteria, $value) = explode(':', $request->search);
            
            $sortInstitution = Institution::query()->where($criteria, 'LIKE', "%{$value}%");
            return response()->json([
                "result" => $sortInstitution->paginate(3),
            ]);
        }
    }

    // retrive exam time from database
    public function time(Request $request)
    {
        $topic_id = $request->topic_id;
        $exam = Exam::where('topic_id', $topic_id)->first();
        $hour = $exam->hrs;
        $min = $exam->min;
        $sec = $exam->sec;
        $time = [
            'hour' => $hour,
            'min' => $min,
            'sec' => $sec,
        ];

        return response()->json([
            "time" => $time,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // to update time for user that is unable to complete a particular test
    public function updateTime(Request $request)
    {
        
        $topic_id = $request->topic_id;
        $userId = auth()->user()->id;
        $Exam = Exam::where("topic_id", $topic_id)->first();
        $examId = $Exam->id;
        $hour = $request->hrs;
        $minutes = $request->min;
        $seconds = $request->sec;
        
        $timerForCurrentUser = new Timer;
        $timerForCurrentUser->hrs = $hour;
        $timerForCurrentUser->min= $minutes;
        $timerForCurrentUser->sec = $seconds;
        $timerForCurrentUser->user_id = $userId;
        $timerForCurrentUser->exam_id = $examId;
        $timerForCurrentUser->save();

        return response()->json([
            "success" => "success",
        ]);
    }

    public function deleteTime(Request $request)
    {
        $userId = auth()->user()->id;
        $Exam = Exam::where("topic_id", $topic_id)->first();
        $examId = $Exam->id;
        $timerForCurrentUser = Timer::where('user_id', $userId)->where('exam_id', $examId)->first();
        $timerForCurrentUser->delete();
        
        return response()->json([
            "success" => "timer for current user successfully deleted",
        ]);
    }

    public function checker(Request $request){
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

            $public_id = "Myinstitution Images/".time().$k; // for cloudinary piblic id;

            $path = public_path() . $image_name;
            file_put_contents($path, $data);

            $filename = $path;

            // Upload file to cloudinary for summernote access
            $cloudinary_image = \Cloudder::upload($filename, $public_id);
            dd(\Cloudder::getResult()['url']);
            
            $img->removeAttribute('src');
            $img->setAttribute('src', \Cloudder::getResult()['url']);
            \File::delete($path);
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
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
}
