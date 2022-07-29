@extends('layouts.app')

@section('content')
<div class="container mt-3" style="max-width: 720px;">
  <div class="text-right">
  <a href="{{ url('/product/create') }}">＜ 戻る</a>
  </div>

  <form>
    <div class="form-group">
      <label for="genreAdd" class="font-weight-bold">新規カテゴリー追加</label>
      <input type="text" class="form-control" id="genreAdd" name="name" />
    </div>
    <button type="submit" class="btn btn-primary">追加</button>
  </form>

  <div class="my-4">
    <a href="{{ url('/genre/') }}">＞ 一覧・編集ページへ</a>
  </div>
</div>
@endsection