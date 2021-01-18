<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->paginate(5);
        return view('index', compact('posts'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $post = Post::create($request->all());

        if(!is_null($post)) {
            return response()->json(["status" => "success", "message" => "Success! post created.", "data" => $post]);
        }
        else {
            return response()->json(["status" => "failed", "message" => "Alert! post not created"]);
        }
    }

    public function update(Request $request)
    {
        $post_id = $request->id;
        $post = Post::where("id", $post_id)->update($request->all());

        if($post == 1) {
            return response()->json(["status" => "success", "message" => "Success! post updated"]);
        }
        else {
            return response()->json(["status" => "failed", "message" => "Alert! post not updated"]);
        }
    }

    public function destroy($post_id) {
        $post = Post::where("id", $post_id)->delete();
        if($post == 1) {
            return response()->json(["status" => "success", "message" => "Success! post deleted"]);
        }
        else {
            return response()->json(["status" => "failed", "message" => "Alert! post not deleted"]);
        }
    }
}