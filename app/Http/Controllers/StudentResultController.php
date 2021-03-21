<?php

namespace App\Http\Controllers;

use App\StudentResults;
use App\QuestionSets;
use App\User;

class StudentResultController extends Controller
{
    public function getAllResults(){
        $admin = auth()->guard('api')->user();

        if ($admin->role == 'admin' && $admin->status){
            $results = StudentResults::get();
            // return $results;
            if($results){
                foreach($results as $result){
                    $result->sets;
                    $result->student;
                }
                return $results;
            }else{
                return response(['status'=>true, 'message'=>'Nobody has submitted yet']);
            }
        }
        else{
            return response(['status'=>false,'message'=>'Sorry Unauthorized Access']);
        }
    }

    public function individualResult($id){
        $admin = auth()->guard('api')->user();

        if($admin->role == 'admin' && $admin->status){
            $result = StudentResults::where('id',$id)->get();
        
            foreach($result as $res){
                $set = $res->sets;
                $readingGroup = $set->readingGroup;
                $listeningGroup = $set->listeningGroup;
                foreach($readingGroup as $reading){
                    $questions = $reading->readingQuestions;
                    foreach($questions as $question){
                        $question->readingOptions;
                        $question->readingAnswer;
                    }
                }
                $res->readingAnswers;
                $res->listeningAnswers;
                foreach($listeningGroup as $listening){
                    $questions = $listening->listeningQuestions;
                    foreach($questions as $question){
                        $question->listeningOptions;
                        $question->listeningAnswer;
                    }
                }
            }
            // $results = $result->sets;
            return response(['status'=>true, 'result'=>$result]);
        }
        else{
            return response(['status'=>false,'message'=>'Sorry Unauthorized Access']);
        }
    }
}
