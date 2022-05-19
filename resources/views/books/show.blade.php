@extends('layouts.app')

@section('content')

<!--bookから、それぞれを呼び出す。登録されたものが、表示されるはず。-->

    <h1 class="detailed_page_heading"> {{ $book->title }} の詳細ページ</h1>

 <table class="form-table　book_newly_registration">
        <tr>
            <th>値段</th>
            <td>{{ $book->price }}</td>
        </tr>
        <tr>
            <th>評価</th>
            <td>@include('rating.rating')</td>
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
    
    <div class="button01">
        <a href="{{ route('books.edit', ['book'=>$book->id]) }}">この本の情報を更新する</a>
    </div>
    
      {{-- 本の削除フォーム --}}
   
   <div class="button02red">
        <form  id="deleteSubmit" action="{{ route('books.destroy', $book->id) }}" method="POST">
      @csrf
      本を削除する
    </form>
   </div>
   
    
    

<script src="{{ asset('/js/test.js') }}"></script>

         
            
         
@endsection