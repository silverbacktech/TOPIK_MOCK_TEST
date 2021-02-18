<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Languages;
use App\QuestionSets;
use App\QuestionGroup;
use App\ReadingQuestions;
use App\ReadingOptions;
use App\ReadingAnswer;
use File;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

 
class StudentTestController extends Controller
{
    //Show Languages
    public function getLanguages(){
        $student = auth()->guard('api')->user();
        if ($student->role == 'student' && $student->status){
            $languages = Languages::all();
            return $languages;
        }
        else{
            return response(['status'=>true, 'message'=>'Sorry Only students are allowed to give exam' ]);
        }
    }

    public function getSets($id){
        $student = auth()->guard('api')->user();
        if ($student->role == 'student' && $student->status){
            $language = Languages::find($id);

            $question_sets = $language->sets;
            return $question_sets;
        }
        else{
            return response(['message'=>false, 'message'=>'Sorry Only students are allowed to give exam']);
        }
    }

    public function getGroups($id){
        $student = auth()->guard('api')->user();
        if ($student->role == 'student' && $student->status){
            $set = QuestionSets::find($id);
            $groups = $set->readingGroup;
            // return $groups;
            if (isset($groups)){
                $groupsQuestions= [] ;
                foreach ($groups as $group){
                    $questions = $group->readingQuestions;
                    foreach($questions as $question){
                        $question->readingOptions;
                        $question->readingAnswer;
                    }
                }

                return $groups;
            }
            else{
                return response(['status'=>false, 'message'=>'No groups have been added']);
            }
        }
        else{
            return response([ 'status'=> false, 'message'=>'Sorry Only students are allowed to give exam']);
        }
    }

    public function getAllQuestions($id){
        $student = auth()->guard('api')->user();

        if ($student->role == 'student' && $student->status){
            $set = QuestionSets::find($id);
            if($set){
                if($set->status){
                    $groups = $set->readingGroup;
                    // return $groups;
                    $groupsQuestions= [] ;
                    foreach ($groups as $group){
                        $questions = $group->readingQuestions;
                        foreach($questions as $question){
                            $question->readingOptions;
                            $question->readingAnswer;
                        }
                    }
                    $listeningGroups = $set->listeningGroup;
                    foreach($listeningGroups as $listeningGroup){
                        $listeningQuestions = $listeningGroup->listeningQuestions;

                        foreach($listeningQuestions as $listeningQuestion){
                            $listeningQuestion->listeningOptions;
                            $listeningQuestion->listeningAnswer;
                        }
                    }
                    return response(['message'=>true, 'readingQuestions'=>$groups, 'listeningQuestions'=>$listeningGroups]);
                    // return $listeningQuestions;
                    // return $groups;
                }
                else{
                    return response(['status'=>false, 'message'=>'The Status is inactive']);
                }
            }else{
                return response(['status'=>false,'message'=>'No such set found']);
            }
        }
        else{
            return response([ 'status'=> false, 'message'=>'Sorry Only students are allowed to give exam']);
        }
    }
    public function getAudio($audioFile){
        $path = public_path().(DIRECTORY_SEPARATOR."cover_img".DIRECTORY_SEPARATOR.$audioFile);
        // return response(['message'=>true,'path'=>$path]);
        
        $response = new BinaryFileResponse($path);
        BinaryFileResponse::trustXSendfileTypeHeader();
        
        return $response;
    }
}