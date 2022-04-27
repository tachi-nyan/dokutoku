@extends('layouts.app')

@section('content')

    <h1>本の新規投稿ページ</h1>
    
    <!--ページは問題なく表示されるが、追加はできない。ここをどう組み立てていくかを考える必要がある。-->

    <div class="row">
        <div class="col-6">
            {!! Form::model($book, ['route' => 'books.store']) !!}

                <div class="form-group">
                    {!! Form::label('title', '本のタイトル:') !!}
                    {!! Form::text('title', null, ['class' => 'form-control']) !!}
                     {!! Form::label('image', '本の画像:') !!}
                    {!! Form::file('image', null, ['class' => 'form-control']) !!}
                     {!! Form::label('price', '本の値段:') !!}
                    {!! Form::text('price', null, ['class' => 'form-control']) !!}
                     {!! Form::label('memo', '本のメモ:') !!}
                    {!! Form::text('memo', null, ['class' => 'form-control']) !!}
                </div>

                {!! Form::submit('投稿', ['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}
        </div>
    </div>
@endsection