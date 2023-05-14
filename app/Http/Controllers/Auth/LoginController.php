<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view("auth.login");
    }


    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => "required",
            'password' => "required",
        ], ['username.required' => "Username/Email is required"]);
        if ($validator->fails()) {
            $data = ["status" => "error", "message" => $validator->errors()];
            return response()->json($data);
        }
        
        try {
            if (Auth::attempt($this->credentials($request->username, $request->password))) {
                return response()->json(["message" => "Login successfully", "user_id" => Auth::user()->id]);
            } else {
                return response()->json(["unauthenticate" => "Username Or Password not match"]);
            }
        } catch (\Throwable $th) {
            $data = ["status" => false, "message" => $th->getMessage()];
            return response()->json($data);
        }
    }


    //credentials check
    public function credentials($username, $password)
    {
        if (filter_var($username, FILTER_VALIDATE_EMAIL)) {
            return ['email' => $username, 'password' => $password];
        } else {
            return ['username' => $username, 'password' => $password];
        }
    }
}
