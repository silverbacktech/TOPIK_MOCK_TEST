<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\QuestionGroup;
use App\QuestionSets;

class QuestionGroupController extends Controller
{
    public function store(Request $request, $question_sets_id){
    	$addQuestionGroup = $request->validate([
            'group_name' => 'required',
    	]);

    	$admin=auth()->guard('api')->user();

    	$questionSet=QuestionSets::find($question_sets_id);

    	if($questionSet!=null){
	    	if($admin->role=="admin" && $admin->status){
	    		$groupText=$request->input('group_name');
	    		$group=new QuestionGroup();
	    		$group->question_sets_id=$question_sets_id;
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

	public function edit($group_id){
		$this->validate($request,[
            'group_name'=>'required'
        ]);
		$admin = auth()->guard('api')->user();
		if($admin->role=='admin' && $admin->status){
			$group = QuestionGroup::find($group_id);
			if($group){
				$groupText=$request->input('group_name');
	    		$group->group_text=$groupText;
	    		$group->save();
				return response(['status'=>true,'group'=>$group,'message'=>'Listening Group Edited Successfully']);
			}
			else{
				return response(['status'=>false,'message'=>'Sorry No Such Group Found']);
			}
		}
		else{
			return response(['status'=>false,'message'=>"Unauthorized Access"]);
		}
	}

    public function destroy($id){
    	$admin=auth()->guard('api')->user();

    	if($admin->role=="admin" && $admin->status){
    		$group=QuestionGroup::find($id);
    		$group->delete();
    		return response(['status'=>true, 'message'=>'Group has deleted']);
    	}
    	else{
    		return response(['status'=>false,'message'=>"Sorry Unauthorized Access"]);
    	}
    }
}



