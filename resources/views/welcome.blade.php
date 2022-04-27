@extends('layouts.app')

@section('content')
   <div class="center jumbotron">
  <h1 class="display-4">図書館本管理アプリ　ドクトク！</h1>
  <p class="lead">おトクで賢いあなただけの読書</p>
  <hr class="my-4">
  <p>ドクトク！は、あなたの読書と節約を応援するサービスです。本を借りて、読んで、得をしよう！</p>
  {{-- ユーザ登録ページへのリンク --}}
            {!! link_to_route('signup.get', '新規登録する！', [], ['class' => 'btn btn-lg btn-primary']) !!}
  
 {{-- ログインページへのリンク --}}
            {!! link_to_route('login', 'ログインする！', [], ['class' => 'btn btn-lg btn-primary']) !!}
</div>
@endsection