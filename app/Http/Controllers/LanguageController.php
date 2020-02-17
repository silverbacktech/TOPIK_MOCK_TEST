<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Languages;
use App\User;

class LanguageController extends Controller
{
    public function add(Request $request){
        $addLanguageData = $request->validate([
            'language_name' => 'required|unique:languages',
    	]);
        

		$admin = auth()->guard('api')->user();
        if ($admin->role == 'admin'){
            $newLanguageName = strtolower($request->input('language_name'));
            $new_language = new Languages();
            $new_language->language_name = $newLanguageName;
            $new_language->save();
            return response(['status'=>true, 'message'=>'A new language has been added', 'value'=>$new_language]);
           }
        else{
            return response(['status'=>false, 'message'=>'Sorry Unauthorized access']);
        }
    }


    public function delete($id){

        $admin = auth()->guard('api')->user();
        if ($admin->role == 'admin'){
            $language = Languages::find($id);
            if (isset($language)){
                $language->delete();
                return response(['status'=> true, 'message'=> 'The language has been successfully deleted']);
            }
            else{
                return response(['status'=> false, 'message'=> 'Language Not Found']);
            }
        }
        else{
            return response(['status'=> false, 'message'=> 'Sorry Unauthorized access']);
        }
    }
    

    public function edit(Request $request, $id){
        $validatedData = $request->validate([
            'language_name' => 'required',
    	]);
        
        $admin = auth()->guard('api')->user();
        if ($admin->role == 'admin'){
            $language = Languages::find($id);
            if (isset($language)){
                $language->language_name = $request->input('language_name');
                $language->save();
                return response(['status'=> true, 'message'=> 'The language has been successfully updated']);
            }
            else{
                return response(['status'=> false, 'message'=> 'Language Not Found']);
            }
        }
        else{
            return response(['status'=> false, 'message'=> 'Sorry Unauthorized access']);
        }
    }

    public function show(){
		$language = Languages::all();
		return $language;
	}

}
