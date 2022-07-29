<?php

namespace App\Http\Controllers;

use App\Post;
use App\Http\Requests\PostRequest;
use App\Category;

class PostController extends Controller
{
    
    public function index(Post $post)
    {
       
    return view('posts/index')->with(['posts' => $post->getPaginateByLimit(5)]);
    }
    
    public function show(Post $post)
    {
        return view('posts.show')->with(['post' => $post]);
    }

    
    public function create(Category $category)
    {
    return view('posts/create')->with(['categories' => $category->get()]);;
    }
    
    public function store(PostRequest $request, Post $post)
    {
    $input = $request['post'];
    $input += ['user_id' => $request->user()->id];
    $post->fill($input)->save();
    return redirect('/posts/'.$post->id);
     
     $inputs=request()->validate([
            'title'=>'required|max:255',
            'body'=>'required|max:255',
            'image'=>'image'
        ]);
 
        // 画像ファイルの保存場所指定
        if(request('image')){
            $filename=request()->file('image')->getClientOriginalName();
            $inputs['image']=request('image')->storeAs('public/images', $filename);
        }
 
        // postを保存
        $post->create($inputs);
    }

    
    public function delete(Post $post)
    {
    $post->delete();
    return redirect('/');
    }
    
    public function edit(Post $post)
    {
    return view('posts/edit')->with(['post' => $post]);
    }
    
    public function update(PostRequest $request, Post $post)
    {
    $input_post = $request['post'];
    $input_post += ['user_id' => $request->user()->id]; 
    $post->fill($input_post)->save();
    return redirect('/posts/' . $post->id);
    }
    
    public function uenohara(Post $post)
    {
        return view ('posts.uenohara');
    }
}