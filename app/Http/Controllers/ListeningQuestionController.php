<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ListeningQuestions;
class ListeningQuestionController extends Controller
{
    public function store(Request $request, $group_id){
    	$data=$request->all();
        $i = 0;
        // dd($data);
        $questions=[];

        $question_id=ListeningQuestions::orderBy('id','desc')->first()['id']+1;

        foreach ($data['question'] as $question) {
        	$files=$request->file('questionfile');
            $name=$files[$i]->getClientOriginalName();
            $store=$files[$i]->move(public_path().'/cover_img',$name);

            array_push($questions, [
                'id' => $question_id,
                'question_group_id'=>$group_id,
                'question_content' => $question,
                'question_image' => $name,
                'start_time' => $data['start_time'][$i],
                'end_time' => $data['end_time'][$i],
            ]);
            $question_id ++;
            $i++;
        }
        

        ListeningQuestions::insert($questions);

        return response(['status'=>true,'message'=>'The questions were inserted','values'=>['questions'=>$questions]]);
    }
}
