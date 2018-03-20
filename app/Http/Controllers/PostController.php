<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::simplePaginate(10); 

        return view('posts.index')->with('posts' , $posts ); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post.create'); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

            $post = new Post; 

        $valid = $request->validate([
            'title' => 'string|min:3|required', 
            'body' => 'string|min:3|required',
        ]); 

        $post->title = $request->title; 
        $post->body = $request->body; 
        $post->user_id = auth()->user()->id; 

        if ($request->hasfile('image')) {

            $valid = $request->validate([
                'image' => 'file|image|max:5000'
            ]); 

            $request->image->store('/posts/images/'); 
            $post->image = $request->image->hashName(); 

        }


        $post->save(); 


        return 'saved'; 


        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('posts.view')->with('post' , $post ); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('posts.edit')->with('post' , $post );  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {

        $valid = $request->validate([
            'title' => 'string|min:3|required', 
            'body' => 'string|min:3|required',
        ]); 

        $post->update([
            'title' => $request->title, 
            'body'  => $request->body
        ]); 

        if ($request->hasfile('image')) {

            $valid = $request->validate([
                'image' => 'file|image|max:5000'
            ]); 

            $request->image->store('/posts/images/'); 
        
            $post->update([
                'file' => $request->image->hashName()
            ]); 

        }


        return 'saved.'; 

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete(); 
    }
}
