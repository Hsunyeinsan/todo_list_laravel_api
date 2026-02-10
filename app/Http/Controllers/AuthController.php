<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Resources\RegisterResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(RegisterRequest $request){
        $user=User::create([...$request->validated(),"password"=>Hash::make($request->password)]);

        $token=$user->createToken('auth_token')->plainTextToken;
        return response()->json([
           "message"=>"User Registered Successfully",
           "data"=>new RegisterResource($user,$token)
        ]);
    }
    public function login(LoginRequest $request)
    {
        // if(!Auth::attempt($request->only('email','password'))){
        //     return response()->json([
        //         "message"=>"email or password is incorrect"
        //     ]);
        // }
        // $user=Auth::user();

        // $token=$user->createToken('auth_token')->plainTextToken;

        return response()->json([
           "message"=>"User login Successfully",
        //    "data"=>new RegisterResource($user,$token)
        ]);

    }
}
