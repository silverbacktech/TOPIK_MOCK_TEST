<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Hash;


class UserController extends Controller
{
    public function login(Request $request){
    	$loginData=$request->validate([
    		'email'=>'required',
    		'password'=>'required'
    	]);

    	$user=User::where('email',$request->email)->first();

    	if($user!=null){
    		if(!Hash::check($request->password,$user->password)){
    			return response(['status'=>false,'message'=>'Invalid username or password']);
    		}
    		else{
    			$accessToken=$user->createToken('authToken')->accessToken;
                return response(['status'=>true,'values'=>['role'=>$user->role,'access_token'=>$accessToken]]);
    		}
    	}
    	else{
    		return response(['status'=>false,'message'=>'No such admin or student found. Please try again']);
    	}

    }

    public function register(Request $request){
    	$registerData=$request->validate([
    		'name'=>'required',
    		'email'=>'required',
    		'password'=>'required',
    		'role'=>'required',
    	]);

    	$user=auth()->guard('api')->user();
    	if($user->role=="admin"){
    		$password=bcrypt($request->input('password'));
    		$role=strtolower($request->input('role'));
    		if($role=='admin'||$role=='student'){
    			$admin=new User();
    			$admin->name=$request->name;
    			$admin->email=$request->email;
    			$admin->password=$password;
    			$admin->role=$role;
    			$admin->save();
    			if ($role=="student") {
    				return response(['status'=>true,'values'=>['A student was added']]);
    			}
    			else{
    				return response(['status'=>true,'values'=>'A user was added']);
    			}
    		}
    		else{
    			return response(['status'=>false,'values'=>['Only a student or an admin can be added.']]);
    		}
    	}
    	else{
    		return response(['status'=>false,'message'=>'Sorry unauthorized access']);
    	}
    }
	
	public function edit(Request $request,$id){
		$registerData=$request->validate([
    		'name'=>'required',
    		'email'=>'required',
    		'password'=>'required',
    		'role'=>'required',
    	]);

		$user = User::find($id);
		$admin = auth()->guard('api')->user();
		if($admin->role=="admin"){
    		$password=bcrypt($request->input('password'));
			$role=strtolower($request->input('role'));
			if ($role=='admin'|| $role == 'student'){
				$user->name = $request->input('name');
				$user->email = $request->input('email');
				$user->password = $password;
				$user->role = $role;
				$user->save();
				return response(['status'=>true, 'message'=>'Data Successfully Updated']);
			}
			else{
				return response(['status'=>false, 'message'=>'Only student or admin can be added']);
			}
		}
		else{
			return response(['status'=>false, 'message'=>'Sorry UnAuthorized Access']);
		}
	}

	public function delete(Request $request, $id){
		$user = User::find($id);
		$admin = auth()->guard('api')->user();
		if ($admin->role=="admin"){
			$user -> delete();
			return response(['status'=> true, 'message'=> 'User successfully deleted']);
		}
		else{
			return response(['status'=> false, 'message'=> 'Sorry unauthorized access']);
		}
	}


}
