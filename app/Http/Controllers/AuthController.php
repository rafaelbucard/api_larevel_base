<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

use App\Models\User;


class AuthController extends Controller
{
    public function unauthorized() {
        return response()->json([
            'error' => 'Não autorizado'], 401);
    }

    public function register(Request $request) {
        $array = ['error'=> ''];
    
        $validator = Validator::make($request->all(),[
            'name' =>'required',
            'email' =>'required|email|unique:users,email',
            'cpf' =>'required|digits:11|unique:users,cpf',
            'password' =>'required',
            'password_confirm' =>'required|same:password',
            'birthdate' => 'required'

        ]);

        if(!$validator->fails()) {
            $name = $request->input('name');
            $email = $request->input('email');
            $cpf = $request->input('cpf');
            $password = $request->input('password');
            $avatar ='avatar.png';
            $email_verified_at = NULL;
            $created_at =  date('Y-m-d H:i:s');
            $updated_at =  date('Y-m-d H:i:s');
            $birthdate = $request->input('birthdate');
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $remember_token = $hash;
            $permission = $hash;

            $newUser = new User();
            $newUser->name = $name;
            $newUser->email = $email;
            $newUser->cpf = $cpf;
            $newUser->password = $hash;
            $newUser->avatar = $avatar;
            $newUser->email_verified_at = $email_verified_at;
            $newUser->created_at = $created_at;
            $newUser->updated_at = $updated_at;
            $newUser->remember_token=  $remember_token;
            $newUser->permission=  $permission;
            $newUser->birthdate =  $birthdate;
            $newUser->save();
            return response()->json(array('success' => true, 'last_insert_id' => $newUser->id,'name' => $newUser->name, 'email_verified_at', $newUser->email_verified_at), 200);;
           
           
        } else {

           $array['error'] = $validator->errors()->first();
           return $array;
        }
        
      
    }

    public function login(Request $request){
        $array = ['error'=> ''];

        $validator = Validator::make($request->all(),[
            
            'email' =>'required|email',
            'password' =>'required',
        ]);
        if(!$validator->fails()) {
            $creds = $request->only('email','password');
            $token = Auth::attempt($creds);
            if($token){
            $array['token'] = $token;
            return response()->json(array('success' => true ,'token' => $token), 200);;
            }
            else{
              $array['error'] = $validator->errors()->first();
           }
       return $array;
    }
  }
  
  public function validateToken() {
      $array = ['error' => ''];
        $user = Auth::user();
        $array['user'] = $user;

      return $array;
  }

  public function logout() {
      $array = ['error' => ''];
      Auth::logout();
      return $array;
  }
}
