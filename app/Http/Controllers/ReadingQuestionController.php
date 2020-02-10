<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ReadingQuestions;
use App\QuestionSets;

class ReadingQuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request,$id)
    {
        $addQuestionData = $request->validate([
            'question_content' => 'required',
        ]);

        $set = QuestionSets::find($id);
        if ($set != null){
            $question_sets = $id;
            
            

        $admin = auth()->guard('api')->user();
        if ($admin->role == 'admin'){
            if (isset($set)){
                $question = new ReadingQuestions();
                $question->question_sets = $question_sets;
                
                $question->question_content = $request->input('question_content');
                $question->save();
                return response(['status'=>true, 'message'=>'New question was added successfully']);

            }
            else{
                return response(['status'=>false, 'message'=>'Please select a valid question set']);
            }
        }
        else{
            return response(['status'=>false, 'message'=>'Sorry Unauthorized access']);
        }
    }
    else{
        return response(['status'=>false, 'message'=>'Please select a valid question set']);

        }
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

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
}
