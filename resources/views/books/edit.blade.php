@extends('layouts.app')

@section('content')


<h1>{{ $book->title }} の更新ページ</h1>

    <div class="row">
        <div class="col-6">
             <form  action="{{ route('books.update', $book->id) }}" method="POST" enctype="multipart/form-data">
        
            @method('PUT')
            @csrf
            <input type="file" name="image">

                <div class="form-group">
                    {!! Form::label('title', 'タイトル:') !!}
                    {!! Form::text('title', $book->title, ['class' => 'form-control']) !!}
                </div>
                 <div class="form-group">
                    {!! Form::label('price', '値段:') !!}
                    {!! Form::text('price', $book->price, ['class' => 'form-control']) !!}
                </div>

                 <div class="form-group">
                    {!! Form::label('memo', 'メモ:') !!}
                    {!! Form::text('memo', $book->memo, ['class' => 'form-control']) !!}
                </div>

                <button id="updateSubmit" class="btn btn-primary">更新</button>
            
          </form>
            
           
    </div>
    </div>

@endsection

