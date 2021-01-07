<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ReadingQuestions;
use App\QuestionSets;
use App\ReadingOptions;
use App\ReadingAnswer;
// header('Access-Control-Allow-Origin: *');
class ReadingQuestionController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$groupId)
    {
        $data=$request->all();
        // return response($data);
        $i = 0;
        $questions=[];
        $options=[];
        $images=[];
        $answers=[];
        $question_id=ReadingQuestions::orderBy('id','desc')->first()['id']+1;   //To avoid repeatetive id while adding question
        $option_id = ReadingOptions::orderBy('id', 'desc')->first()['id'] + 1;
        $answer_id = ReadingAnswer::orderBy('id','desc')->first()['id']+1;


        foreach ($data['question'] as $question) {
            $files=$data['questionfile'];

            if($files[$i]){
                $name=$files[$i]->getClientOriginalName();
                $store=$files[$i]->move(public_path().'/cover_img',$name);
                array_push($questions, [
                    'id' => $question_id,
                    'question_group_id'=>$groupId,
                    'question_content' => $question,
                    'question_image' => $name,
                ]);
            }
            else{
                array_push($questions, [
                    'id' => $question_id,
                    'question_group_id'=>$groupId,
                    'question_content' => $question,
                    'question_image' => null,
                ]);
            }

            for($j = 1; $j <= 4; $j ++) {
                array_push($options, [
                    'id' => $option_id,
                    'reading_questions_id' => $question_id,
                    'reading_options_content' => $data['option'.$j][$i],
                    'option_number' => $j,
                ]);
                $option_id ++;
            }

            // return $images;
            array_push($answers, [
                'id' => $answer_id,
                'reading_questions_id'=>$question_id,
                'reading_options_id' => $option_id - 5 + $data['answers'][$i],
                'option_number' => $data['answers'][$i],
            ]);

            $question_id ++;
            $answer_id ++;
            $i ++;
        }
        // return response($answers);
        // return($questions);
        // return $options;
        ReadingQuestions::insert($questions);
        ReadingOptions::insert($options);
        ReadingAnswer::insert($answers);

         return response(['status'=>true,'message'=>'The questions were inserted','values'=>['questions'=>$questions,'options'=>$options,'answer'=>$answers]]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
        $validated_data = $request->validate([
            'question_content'=>'required',
        ]);

        $admin=auth()->guard('api')->user();
        if ($admin->role == 'admin'){
            $question = ReadingQuestions::find($id);
            if(isset($question)){
                $question->question_content = $request->input('question_content');
                $question->save();
                return response(['status'=>true, 'message'=>'Reading Question edited successfully', 'value'=>$question]);
            }
            else{
                return response(['status'=>false, 'message'=>'Please select a valid question to edit']);
            }
        }
        else{
            return response(['status'=>false,'message'=>'Sorry Unauthorised access']);
        }
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
        $admin = auth()->guard('api')->user();
        if ($admin->role == 'admin'){
            $question = ReadingQuestions::find($id);
            if (isset($question)){
                $question->delete();
                return response(['status'=> true, 'message'=>'Question deleted successfully']);
            }
            else{
                return response(['status'=>false, 'message'=>'Please select a valid question set']);
            }
        }
        else{
            return response(['status'=>false, 'message'=>'Sorry Unauthorized access']);
        }
    }

    public function getImages(Request $request){
        $files=$request->file('files');
        dd($files);
        $name=$file->getClientOriginalName();
        $store=$file->move(public_path().'\cover_img',$name);
        return "File Submitted Successfully";
    }
}
