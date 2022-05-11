@extends('layouts.app')

@section('content')

<!--bookから、それぞれを呼び出す。登録されたものが、表示されるはず。-->

    <h1> {{ $book->title }} の詳細ページ</h1>

    <table class="table table-bordered">
         <tr>
            <th>値段</th>
            <td>{{ $book->price }}</td>
        </tr>
         <tr>
            <th>画像</th>
            
            <td>
                @if($book->image == null)
                        <img src="{{asset('noImage/noimage.png')}}" width="75px">
                    @else
                        <img src="{{asset('upload/'.$book->image)}}" width="75px"> 
                    @endif
               
                </td> 
        </tr>
        <tr>
            <th>メモ</th>
            <td>{{ $book->memo }}</td>
        </tr>
    </table>
    
    {{-- 本の編集ページへのリンク --}}
    {!! link_to_route('books.edit', 'この本の情報を更新する', ['book' => $book->id], ['class' => 'btn btn-light']) !!}
    
      {{-- 本の削除フォーム --}}
    {!! Form::model($book, ['route' => ['books.destroy', $book->id], 'method' => 'delete']) !!}
   
        <button id="deleteSubmit" class="btn btn-danger">削除</button>
    {!! Form::close() !!}

<script src="{{ asset('/js/test.js') }}"></script>

@endsection