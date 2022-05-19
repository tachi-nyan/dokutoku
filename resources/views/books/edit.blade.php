@extends('layouts.app')

@section('content')

<!--本のタイトルを表示。$bookから、タイトルの値を持ってきている。-->
<h1>{{ $book->title }} の更新ページ</h1>

<!--更新のフォーム。更新の際の記述（method="post"）から、methodとしている記述法に注目。-->
    <div class="row">
       
             <form  action="{{ route('books.update', $book->id) }}" method="POST" enctype="multipart/form-data" class="book_newly_registration">
            @csrf
            
           <table class="form-table">
    <tr>
        <th class="form-item">本のタイトル<span class="required"></span></th>
        <td class="form-body">
          
         <input type="text" name="title" class="form-control" value="{{$book->title}}" />
         
        </td>
    </tr>
     <tr>
        <th class="form-item">本の値段<span class="price_required"></span></th>
        <td class="form-body">
         <input type="text" name="price" class="form-control" value="{{$book->price}}" />
        </td>
    </tr>
    <tr>
        <th class="form-item">本の評価<span class="required"></span></th></th>
        <td class="form-body">
        <div class="rate-form">
          <input id="star5" type="radio" name="rate" value="5">
          <label for="star5">★</label>
          <input id="star4" type="radio" name="rate" value="4">
          <label for="star4">★</label>
          <input id="star3" type="radio" name="rate" value="3">
          <label for="star3">★</label>
          <input id="star2" type="radio" name="rate" value="2">
          <label for="star2">★</label>
          <input id="star1" type="radio" name="rate" value="1">
          <label for="star1">★</label>
        </div>
        </td>
    </tr>
     <tr>
        <th class="form-item">本の画像</th>
        <td class="form-body">
         <input type="file" name="image"class=form-image />
        </td>
    </tr>
     <tr>
        <th class="form-item">本のメモ</th>
        <td class="form-body">
         <input type="text" name="memo" class="form-control" value="{{$book->memo}}" />
        </td>
    </tr>
            </table>
           
           <input id="updateSubmit" class="form-submit form-shadow" type="submit" value="更新" />

            </form>
            
           
    
    </div>

@endsection

