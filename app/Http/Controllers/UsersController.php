<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Blogs;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    function Register(Request $req)
    {
        $user = User::create([
            "name" => $req->input("username"),
            "email" => $req->input("email"),
            "password" => $req->input("password"),
        ]);
        return $user;
    }
    function Login(Request $req)
    {
        $user = User::where("email", $req->input("email"))->first();
        if (!$user) {
            return response()->json(["message" => "Invalid Credintials"], 401);
        }
        if (!Hash::check($req->input("password"), $user->password)) {
            return response()->json(["message" => "Invalid Credintials"], 401);
        }
        $token = $user->createToken("auth_token")->plainTextToken;
        return response()->json(["data" => $user, "token" => $token]);
    }
    function showUser($id)
    {
        $user = User::find($id);
        return $user;
    }
    function showUserPosts(Request $req)
    {
        $posts = Blogs::where("user", $req->input("username"))->get();
        return $posts;
    }
    function showAllUsers(){
        $users = User::all();
        return $users;
    }
}
