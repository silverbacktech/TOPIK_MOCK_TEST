<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ReadingQuestions;
use App\ReadingOptions;

class ReadingOptionsController extends Controller
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
    public function create(Request $request, $id)
    {
        $addOptionsData = $request->validate([
            'reading_options_content' => 'required',
        ]);

        $options = ReadingQuestions::find($id); 
        if ($options != null){
            $admin = auth()->guard('api')->user();
            if ($admin->role == 'admin'){
                $new_option_name = strtolower($request->input('reading_options_content'));

                $new_option_set = new ReadingOptions();
                $new_option_set->reading_question_id = $id;
                $new_option_set->reading_options_content = $new_option_name;
                $new_option_set->save();
                return response(['status'=>true, 'message'=>'New Option added successfully', 'value'=>$new_option_set]);
            }
            else{
                return response(['status'=>false, 'message'=>'Sorry Unauthorized access']);
            }
        }
        else{
            return response(['status'=>false, 'message'=>'Please select a valid reading question']);
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
            'reading_options_content' => 'required',
        ]);

        $admin = auth()->guard('api')->user();
        if ($admin->role == 'admin'){
            $options = ReadingOptions::find($id);
            if (isset($options)){
                $options->reading_options_content = $request->input('reading_options_content');
                $options->save();
                return response(['status'=> true, 'message'=> 'Option edited successfully']);
            }
            else{
                return response(['status'=>false, 'message'=>'Please select a valid question set']);
            }
        }
        else{
            return response(['status'=>false, 'message'=>'Sorry Unauthorized access']);
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
            $option = ReadingOptions::find($id);
            if (isset($option)){
                $option->delete();
                return response(['status'=>true, 'message'=> 'Option deleted successfully']);
            }
            else{
                return response(['status'=>false, 'message'=>'Please select a valid option']);
            }
        }
        else{
            return response(['status'=>false, 'message' =>'Sorry unauthorized access']);
        }
    }
}
