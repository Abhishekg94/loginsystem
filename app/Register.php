<?php

namespace App;
use Hash;


use Illuminate\Database\Eloquent\Model;
use Input;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Register extends Authenticatable
{

	protected $table = "register_users";
    public static  function formstore($data)
    {
    	$name=Input::get('name');
    	// echo "$username";
    	$email=Input::get('email');
    	// echo "$email";
    	$pass=hash::make(Input::get('password'));
    	// echo "$pass";
    	$users = new Register();

    	$users->name = $name;
    	$users->email = $email;
    	$users->password = $pass;

    	$users->save();
    }
}
