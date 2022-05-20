@extends('layouts.app')

@section('content')

 <input id="image_capacity_large_when_alert" type="hidden" value="{{session('message')}}" />

<!--表には、何冊目、タイトル、値段を表示するようにしている。-->
<!--データは、$booksから取得するようにしている。-->
<!--それぞれの項目において、id、title、priceを取得し、それを表示することを意図している。-->

@if (count($books) == 0)
<h2 class="bookCount">あなたはまだ本を一冊も登録していません。</h2>
<h2 class="bookSum">いますぐ本を登録しましょう！</h2>
 <div class="d-grid gap-2">
   <div class="button01">
  <a href="{{ route('books.create') }}">新しく本を登録する</a>
</div>
</div>
@else
<!--ユーザーの、合計の本の冊数、合計額を記載した。-->
<h2 class="bookCount">あなたはこれまでに{{$count}}冊の本を登録しました！</h2>
<h2 class="bookSum">あなたがこれまでに登録した本の合計額は{{$sum}}円です。</h2>


 {{-- 本を投稿する場所へのリンク --}}
 <div class="d-grid gap-2">
       <div class="button01">
  <a href="{{ route('books.create') }}">新しく本を登録する</a>
</div>
</div>

<!--本の数が1冊以上であれば、表として表示することができる。-->
    <h5 class="bookRecently">あなたが登録した本</h5>

    @if (count($books) > 0)
        <table class="table">
            <thead>
                <tr>
                    <th width="200px">画像</th>
                    <th width="200px">タイトル</th>
                    <th>値段</th>
                    <th>評価</th>
                    <th>メモ</th>
                    <th>ブックマークボタン</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($books as $book)
                <tr>
                    <td>
                    @if($book->image == null)
                        <img src="noImage/noimage.png" width="75px">
                    @else
                        <img src="upload/{{$book->image}}" width="75px"> 
                    @endif
                    </td> 
                    <!--本のタイトルを押すと、その本の詳細ページに飛ぶようにした。-->
                    <td><a href="{{ route('books.show', ['book'=>$book->id]) }}">{{$book->title}}</td>
                    <td>{{ $book->price}}</td>
                    <td>
                    @include('rating.rating')
                     </td>
                    <td>{{ $book->memo}}</td>
                    <td>@include('book_bookmarks.bookmark_button')</td>
                  
                </tr>
                
                  
                <!--前回のエラーが出てしまった場所。原因は、$book->idとすべきところが、$book->titleとしてしまったがために、-->
                <!--URLがtitleのもの（books/test みたいなの。正しくはbooks/1）に遷移するということになってしまったことによる。-->
                <!--routeの使用においては、何が引数なのか、何に遷移すればいいのか、ということを考えて使わなければならないだろう。解決するにはURLの確認、デベロッパーツールなどの使用、dd関数など。-->
                @endforeach
            </tbody>
        </table>
    @endif
    {{ $books->links() }}
@endif
@endsection