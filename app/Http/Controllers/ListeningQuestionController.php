<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ListeningQuestions;
use App\ListeningOptions;
use App\ListeningAnswer;
use App\QuestionSets;

class ListeningQuestionController extends Controller
{
    public function store(Request $request, $groupId){
        $data=$request->all();
        // return $data;

        $i = 0;
        $audioFiles=[];
        $options=[];
        $answers=[];

        $question=ListeningQuestions::orderBy('id','desc')->first();   //To avoid repeatetive id while adding question
        
        $question_id;
        if(isset($question)){
            $question_id=$question['id']+1;
        }
        else{
            $question_id=1;
        }

        $option = ListeningOptions::orderBy('id', 'desc')->first();
        $option_id;
        if(isset($option)){
            $option_id=$option['id']+1;
        }
        else{
            $option_id=1;
        }

        $answer = ListeningAnswer::orderBy('id','desc')->first();
        $answer_id;
        if(isset($answer)){
            $answer_id=$answer['id']+1;
        }
        else{
            $answer_id=1;
        }



        foreach ($data['audioFiles'] as $audio) {
            if(!isset($audio)){
                return response(['status'=>false,'message'=>'Please Attach Audio File In Question at least one question']);
            }

            $name=$audio->getClientOriginalName();
            
            $fileName=pathinfo($name,PATHINFO_FILENAME);
            $fileExtension=$audio->getClientOriginalExtension();
            $fileNameToStore=$fileName.'_'.time().'.'.$fileExtension;
            // return response(['status'=>$fileNameToStore]);
            $store=$audio->move(public_path().'\cover_img',$fileNameToStore);

            $image;
            $content;

            if(is_file($data['questionImage'][$i])){
                $imageName = $data['questionImage'][$i]->getClientOriginalName();
                $fileName=pathinfo($imageName,PATHINFO_FILENAME);
                $fileExtension=$data['questionImage'][$i]->getClientOriginalExtension();
                $audioName=$fileName.'_'.time().'.'.$fileExtension;
                $image = $fileNameToStore;
                $data['questionImage'][$i]->move(public_path().'\cover_img',$audioName);
            }else{
                $audioName = null;
                $image = $fileNameToStore;
            }

            if($data['questionContent'][$i]){
                $content = $data['questionContent'][$i];
            }
            else{
                $content = null;
            }

            array_push($audioFiles, [
                'id' => $question_id,
                'listening_group_id'=>$groupId,
                'audio_file' => $image,
                'question_content'=>$content,
                'image_file' => $audioName,
            ]);
            
            for($j = 1; $j <= 4; $j ++) {
                $option;
                if(is_file($data['option'.$j][$i])){
                    // $name=$data['option'.$j][$i]->getClientOriginalName();
                    // $data['option'.$j][$i]->move(public_path().'\cover_img',$name);
                    // $option=$name;

                    $imageName = $data['option'.$j][$i]->getClientOriginalName();
                    $fileName=pathinfo($imageName,PATHINFO_FILENAME);
                    $fileExtension=$data['option'.$j][$i]->getClientOriginalExtension();
                    $fileNameToStore=$fileName.'_'.time().'.'.$fileExtension;
                    $data['option'.$j][$i]->move(public_path().'\cover_img',$fileNameToStore);
                    $option=$fileNameToStore;
                }
                else{
                    $option=$data['option'.$j][$i];
                }

                array_push($options, [
                    'id' => $option_id,
                    'listening_questions_id' => $question_id,
                    'option_content' => $option,
                    'option_number' => $j,
                ]);
                $option_id ++;
            }
            if(!isset($data['answers'][$i])){
                return response(['status'=>false,'message'=>'Please Attach Answers']);
            }
            array_push($answers, [
                'id' => $answer_id,
                'listening_questions_id'=>$question_id,
                'listening_options_id' => $option_id - 5 + $data['answers'][$i],
                'option_number' => $data['answers'][$i],
            ]);

            $question_id ++;
            $answer_id ++;
            $i ++;
        }

        ListeningQuestions::insert($audioFiles);
        ListeningOptions::insert($options);
        ListeningAnswer::insert($answers);

        return response(['status'=>true,'message'=>'The questions were inserted','values'=>['questions'=>$audioFiles,'options'=>$options,'answer'=>$answers]]);
    }

