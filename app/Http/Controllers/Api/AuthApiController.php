<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AuthApiController extends Controller
{
    //buat function register
    public function Register(Request $request){
        $MyData = [
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>$request->password
        ];
        try{
            $user = User::create($MyData);
        }catch(\Exception $error){
//            return response()->json([])
            return response(['error'=>$error->getMessage()],500);
//            http status
            //200 -> status ok
            //201 -> status created
            //404 -> status not found
            //500 -> internal server error
        }
        //ini untuk generated token
        $token = $user->createToken('MyApp')->accessToken;
        return response()->json(['user'=>$user,'accesstoken'=>$token],201);
    }
    public function Login(Request $request){
        $loginData = $request ->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);
        if(!auth()->attempt($loginData)){
            return response()->json(['error'=>'your credential is not valid'],401);
        }
        $user = auth()->user();
        $token = $user->createToken('MyApp')->accessToken;
        return response()->json(['user'=>$user,'accesstoken'=>$token],200);

    }
}
