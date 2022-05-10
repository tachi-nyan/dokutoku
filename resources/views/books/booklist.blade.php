@extends('layouts.app')

@section('content')

<h1>あなたのこれまでの積み重ねです。</h1>

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
                   <td><img src="{{asset('upload/'.$book->image)}}" width="75px"></td>   
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