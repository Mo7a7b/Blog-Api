<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Blogs;
use Illuminate\Http\Request;

class BlogsController extends Controller
{
    function createPost(Request $req)
    {
        $post = Blogs::create([
            "title" => $req->input("title"),
            "body" => $req->input("body"),
            "user" => $req->input("user"),
            "imgUrl" => $req->input("url"),
        ]);
        return $post;
    }
    function getPosts()
    {
        $posts = Blogs::all();
        return $posts;
    }
    function updatePost(Request $req, $id)
    {
        $post = Blogs::find($id);
        $post->title = $req->input("title");
        $post->body = $req->input("body");
        $post->imgUrl = $req->input("url");
        $post->save();
        return $post;
    }
    function deletePost($id)
    {
        $post = Blogs::find($id);
        $post->delete();
        return response()->json(["message" => "Post Deleted Successfully"]);
    }
}
