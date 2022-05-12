@extends('layouts.app')

@section('content')

    <h1>本の新規投稿ページ</h1>
    
 <!--ここは、動作は確認できたので、ちゃんとしたデザインにすることを最終の目標としたい。-->

    <h5>あなたが借りて読んだ本を登録しましょう！</h5>
    <div class="row">
        <div class="col-6">

            <form  action="{{ route('books.store', $book) }}" method="POST" enctype="multipart/form-data">
            @csrf
                  
            <label>
                本の画像
            </label>       
            <input type="file" name="image">
            <br>
            <label>
                本のタイトル
            </label>   
            <input class = form-control type="text" name="title">
            
            <label>
                本の値段（半角英数字）
            </label>   
            <input class = form-control type="text" name="price">
            
            <label>
                本のメモ
            </label>   
            <input class =form-control type="text" name="memo">
            

                <div class="form-group">
                   
                </div>

                <button id="createSubmit" class="btn btn-primary">投稿</button>

            </form>
        </div>
    </div>
@endsection