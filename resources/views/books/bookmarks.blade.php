@extends('layouts.app')

@section('content')
            {{-- お気に入り一覧 --}}
        
        @if(count($user->bookmarks) == 0)
        
        <h2 class="bookmark_list_page">まだブックマークした本がありません…</h2>
        <h2 class="bookmark_list_page_sub">お気に入りの本があれば、ブックマークしてみましょう！</h2>

        @endif
        
        
         @if (count($books) > 0)
          <h2 class="bookmark_list_page">{{ Auth::user()->name }} さんのブックマーク一覧ページ</h2>
          
        <table class="table">
            <thead>
                <tr>
                    <th width="200px">画像</th>
                    <th width="200px">タイトル</th>
                    <th>値段</th>
                    <th>評価</th>
                    <th>メモ</th>
                    <th>登録解除</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($books as $book)
                <tr>
                    <td>
                    @if($book->image == null)
                        <img src="/noImage/noimage.png" width="75px">
                    @else
                        <img src="/upload/{{$book->image}}" width="75px"> 
                    @endif
                    </td> 
                    <!--本のタイトルを押すと、その本の詳細ページに飛ぶようにした。-->
                    <td><a href="{{ route('books.show', ['book'=>$book->id]) }}">{{$book->title}}</td>
                    <td>{{ $book->price}}</td>
                    <td>@include('rating.rating')</td>
                    <td>{{ $book->memo}}</td>
                    <td>@if (Auth::user()->is_bookmark($book->id))
                    <!--もしも、認証ユーザーがブックマークしてる状態なのであれば…-->
                    
                        {{-- ブックマーク削除ボタンのフォーム --}}
                       <form action="{{ route('bookmarks.unbookmark', ['book'=>$book->id]) }}" method="POST">
                           @csrf
                           <button id="unbookmarkSubmitkai" class="btn btn-danger">ブックマーク解除</button>
                       </form>
                    @endif
                    </td>
                  
                </tr>
                
                  
                <!--前回のエラーが出てしまった場所。原因は、$book->idとすべきところが、$book->titleとしてしまったがために、-->
                <!--URLがtitleのもの（books/test みたいなの。正しくはbooks/1）に遷移するということになってしまったことによる。-->
                <!--routeの使用においては、何が引数なのか、何に遷移すればいいのか、ということを考えて使わなければならないだろう。解決するにはURLの確認、デベロッパーツールなどの使用、dd関数など。-->
                @endforeach
            </tbody>
        </table>
    @endif
        </div>
    </div>
@endsection