<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
    </head>
    <body>
        <h1>Blog Name</h1>
        <form method="post" action="{{ route('posts.store') }}">
            @csrf
            <div class="title">
                <h2>Title</h2>
                <input type="text" name="post[title]" placeholder="タイトル"/>
            </div>
            <div class="body">
                <h2>Body</h2>
                <textarea name="post[body]" placeholder="山梨県　上野原市"></textarea>
            </div>
            <input type="submit" value="保存"> <div [<a href="/">store</a>] </div>
        </form>
        <div class="back">[<a href="/">back</a>]</div>
    </body>
</html>
