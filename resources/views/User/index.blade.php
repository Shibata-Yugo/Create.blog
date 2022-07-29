<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
       @extends('layouts.app')
       @section('content')
    
      <div class="own_posts">
        @foreach($own_posts as $post)
            <div>
                <h4><a href="/posts/{{ $post->id }}">{{ $post->title }}</a></h4>
                <small>{{ $post->user->name }}</small>
                 <p>{{ $post->body }}</p>
            </div>
        @endforeach
       <div class='paginate'>
            {{ $own_posts->links() }}
        </div>
    </div>
        @endsection
    </body>
</html>

<div class="video">
<iframe width="640" height="360" src="https://www.youtube.com/embed/vBmiAdyRW0s" title="実は近いぞ上野原。男たちのアクティビティー編" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
</iframe>
</div>