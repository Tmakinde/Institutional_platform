<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\node;
use DB;
use App\Admin;
use App\User;
use App\Classes;
use App\Institution;
use App\Subject;
use App\Topic;
use App\Option;
use App\Question;
use Illuminate\Support\Facades\Log;

class questionController extends Controller
{
    function __construct(){
        $this->middleware('auth:web');
        ini_set('memory_limit','-1');
    }

    public function view(Request $request){
        $topic_id = $request->topic_id;
        if($topic_id == null){
            return redirect()->to('/Mycourses');
        };
        $topic_questions =  Question::where(['topic_id' => $topic_id])->get();

        if(!$topic_questions->isEmpty()){
            $listOfQuestions = array();
            $listOfQuestionsId = array();

            $listOfOptions = array();
            //$listOfAnswers = [];// 
            $listOfMarks = array();
            for ($i=0; $i < count($topic_questions); $i++) { 
                array_push($listOfQuestions,$topic_questions[$i]->content);
                array_push($listOfOptions,array());

                $options = Option::where('question_id',$topic_questions[$i]->id)->first();
                array_push($listOfOptions[$i], $options->option_A);//push 
                array_push($listOfOptions[$i], $options->option_B);
                array_push($listOfOptions[$i], $options->option_C);
                array_push($listOfOptions[$i], $options->option_D);

               // array_push($listOfAnswers ,$topic_questions[$i]->answer);
               // $listOfAnswers[$i+1] = $topic_questions[$i]->answer;
                array_push($listOfMarks ,$topic_questions[$i]->mark);
            }
            
            $countArray = count($listOfQuestions);

            $array= $listOfQuestions;

            $countArray = count($array);
            
            $paginator = new pagination();// create an instance of pagination

            $paginator->setCurrent($array[0]); // set current paginator value

            $currentPage = $paginator->getCurrent()->getItem();

            return view('User.test')->with([
                'currentPage' => $currentPage,
                'topic_id' => $topic_id,
                'listOfOptions' => $listOfOptions,
                'countArray' => $countArray,
            ]);
        }else{
            Log::alert("Some went wrong");
            return response()->json([
                'message'=>'No questions yet',
            ]);
        }
        
    }

    public function getQuestions(Request $request){

        $topic_id = $request->topic_id;
        $topic_questions =  DB::table('questions')->where( ['topic_id' => $topic_id])->get();
        $listOfQuestions = array();
        $listOfAnswers = [];// 
        $listOfMarks = [];
        $listOfOptions = array();
        
        for ($i=0; $i < count($topic_questions); $i++) { 
            array_push($listOfQuestions,$topic_questions[$i]->content);
            array_push($listOfOptions,array());
            $options = Option::where('question_id',$topic_questions[$i]->id)->first();
            array_push($listOfOptions[$i], $options->option_A);//push 
            array_push($listOfOptions[$i], $options->option_B);
            array_push($listOfOptions[$i], $options->option_C);
            array_push($listOfOptions[$i], $options->option_D);

           // array_push($listOfAnswers ,$topic_questions[$i]->answer);
            $listOfAnswers[$i+1] = $topic_questions[$i]->answer;
            $listOfMarks[$i+1] = $topic_questions[$i]->mark;
            //array_push($listOfMarks ,$topic_questions[$i]->mark);
        }
        $answerObject = $listOfAnswers;
        $markObject = $listOfMarks;
        session()->put('answerObject',$answerObject);
        session()->put('markObject', $markObject);
        $array= $listOfQuestions;
        $countArray = count($array);
        
        $paginator = new pagination();// create an instance of pagination

        $counter = $request->counter;// to count pagination

        $paginator->setCurrent($array[$counter-1]); // set current paginator value


        for ($i=1; $i < $countArray; $i++) { 

            $action = $request->action; // receives either prev or next

            if($action == "next"){

                $paginator->setNext($array[$counter]);// set next page

                $currentPage = $paginator->getCurrent()->getItem(); // get current page

                $nextPage = $paginator->getNext()->getItem(); // get next page

                $paginator->setCurrent($paginator->getNext()->getItem()); // set the next page as current page
                
                return response()->json([
                    'nextPage' => $nextPage,
                    'listOfQuestions' => $listOfQuestions,
                    'listOfOptions' => $listOfOptions[$counter],
                ]);
            
            }elseif ($action == "prev" and $counter != 0) {
                $previousPage = $paginator->setCurrent($array[$counter-1]); // brings previous page and set it as curent page

                $getPreviousPage = $paginator->getCurrent()->getItem();// get previous page
                
                return response()->json([
                    'previousPage' => $getPreviousPage, 
                    'listOfOptions' => $listOfOptions[$counter-1],
                ]);

            }else{

                $counter++;

            }

        }

    }

    public function mark(Request $request){
        $option_selected = $request->option_selected;
        $answerObject = session()->get('answerObject');
        $markObject = session()->get('markObject');
        $totalQuestions = $request->counter;
        $score = 0;
        for ($i=1; $i <= $totalQuestions ; $i++) {       
            if ($option_selected[$i] == $answerObject[$i]) {
                $score += $markObject[$i];
            }
                      
        }
        session()->put('score', $score);
        return response()->json([
            "mark" =>session()->get('answerObject'),
            "option_selected" => $option_selected,
            "score" => $score,
        ]);
    }

}
