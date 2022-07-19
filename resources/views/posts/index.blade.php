<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        {{Auth::user()->name}}
    </head>
    <body>
        @extends('layouts.app')　　
        
        @section('content')
        <h1>"上野原市-マチコミ"</h1>  
        <p Class="cleate">[<a href='/posts/create'>create</a>]</p>
         <div class='posts'>
          @foreach ($posts as $post)
                <div class='post'>
                    
                    <a href="/posts/{{ $post->id }}">{{ $post->title }}</a>
                     <a href="">{{ $post->category->name }}</a>
                     <a href="/categories/{{ $post->category->id }}">{{ $post->category->name }}</a>
                     <a href='/posts/create'> <h3>create</h3> </a>
                     <small>{{ $post->user->name }}</small>
                     <p>{{ $post->body }}</p>
                     <p class='body'>{{ $post->body }}</p>
                </div>
        @endforeach
        </div>
        <div class='paginate'>
            {{ $posts->links() }}
        @endsection
    </body>
</html>
