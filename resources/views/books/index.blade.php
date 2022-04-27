@extends('layouts.app')

@section('content')

<!--一応、自分の想定通りに仮にコーディングしてみた。-->
<!--表には、何冊目、タイトル、値段を表示するようにしている。-->
<!--データは、$booksから取得するようにしている。-->
<!--それぞれの項目において、id、title、priceを取得し、それを表示することを意図している。-->

<!--上記、おそらく動作するとは思うが（ページは問題なく表示される）追加しないことにはまだ安心はできない。-->
<!--とりあえず、エラーは出ないことが分かったので、このまま作成を進めたいと考えている。-->

<!--なお、合計取得額の記載など、まだまだやるべきことは多いと思われるので、油断はできない。-->

 {{-- 本を投稿する場所へのリンク --}}
    {!! link_to_route('books.create', '新しく本を追加する', [], ['class' => 'btn btn-primary']) !!}
 
    <h1>最近読んだ本の一覧</h1>

    @if (count($books) > 0)
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>何冊目</th>
                    <th>タイトル</th>
                    <th>値段</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($books as $book)
                <tr>
                    <td>{{ $book->id }}</td>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->price}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif

@endsection