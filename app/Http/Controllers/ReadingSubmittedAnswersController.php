<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ReadingSubmittedAnswers;
use App\ReadingQuestions;
use App\ReadingAnswer;
use App\ReadingOptions;

class ReadingSubmittedAnswersController extends Controller
{
    public function submitReadingAnswers(Request $request, $student_id){
        $student=auth()->guard('api')->user();
        if ($student->role == "student" && $admin->status){

            $data = $request->all();
            $answers = [];
        
            if (isset($data)){
                $i=0;
                $submitted_answer_id=ReadingSubmittedAnswers::orderBy('id','desc')->first()['id']+1;
                foreach ($data['reading_answer_id'] as $answer){
                    // echo($data['reading_question_id'][$i]);
                    $question = ReadingQuestions::find($data['reading_question_id'][$i]);
                    $question_id=$question->id;
                    
                    $answer_option_id = $question->readingAnswer->reading_options_id;
                    // dd($answer_option_id);

                    // $student_id = $student->id;
                    array_push($answers, [
                        'id' => $submitted_answer_id,
                        'reading_question_id' => $question_id,
                        'reading_answer_id' => intval($answer),
                        'student_id' =>$student->id,
                        'answer_option_id' => $answer_option_id,
                    ]);
                    $i++;
                    $submitted_answer_id ++;
                } 
                // return $answers;
                ReadingSubmittedAnswers::insert($answers);
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
