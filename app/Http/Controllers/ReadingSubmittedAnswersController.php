<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ReadingSubmittedAnswers;
use App\ReadingQuestions;
use App\ReadingAnswer;
use App\ReadingOptions;
use App\ListeningSubmittedAnswers;
use App\ListeningQuestions;
use App\ListeningAnswer;
use App\ListeningOptions;
use App\StudentResults;
use Carbon\Carbon;

class ReadingSubmittedAnswersController extends Controller
{
    public function submitReadingAnswers(Request $request, $student_id){
        // return response(['request'=>$request->all()]);
        $student=auth()->guard('api')->user();
        if ($student->role == "student" && $student->status){

            $data = $request->all();
            $answers = [];
            $listeningAnswers=[];
        
            if (isset($data)){
                // return $data;
                $studentAnswer =[
                    'student_id'=>$student->id,
                    'question_sets_id'=>intval($data['set_id']),
                    "created_at" => Carbon::now(), # new \Datetime()
                    "updated_at" => Carbon::now(),  # new \Datetime()
                ];
                StudentResults::insert($studentAnswer);

                $studentResultId=StudentResults::orderBy('id','desc')->first()['id'];

                $i=0;
                $submitted_answer=ReadingSubmittedAnswers::orderBy('id','desc')->first();
                $submitted_answer_id;
                if(isset($submitted_answer)){
                    $submitted_answer_id=$submitted_answer['id']+1;
                }
                else{
                    $submitted_answer_id=1;
                }
                // return $submitted_answer_id;
                foreach ($data['reading_answer_id'] as $answer){
                    // echo($data['reading_question_id'][$i]);
                    $question = ReadingQuestions::find($data['reading_question_id'][$i]);
                    $question_id = $question->id;
                    
                    $answer_option_id = $question->readingAnswer->reading_options_id;
                    // return $answer;
                    // $student_id = $student->id;
                    array_push($answers, [
                        'id' => $submitted_answer_id,
                        'reading_question_id' => $question_id,
                        'reading_answer_id' => intval($answer),
                        'student_id' =>$student->id,
                        'answer_option_id' => $answer_option_id,
                        'set_id'=>intval($data['set_id']),
                        "created_at" => Carbon::now(), # new \Datetime()
                        "updated_at" => Carbon::now(),  # new \Datetime()
                        'student_result_id' => $studentResultId
                    ]);
                    $i++;
                    $submitted_answer_id ++;
                } 
                // return $answers;

                $j=0;

                $listening_submitted_answer=ListeningSubmittedAnswers::orderBy('id','desc')->first();
                $listening_submitted_answer_id;
                if(isset($listening_submitted_answer)){
                    $listening_submitted_answer_id=$listening_submitted_answer['id']+1;
                }
                else{
                    $listening_submitted_answer_id=1;
                }

                foreach ($data['listening_answer_id'] as $answer){
                    // return($data['listening_question_id'][$j]);
                    $question = ListeningQuestions::find($data['listening_question_id'][$j]);
                    $question_id = $question->id;
                    $answer_option_id = $question->listeningAnswer->listening_options_id;
                    // $student_id = $student->id;
                    array_push($listeningAnswers, [
                        'id' => $listening_submitted_answer_id,
                        'listening_question_id' => $question_id,
                        'listening_answer_id' => intval($answer),
                        'student_id' =>$student->id,
                        'answer_option_id' => $answer_option_id,
                        'set_id'=>intval($data['set_id']),
                        "created_at" => Carbon::now(), # new \Datetime()
                        "updated_at" => Carbon::now(),  # new \Datetime()
                        'student_result_id' => $studentResultId
                    ]);
                    $j++;
                    $listening_submitted_answer_id ++;
                }
                // return $listeningAnswers;
                ReadingSubmittedAnswers::insert($answers); 
                ListeningSubmittedAnswers::insert($listeningAnswers);
                return response(['status'=>true, 'message'=>'Answers submitted successfully']);
            }

            else{
                return response(['status'=>false, 'message'=>'No answers found']);
            }
        }
        else{
            return response(['status'=> false, 'message'=>'Please log in as student to submit the answers']);
        }
    }
}
