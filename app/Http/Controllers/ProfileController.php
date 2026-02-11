<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProfileResource;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function show(Request $request){
        return response()->json([
            "data"=>new ProfileResource($request->user())
        ]);
    }
    public function changeName(Request $request){
        $user=$request->user();

        $user->update(["name"=>$request->name]);

        return response()->json([
            "message"=>"name changed successfully",
            "data"=>new ProfileResource($user)
        ]);
    }
    public function changePassword(Request $request){
        $user=$request->user();

        if(! Hash::check($request->old_password,$user->password,)){
            return response()->json([
                'data' => [
               'message' => 'Old Password is incorrect',
              ],
          ], 401);
        }

        $user->update(["password"=>Hash::make($request->new_password)]);

        $user->tokens()->delete();
        return response()->json([
           "data"=>[
             "message"=>"Password changed successfully",
           ]
        ]);
    }
    public function logout(Request $request){
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'data' => [
                'message' => 'Logged out successfully',
            ],
        ]);
    }
}
