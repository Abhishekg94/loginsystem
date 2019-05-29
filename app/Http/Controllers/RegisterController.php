<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Input;
use Validator;
use Redirect;
use App\Register;
use Auth;


class RegisterController extends Controller
{
    public function store()
    {
    	$data = Input::except(array('token'));
    	// dd($data);
    	$rule=array(
    		'name'=>'required',
    		'email'=>'required|email',
    		'password'=>'required|min:6',
    		'cpassword'=>'required|same:password'
    	);
    	$message = array(
    		'cpassword.required' =>'the comfirm password is required',
    		'cpassword.min' =>'the confirm password ia at least 6 character',
    		'cpassword.same' =>'the confirm password and password must be same'
    	);
    	$validator = Validator::make($data,$rule,$message);
            // dd($validator->fails());

    	if($validator->fails()){
           
    		return Redirect::to('register')->withErrors($validator);
    	}else{
           
    		
            Register::formstore(Input::except(array('_token','cpassword')));
            return Redirect::to('register')->with('success','successfully registered');
    	}
    }
    public function login()
    {
        $data = Input::except(array('token'));
        //var_dump($data);
        $rule=array(
            'email'=>'required|email',
            'password'=>'required',
            );
      
            $validator = Validator::make($data,$rule);

            if($validator->fails()){
                return Redirect::to('signin')->withErrors($validator);
            }else{
                $data = Input::except(array('_token'));

                if(Auth::attempt($data)){

                        return Redirect::to('');
                    // echo "yes match";
                }else{

                    return Redirect::to('signin');
                    // echo "no match";
                }
            }
    }
}
