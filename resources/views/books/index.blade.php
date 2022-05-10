@extends('layouts.app')

@section('content')

<!--一応、自分の想定通りに仮にコーディングしてみた。-->
<!--表には、何冊目、タイトル、値段を表示するようにしている。-->
<!--データは、$booksから取得するようにしている。-->
<!--それぞれの項目において、id、title、priceを取得し、それを表示することを意図している。-->

<!--上記、おそらく動作するとは思うが（ページは問題なく表示される）追加しないことにはまだ安心はできない。-->
<!--とりあえず、エラーは出ないことが分かったので、このまま作成を進めたいと考えている。-->

<!--なお、合計取得額の記載など、まだまだやるべきことは多いと思われるので、油断はできない。-->


<h2>あなたがこれまでに読んだ本の合計額は{{$sum}}円です。</h2>

 {{-- 本を投稿する場所へのリンク --}}
 <div class="d-grid gap-2">
    {!! link_to_route('books.create', '新しく本を追加する', [], ['class' => 'btn btn-outline-secondary']) !!}
</div>
    <h1>あなたが最近読んだ本</h1>

    @if (count($books) > 0)
        <table class="table table-striped">
            <thead>
                <tr>
                    <th width="200px">画像</th>
                    <th>タイトル</th>
                    <th>値段</th>
                    <th>メモ</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($books as $book)
                <tr>
                   <td><img src="upload/{{$book->image}}" width="75px"></td>  
                    <td>{!! link_to_route('books.show', $book->title, ['book' => $book->id]) !!}</td>
                    <td>{{ $book->price}}</td>
                    <td>{{ $book->memo}}</td>
                </tr>
                <!--今回、エラーが出てしまった場所。原因は、$book->idとすべきところが、$book->titleとしてしまったがために、-->
                <!--URLがtitleのもの（books/test みたいなの。正しくはbooks/1）に遷移するということになってしまったことによる。-->
                <!--このlink_to_routeにおいては、何が引数なのか、何に遷移すればいいのか、ということを-->
                <!--考えて使わなければならないだろう。解決するにはURLの確認、デベロッパーツールなどの使用、dd関数など。-->
                @endforeach
            </tbody>
        </table>
    @endif

@endsection