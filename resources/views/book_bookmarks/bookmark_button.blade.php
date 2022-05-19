@if (Auth::user()->is_bookmark($book->id))
<!--もしも、認証ユーザーがブックマークしてる状態なのであれば…-->

    {{-- ブックマーク削除ボタンのフォーム --}}
   <form action="{{ route('bookmarks.unbookmark', ['book'=>$book->id]) }}" method="POST">
       @csrf
       <button id="unbookmarkSubmit" class="btn btn-danger">ブックマーク中！</button>
   </form>
@else
    {{-- ブックマークボタンのフォーム --}}
    <form action="{{ route('bookmarks.bookmark', ['book'=>$book->id]) }}" method="POST">
       @csrf
       <button id="bookmarkSubmit" class="btn btn-warning">ブックマークする</button>
   </form>
@endif