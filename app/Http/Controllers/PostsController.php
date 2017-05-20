<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index()
    {
    	$posts = Post::orderby('id','desc')->paginate(10);
    	return view('posts.index') ->with(['posts' =>$posts]);

    }

    public function show(Post $post)
    { 

    	return view('posts.show')->with(['post'=>$post]);
    }

    public function create(){

        $post = new Post;
        return view('posts.create')->with(['post'=>$post]);

    }

    public function store(CreatePostRequest $request){
        /* // prueba para validar que los titulos sean diferentes 
        $posts=Post::all();
        dd($posts->all());
        */
        $post = new Post;
        $post->fill($request->only('title','description', 'url'));
        //pasar o obtener el id
        $post->user_id= auth()->user()->id;
        $post->save();

        session()->flash('message', 'Post Created!');

        return redirect()->route('posts_path');
    }


    public function edit(Post $post){
        if($post->user_id !=\Auth::user()->id){

            return redirect()->route('posts_path')
        }


        return view('posts.edit')->with(['post'=>$post]); 
    }


    public function update( Post $post, UpdatePostRequest $request){

       
        $post->update(
            $request->only(
                'title',
                'description',
                'url'));

        session()->flash('message', 'Post Update!');

        return redirect()->route('post_path',['post' =>$post->id]);

    }


    public function delete(Post $post){
        
        if($post->user_id !=\Auth::user()->id){

            return redirect()->route('posts_path')
        }
        
        $post->delete();

        session()->flash('message', 'Post delete!');
        return redirect()->route('posts_path');
    }

}

