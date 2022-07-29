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
        <h1>上野原マチコミ</h1>
        <p Class="timeline">[<a href='/posts/timeline'>"グループチャットに参加する"</a>]</p>
        <p Class="create">[<a href='/posts/create'>ブログ作成</a>]</p>
      
         <div class='posts'>
          @foreach ($posts as $post)
                <div class='post'>
                     <a href="/posts/{{ $post->id }}">{{ $post->title }}</a>
                     <a href="">{{ $post->category->name }}</a>
                     <small>{{ $post->user->name }}</small>
                     <p>{{ $post->body }}</p>
                     <img src="{{ Storage::url($post->image)}}" width="100px">
                </div>
        @endforeach
        </div>
        <div class='paginate'>
            {{ $posts->links() }}
            
        @endsection
    </body>
</html>
