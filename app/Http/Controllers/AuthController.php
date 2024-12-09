<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function ShowRegisterForm(){
        return view('auth.register');
    }
    public function Register(Request $request){
        //aku mau ngajarin try catch
        // error handling
        // try -> adalah kata kunci untuk melakukan pencobaan

        // try untuk sleep{
        //     //code untuk sleep
        //     //cara untuk tidur
        // }catch{ //kalau kalian gabisa tidur bakal masuk ke catch
        //     //code kalau kalian gabisa tidur 
        //     // noton, belajar
        // }
        // try -> untuk register 
        // kalau ada gagal aku catch 
        // try{
        //     //code untuk register
        // }
        // catch{
        //     kalau gagal register ngapain
        // }

        try{
            // dd(vars: $request);
            $request ->validate(
                [
                    'name' =>'required','string','max:255',
                    'email'=>'required|string|max:255|unique:users|email',
                    'password'=>'required|string|min:8',
                ]
                );
                User::create([
                    'name' =>$request->name,
                    'email' => $request->email,
                    'password'=>Hash::make($request->password),
                ]);
                return redirect()->route('welcome')->with('success','register succesfull.');
        } catch(\Exception $error){
            // dumper ->
            // dump => dia akan melakukan dump lalu akan lanjut ke code selanjutkan
            // dd -> dump and die -> 

            // dd('ini dumper');
            //ini code aku
            dump($error->getMessage());
            // return back()->withErrors('error',"error occured please check input");
        }
    }
    public function ShowLoginForm(){
        return view('auth.login');
    }
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
    public function Login(Request $request ){
        try{
            $request ->validate([
                'email' =>'required|email',
                'password'=>'required'
            ]);

            if (Auth::attempt(credentials: $request->only('email','password'))){
                $request->session()->regenerate();
                return redirect()->route('welcome')->with('success','login success');
            }else{
                dump('login failed credential is not found please try again');
                return redirect()->route('login')->with('success','login success');
            }
        }catch(\Exception $error){
            dump($error->getMessage());
        }
    }
}
