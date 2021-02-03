<?php

namespace App\Http\Controllers\Api;

use App\User;
use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;



class AuthController extends Controller
{
    public function login(Request $req)
    {
       $creds=$req->only(['email','password']);
       if(!$token=auth()->attempt($creds)){
            return response()->json([
                'success'=>false,
                'message'=>'Invaild credintials'
            ]);
       }
       return response()->json([
        'success'=>true,
        'token'=>$token,
        'user'=>Auth::user()
       ]);
    }
    public function register(Request $req)
    {
       $encryptedPass =Hash::make($req->password);
       $user =new User;
       try{
           $user->name=$req->name;
           $user->email=$req->email;
           $user->password=$encryptedPass;
           $user->save();
           return $this->login($req);

       }catch(Exception $e){
           return response()->json([
               'success'=>false,
               'message'=>''. $e
           ]);
       }
    }

    public function logout(Request $req)
    {
    try {
        JWTAuth::invalidate(JWTAuth::parseToken($req->token));
        return response()->json([
            'success'=>true,
            'message'=>'logout success'
        ]);
    } catch (Exception $e) {
        return response()->json([
            'success'=>false,
            'message'=>''. $e
        ]);
    }
    }
}
