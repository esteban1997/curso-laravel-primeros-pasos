<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $posts = Post::where("posted","yes")->paginate(2);
        return view("web.blog.index",compact('posts'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view("web.blog.show",compact('post'));
    }

}
