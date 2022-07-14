<!DOCTYPE HTML>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Posts</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="/css/app.css">
    </head>
    <body>
          @extends('layouts.app')
          
         @section('content')
        <h1 class="title">
            {{ $post->title }}
        </h1>
        <p class="edit">[<a href="/posts/{{ $post->id }}/edit">edit</a>]</p>
        <small>{{ $post->user->name }}</small>
        <div class="content">
            <div class="content__post">
                <h3>本文</h3>
                <p>{{ $post->body }}</p>    
            </div>
            <a href="/">戻る</a>
            </div>
         <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post" style="display:inline">
      @csrf
      @method('DELETE')
      <button type="submit">delete</button> 
     </form>
        <div class="footer">
        </div>
        @endsection
    </body>
</html>