<?php

namespace App\Http\Controllers;

use App\StudentResults;
use App\QuestionSets;
use App\User;

class StudentResultController extends Controller
{
    public function getAllResults(){
        $admin = auth()->guard('api')->user();

        // $sets = QuestionSets::get();
        // foreach($sets as $set){
        //     $set->studentResults;
        // }
        // return $sets;

        if ($admin->role == 'admin'){
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
}