    public function adminViewListening($set_id){
        $admin = auth()->guard('api')->user();

        if ($admin->role == 'admin' && $admin->status){
            $set = QuestionSets::find($set_id);
            if($set){
                if($set->status){
                    $listeningGroups = $set->listeningGroup;
                    foreach($listeningGroups as $listeningGroup){
                        $listeningQuestions = $listeningGroup->listeningQuestions;

                        foreach($listeningQuestions as $listeningQuestion){
                            $listeningQuestion->listeningOptions;
                            $listeningQuestion->listeningAnswer;
                        }
                    }
                    return response(['message'=>true,'listeningQuestions'=>$listeningGroups]);
                }
                else{
                    return response(['status'=>false, 'message'=>'The Status is inactive']);
                }
            }
            else{
                return response(['status'=>false, 'message'=>'Sorry No Such Found']);
            }
        }
        else{
            return response(['status'=>true, 'message'=>'Unauthorized Access']);
        }
    }

    public function viewIndividual($id){
        $admin = auth()->guard('api')->user();
        if($admin->role=='admin' && $admin->status){
            $question = ListeningQuestions::find($id);
            if($question){
                $question->listeningOptions;
                $question->listeningAnswer;
                return response(['status'=>true,'question'=>$question]);
            }
            else{
                return response(['status'=>false,'message'=>'Sorry, Question Not Found']);
            }
        }
        else{
            return response(['status'=>false,'message'=>'Unauthorized Access']);
        }
    }

    public function editIndividual(Request $request, $id){
        $data = $request->all();
        // return $data;
        $admin = auth()->guard('api')->user();
        if($admin->role=='admin' && $admin->status){
            $questionToEdit = ListeningQuestions::find($id);
            
            if($questionToEdit){
                $questionToEdit->question_content = $data['question_content'];

                if(isset($data['audioFile'])){
                    if(is_file($data['audioFile'])){
                        $audio = $data['audioFile'];
                        $name=$audio->getClientOriginalName();
                        
                        $fileName=pathinfo($name,PATHINFO_FILENAME);
                        $fileExtension=$audio->getClientOriginalExtension();
                        $fileNameToStore=$fileName.'_'.time().'.'.$fileExtension;
                        // return response(['status'=>$fileNameToStore]);
                        $store=$audio->move(public_path().'\cover_img',$fileNameToStore);
                        $questionToEdit->audio_file = $fileNameToStore;
                    }
                }

                if(isset($data['questionImage'])){
                    if(is_file($data['questionImage'])){
                        $imageName = $data['questionImage']->getClientOriginalName();
                        $fileName=pathinfo($imageName,PATHINFO_FILENAME);
                        $fileExtension=$data['questionImage']->getClientOriginalExtension();
                        $fileName=$fileName.'_'.time().'.'.$fileExtension;
                        $data['questionImage']->move(public_path().'\cover_img',$fileName);
                        $questionToEdit->image_file = $fileName;
                    }
                }
            }
            $options = $questionToEdit->listeningOptions;
            $j = 1;
            foreach($options as $option){
                if(isset($data['option'.$j])){
                    if(is_file($data['option'.$j])){
                        $imageName = $data['option'.$j]->getClientOriginalName();
                        $fileName=pathinfo($imageName,PATHINFO_FILENAME);
                        $fileExtension=$data['option'.$j]->getClientOriginalExtension();
                        $fileNameToStore=$fileName.'_'.time().'.'.$fileExtension;
                        $data['option'.$j]->move(public_path().'\cover_img',$fileNameToStore);
                        $option->option_content=$fileNameToStore;
                        $option->save();
                    }
                    else{
                        $option->option_content=$data['option'.$j];
                        $option->save();
                    }
                }
                $j++;
            }
            
            $answer = $questionToEdit->listeningAnswer;
            
            if(isset($data['option_id'])){
                $answer->listening_options_id = intval($data['option_id']);
            }
            
            if(isset($data['answers'])){
                $answer->option_number = intval($data['answers']);
            }
            $answer->save();
            $questionToEdit->save();

            return response(['status'=>true,'message'=>'Question Updated','question'=>$questionToEdit]);
        }
        else{
            return response(['status'=>false,'message'=>'Unauthorized Access']);
        }
    }
}
