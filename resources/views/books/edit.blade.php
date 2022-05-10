@extends('layouts.app')

@section('content')

<h1>{{ $book->title }} の更新ページ</h1>

    <div class="row">
        <div class="col-6">
            {!! Form::model($book, ['route' => ['books.update', $book->id], 'method' => 'put', 'files' => true]) !!}

            <input type="file" name="image">

                <div class="form-group">
                    {!! Form::label('title', 'タイトル:') !!}
                    {!! Form::text('title', null, ['class' => 'form-control']) !!}
                </div>
                 <div class="form-group">
                    {!! Form::label('price', '値段:') !!}
                    {!! Form::text('price', null, ['class' => 'form-control']) !!}
                </div>

                 <div class="form-group">
                    {!! Form::label('memo', 'メモ:') !!}
                    {!! Form::text('memo', null, ['class' => 'form-control']) !!}
                </div>

                {!! Form::submit('更新', ['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}
            
           
    </div>
    </div>

@endsection