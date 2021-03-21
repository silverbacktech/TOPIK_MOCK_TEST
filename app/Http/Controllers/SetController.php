<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\QuestionSets;
use App\Languages;

class SetController extends Controller
{
    public function add(Request $request, $id){
        $addSetData = $request->validate([
            'name' => 'required|unique:question_sets',
        ]);

        $language = Languages::find($id);
        if ($language != null){ 
            $admin = auth()->guard('api')->user();
            if ($admin->role == 'admin'){
                $newSetName = strtolower($request->input('name'));
                
                $newSet = new QuestionSets();
                $newSet->name = $newSetName;
                $newSet->languages_id = $id;
                $newSet->status = true;
                $newSet->save();
                return response(['status'=>true, 'message'=>'A new question set has been added','value'=>$newSet]);
            }
            else{
                return response(['status'=>false, 'message'=>'Unauthorized access']);
            }
        }
        else{
            return response(['status'=>false, 'message'=>'Please select a valid language']);
        }
    }


    public function delete($id){
        $admin = auth()->guard('api')->user();
        if($admin->role=='admin'){
            $set=QuestionSets::find($id);
            if(isset($set)){
                $set->delete();
                return response(['status'=>true,'message'=>'The Set Has Been Successfully Deleted']);
            }
            else{
                return response(['status'=>false,'message'=>'Set Not Found']);
            }
        }
        else{
            return response(['status'=>false,'message'=>'Sorry Unauthorized Access']);
        }
    }

    public function edit(Request $request,$id){
        $validated_data = $request->validate([
            'name' => 'required|unique:question_sets',
        ]);

        $admin = auth()->guard('api')->user();
        if ($admin->role == 'admin'){
            $set = QuestionSets::find($id);
            if (isset($set)){
                $set->name = $request->input('name');
                $set->save();
                return response(['status'=>false,'message'=>'Set Updated Successfully']);
            }
            else{
                return response(['status'=>false,'message'=>'Sorry Set Not Found']);
            }
        }
        else{
            return response(['status'=>false,'message'=>'Sorry Unauthorized Access']);
        }
        
    }

    public function show(){
        $sets = QuestionSets::all();
        $setsArray=[];
        foreach($sets as $set){
            $languageName=Languages::where('id',$set->languages_id)->get();
            $set['language']=$languageName;
            array_push($setsArray,$set);
        }
        return $setsArray;
		
    }

    public function changeStatus($id){
        $set = QuestionSets::find($id);

        if($set){
            if($set->status){
                $set->status = false;
                $set->save();
                return response(['status'=>true, 'message'=>'Set status set to false']);
            }
            else{
                $set->status = true;
                $set->save();
                return response(['status'=>true,'message'=>'Set status set to true']);
            }
        }else{
            return response(['status'=>false, 'message'=>'Set Not Found']);
        }
    }
    
}
