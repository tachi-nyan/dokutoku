@extends('layouts.app')

@section('content')

    <h1>本の新規投稿ページ</h1>
    
 <!--ここは、動作は確認できたので、ちゃんとしたデザインにすることを最終の目標としたい。-->

    <h5>あなたが借りて読んだ本を登録しましょう！</h5>
    <div class="row">
        <div class="col-6">
            
           
    
            {!! Form::model($book, ['route' => 'books.store','files' => true]) !!}
            <input type="file" name="image">

                <div class="form-group">
                    {!! Form::label('title', '本のタイトル:') !!}
                    {!! Form::text('title', null, ['class' => 'form-control']) !!}
                     {!! Form::label('price', '本の値段:') !!}
                    {!! Form::text('price', null, ['class' => 'form-control']) !!}
                     {!! Form::label('memo', '本のメモ:') !!}
                    {!! Form::text('memo', null, ['class' => 'form-control']) !!}
                </div>

                <button id="createSubmit" class="btn btn-primary">投稿</button>

            {!! Form::close() !!}
        </div>
    </div>
@endsection