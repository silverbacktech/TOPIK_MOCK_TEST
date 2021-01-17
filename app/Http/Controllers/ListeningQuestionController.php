<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ListeningQuestions;
use App\ListeningOptions;
use App\ListeningAnswer;

class ListeningQuestionController extends Controller
{
    public function store(Request $request, $groupId){
        $data=$request->all();
        // return response(['data'=>$data]);
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
            $name=$audio->getClientOriginalName();
            $store=$audio->move(public_path().'/cover_img',$name);

            array_push($audioFiles, [
                'id' => $question_id,
                'listening_group_id'=>$groupId,
                'audio_file' => $name,
            ]);
            
            for($j = 1; $j <= 4; $j ++) {
                $option;
                if(is_file($data['option'.$j][$i])){
                    $name=$data['option'.$j][$i]->getClientOriginalName();
                    $data['option'.$j][$i]->move(public_path().'/cover_img',$name);
                    $option=$name;
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
}
