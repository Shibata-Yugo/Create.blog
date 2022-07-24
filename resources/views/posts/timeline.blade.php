<!DOCTYPE HTML>
<html lang="ja" style="height:100%;">
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>SNSに参加しましょう！</title>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet" type="text/css">
    </head>
    <body style="height:100%; background-color: 
        <div class="wrapper" style="margin: 0 auto; width: 50%; height: 100%; background-color: white;">
            <form action="/timeline" method="post">
            {{ csrf_field() }}
                <div>
                    <input type="text" name="tweet" style="margin: 1rem; padding: 0 1rem; width: 70%; border-radius: 6px; border: 1px solid #ccc; height: 2.3rem;" placeholder="今どうしてる？">
                    <button type="submit" style="background-color: #2695E0; color: white; border-radius: 10px; padding: 0.5rem;">ツイート</button>
                </div>
                @if($errors->first('tweet')) 
                    <p style="font-size: 0.7rem; color: red; padding: 0 2rem;">※{{$errors->first('tweet')}}</p>
                @endif
            </form>

            <div class="tweet-wrapper"> 
                @foreach($tweets as $tweet)
                <div> 
                    <div>{{ $tweet->tweet }}</div>
                </div>
                @endforeach
            </div>
        </div>
        <script src="{{ mix('js/app.js') }}"></script>
    </body>
</html>
