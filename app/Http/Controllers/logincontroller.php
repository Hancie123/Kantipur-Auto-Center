<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class logincontroller extends Controller
{
    public function userlogin(){
        return view('login');
    }

    public function login(Request $request){
        
        $request->validate([
            'email'=>'email|required',
            'password'=>'required'
            
        ]);

       $credentials=$request->only('email','password');
       $users=User::where('email',$credentials['email'])->first();

      
       
       if(!$users){
        return back()->with('fail','The account does not found');
       }

       elseif($credentials['password']!==$users->password){
        return back()->with('fail','The passsword does not match');
       }

       elseif($credentials['email']==$users->email && $credentials['password']==$users->password){
        Session::put('email',$credentials['email']);
        Session::put('password',$credentials['password']);
        return back()->with('success','You have successfully login to the system');
       }
       else {
        return back()->with('fail','Incorrect email and password!');
       }
       
       
       


        
        }
}