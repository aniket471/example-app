<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserModel;

class UserController extends Controller
{
    public function insertUser(Request $request){

        $user = new UserModel();
        $user->username = $request->input('username');
        $user->password = $request->input('password');
        $user->status_id =$request->input('status_id');
        
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

// generate a pin based on 2 * 7 digits + a random character
     $pin = mt_rand(1000000, 9999999)
           . mt_rand(1000000, 9999999)
           . $characters[rand(0, strlen($characters) - 1)];

// shuffle the result
       $string = str_shuffle($pin);
       // $user->api_token = $string;
       $user->api_token = \sha1(\time());
        $user->save();
        echo \json_encode(array("response"=>"User Registartion Successfully..","token"=>$string));
    }

    public function loginUser(Request $request){

        $user = new UserModel();
       $username = $user->username = $request->input('username');
       $password = $user->password = $request->input('password');

        if(\is_null($username)){
            echo \json_encode(array("response"=>"username is requiered"));
        }
        elseif(is_null($password)){
            echo \json_encode(array("response"=>"password is required"));
        }
        else{

            $name = $user::where('username','=',$username)->first();
            $pass = $user::where('password','=',$password)->first();

            if(!$name){
                echo \json_encode(array("response"=>"user name failed"));
            }
            elseif(!$pass){
                echo \json_encode(array("response"=>"password not matched"));
            }
            else{

                $data = $user::where('username','=',$username)->get('token');

                echo \json_encode(array("response"=>"Login Successfully","token"=>$data));
            }
        }
    }

    public function LoginUserByToken(Request $request){

        $user = new UserModel();

     /*   $token = $user->token = $request->input('token');
        $username = $user->user_name = $request->input('username');
        $pass = $user->password = $request->input('password');

        if($user::where('token','=',$token)->first()){

            if($user::where('username','=',$username)->first()){

                if($user::where('password','=',$pass)->first()){

                    return \response()->json(["login success"]);
                }
                else{
                    echo \json_encode(array("response"=>"password not matched"));
                }
            }
            else{
                echo \json_encode(array("response"=>"username is not matchec"));
            }
        }
        else{
            echo \json_encode(array("response"=>"token miss matched"));
        }*/
    }
}
