<body>
     @extends('layouts.app')
      @section('content')
      
    <h1 class="title">タイムライン編集画面</h1>
    <div class="content">
        <form action="/posts/timeline/editname" method="PUT">
            @csrf
            @method('PUT')
            </div>
            <div class='content__body'>
                <h2>本文</h2>
                <input type='text' name='text' value="{{ $tweets->tweet }}">
            </div>
            <input type="submit" value="保存">
            
        </form>
        @endsection
    </div>
</body> 