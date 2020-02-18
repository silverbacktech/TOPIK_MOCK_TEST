<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\QuestionGroup;
use App\QuestionSets;

class QuestionGroupController extends Controller
{
    public function store(Request $request, $set_id){
    	$addQuestionGroup = $request->validate([
            'group_name' => 'required',
    	]);

    	$admin=auth()->guard('api')->user();

    	$questionSet=QuestionSets::find($set_id);

    	if($questionSet!=null){
	    	if($admin->role=="admin"){
	    		$groupText=$request->input('group_name');
	    		$group=new QuestionGroup();
	    		$group->set_id=$set_id;
	    		$group->group_text=$groupText;
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

    	if($admin->role=="admin"){
    		$group=QuestionGroup::find($id);
    		$group->delete();
    		return response(['status'=>true, 'message'=>'Group has deleted']);
    	}
    	else{
    		return response(['status'=>false,'message'=>"Sorry Unauthorized Access"]);
    	}
    }
}



