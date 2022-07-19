<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
    </head>
    <body>
        @extends('layouts.app')　　　　　　　　　　　　　　　　　　

        @section('content')
        <x-slot name="title">
        Blog Name
        </x-slot>
        <form action="/posts" method="POST">
            @csrf
            <h3> Title </h3>
                    <input type="text" name="post[title]" placeholder="タイトル" value="{{ old('post.title') }}"/>
                    <p class="title__error" style="color:red">{{ $errors->first('post.title') }}</p>
            <div>
            
               <h3>Body</h3>  
                <textarea name="post[body]" placeholder="山梨県　上野原市">{{ old('post.body') }}</textarea>
                 <p class="body__error" style="color:red">{{ $errors->first('post.body') }}</p>
            </div>
            <div class="category">
             <h2>Category</h2>
            <select name="post[category_id]">
            @foreach($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
             @endforeach
            </select>
            <input type="submit" value="保存">
            </form>
            <div class="back">[<a href="/">back</a>]</div>
             <div class="category">
            </div>
             </div>
           @endsection      
         </body>
    </html>
  