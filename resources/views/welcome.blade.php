@extends('layouts.app')

@section('content')
 
<div class="bg">
    <div class="glass">
  <h1 class="display-4">図書館本管理サービス
  <br>Dokutoku</h1>
  <p class="subtitle">~賢く「ドクトクな」読書をしよう~</p>
  <hr class="my-4">
  <p>Dokutokuは、あなたの読書と節約を応援するサービスです。
  <br>本を借りて、読んで、得をしよう！</p>
  {{-- ユーザ登録ページへのリンク --}}
 <div class="welcomebtn">
       <form action="{{ route('signup.get') }}" method="get">
       @csrf
       <button class="btn btn--orange btn--cubic btn--shadow">新規登録する</button>
       
   </form>
 {{-- ログインページへのリンク --}}
      <form action="{{ route('login') }}" method="get">
       @csrf
      
       <button class="btn btn--orange btn--cubic btn--shadow">ログインする</button>

   </form>
</div>
    </div>
</div>
@endsection