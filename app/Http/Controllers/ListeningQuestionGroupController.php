<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\QuestionSets;
use App\ListeningGroup;

class ListeningQuestionGroupController extends Controller
{
    public function store(Request $request,$id){
    	$addListeningGroup = $request->validate([
    		'group_name' => 'required',
    	]);

    	$admin = auth()->guard('api')->user();

    	$questionSet = QuestionSets::find($id);

    	if($questionSet != null){
    		if($admin->role == "admin" && $admin->status){
    			$groupText = $request->input('group_name');
    			$group = new ListeningGroup();
    			$group->question_sets_id = $id;
    			$group->group_text = $groupText;
    			$group->save();
    			return response(['status'=>true, 'message'=>'A new group has been added', 'value'=>$group]);
    		}
    		else{
    			return response(['status'=>false,'message'=>"Sorry Unauthorized Access"]);
    		}
    	}
    	else{
    		return response(['status'=>false,'message'=>"Please Select A Valid Question Set"]);
    	}
    }


    public function destroy($id){
    	$admin=auth()->guard('api')->user();

    	if($admin->role=="admin" && $admin->status){
    		$group=ListeningGroup::find($id);
    		$group->delete();
    		return response(['status'=>true, 'message'=>'Group has deleted']);
    	}
    	else{
    		return response(['status'=>false,'message'=>"Sorry Unauthorized Access"]);
    	}
    }
}
