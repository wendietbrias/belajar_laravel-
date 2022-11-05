<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{

    public function loginView() {
        return view("pages.Login");
    }

    public function registerView() {
        return view("pages.Register");
    }

    public function login(Request $request) {
        $validator = Validator::make($request->all( ) , [
            "email"=>"required",
            "password"=>"required|min:6"
        ]);

        if($validator->fails()) {
            return back()->with("errors",["errors"=>$validator->errors()->first()]);
        }
          
        if(Auth::attempt($request->only("email" , "password"))) {
           return redirect("/");
        }

        return back()->with("errors"  , ["errors"=>"account was not found"]);

    }
    
    public function register(Request $request) {
           $validator = Validator::make($request->all( ) , [
            "email"=>"required",
            "password"=>"required|min:6",
            "name"=>"required|min:6",
            "confirm"=>"required|confirmed|min:6"
        ]);

        if($validator->fails()) {
            return back()->with("errors",["errors"=>$validator->errors()->first()]);
        }
          
        $user = User::where("email" ,$request->email)->get();

        if(count($user) === 1) {
            return back()->with("errors" , ["errors" => "account already exists"]);
        }

        $created = User::create([
            "email"=>$request->email,
            "password"=>$request->password, 
            "name"=>$request->name, 
            "confirm"=>$request->confirm 
        ]);

        return redirect("/login");

    }
}
