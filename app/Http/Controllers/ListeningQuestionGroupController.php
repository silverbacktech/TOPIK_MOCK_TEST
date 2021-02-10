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
				$group = new ListeningGroup();
				$groupText = $request->input('group_name');
				if(is_file($request->file('group_image'))){
					$name=$request->file('group_image')->getClientOriginalName().time();
                	$fileName=pathinfo($name,PATHINFO_FILENAME);
                	$fileExtension=$request->file('group_image')->getClientOriginalExtension();
                	$fileNameToStore=$fileName.'_'.time().'.'.$fileExtension;
					$store=$request->file('group_image')->move(public_path().'\cover_img',$fileNameToStore);
					
					$group->group_image = $fileNameToStore;
				}
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

	public function edit(Request $request, $group_id){
		$this->validate($request,[
            'group_name'=>'required'
        ]);
		$admin = auth()->guard('api')->user();
		if($admin->role=='admin' && $admin->status){
			$group = ListeningGroup::find($group_id);
			if($group){
				$groupText = $request->input('group_name');
				if(is_file($request->file('group_image'))){
					$name=$request->file('group_image')->getClientOriginalName().time();
                	$fileName=pathinfo($name,PATHINFO_FILENAME);
                	$fileExtension=$request->file('group_image')->getClientOriginalExtension();
                	$fileNameToStore=$fileName.'_'.time().'.'.$fileExtension;
					$store=$request->file('group_image')->move(public_path().'\cover_img',$fileNameToStore);
					
					$group->group_image = $fileNameToStore;
				}
    			$group->group_text = $groupText;
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
    		$group=ListeningGroup::find($id);
    		$group->delete();
    		return response(['status'=>true, 'message'=>'Group has deleted']);
    	}
    	else{
    		return response(['status'=>false,'message'=>"Sorry Unauthorized Access"]);
    	}
    }
}
