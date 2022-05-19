<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Book; // これを追加することで、Bookモデルのデータを使用することになる

use App\User;
use Illuminate\Support\Facades\Auth;//ユーザーIDをなんとかする

use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\SoftDeletes;

// use App\DB;



class BooksController extends Controller
{
    public function index()
    {
         //もしログインされてなかった場合は、トップページに飛びます。ちなみに（！　）はNotを表す
        if(!Auth::id()){
            return view('welcome');
        }else{
            
        $user = Auth::id();
        //追加した本の一覧をidの降順で取得。
        //データを取得するコードが必要なので、書いた。
        // Bookというモデルからもってきたidを、この順に並べる。最新のやつを五個まで表示。
        $books = Book::where('user_id',Auth::id())->orderBy('id', 'desc')->paginate(5);
        // ユーザーごとの本の数を集計する、countを定義する
        $count = Book::where('user_id',Auth::id())->count('id');
        // ユーザーごとの本の値段の合計額を集計する、sumを定義する。
        $sum = Book::where('user_id',Auth::id())->sum('price');
        // ビューでそれを表示する。resources/views/books/index.blade.phpを意味する。
       
        return view('books.index', [
            // 渡したいデータの配列を指定する。$books に入ったデータをViewに渡すためである。
            'books' => $books,
            'sum'=> $sum,
            'count'=>$count,
        ]);
        }
    }
    
    
    // 「新規登録画面表示処理」を書いていく。
    public function create()
    {
        
        // フォームの入力項目のために $book = new Book; でインスタンスを作成している。
        $book = new Book;
        
        // 本の新規登録ビューを表示。
        return view('books.create', [
            'book' => $book,
        ]);
    }
    
    
    

    
     // postでbooks/にアクセスされた場合の「新規登録処理」
    public function store(Request $request)
    {
        
         // バリデーション
        $request->validate([
            'image' => 'nullable|max:2048|mimes:jpg,jpeg,png,gif',
            'title' => 'required|max:100',
            'memo' => 'nullable|max:255',
            'rate' => 'required',
            'price' => 'required|integer|max:100000000',
        ]);
        
        
        //画像のアップロード機能を表す。
        //fileに出された名前をとってきて、それが空かそうでないかで分岐をする。
         $file = $request->file('image');
    if(!empty($file)){
        //こうすることで、オリジナルの画像の名前で取得する。
        $filename = $file->getClientOriginalName();
        $move = $file->move('./upload/',$filename);
    }else{
        $filename = null;
    }
   
        $book = new Book;
        $book->title = $request->title;
        $book->memo = $request->memo;
        $book->price = $request->price;
        $book->rate = $request->rate;
        $book->image = $filename;
        $book->user_id = Auth::id();
        $book->save();
        
         
        // トップページへリダイレクトさせる
        return redirect('/');
    }
      

    // getでbooks/（任意のid）にアクセスされた場合の「取得表示処理」
    public function show($id)
    {
         // idの値で本を検索して取得
        $book = Book::findOrFail($id);

        // 詳細ビューでそれを表示
        
        if (\Auth::id() === $book->user_id) {
            return view('books.show', [
            'book' => $book,
         ]);
        }
          // トップページへリダイレクトさせる
        return redirect('/');
        
    }

    // 「更新画面表示処理」
    public function edit($id)
    {
        // idの値で投稿を特定、取得
        $book = Book::findOrFail($id);

        // 編集ビューでそれを表示
        if (\Auth::id() === $book->user_id) {
        return view('books.edit', [
            'book' => $book,
        ]);
        }
         
         // トップページへリダイレクトさせる
        return redirect('/');
    }

    // putまたはpatch（任意のid）にアクセスされた場合の「更新処理」
   public function update(Request $request, $id)
    {
         // バリデーション
        $request->validate([
            'image' => 'nullable|max:2048|mimes:jpg,jpeg,png,gif',
            'title' => 'required|max:100',
            'rate' => 'required',
            'memo' => 'nullable|max:255',
            'price' => 'required|integer|max:100000000',
        ]);
        
         //画像のアップロード機能を表す。
        //fileに出された名前をとってきて、それが空かそうでないかで分岐をする。
         $file = $request->file('image');
    if(!empty($file)){
        //こうすることで、オリジナルの画像の名前で取得する。
        $filename = $file->getClientOriginalName();
        $move = $file->move('./upload/',$filename);
    }else{
        $filename = null;
    }
     
  
        // idの値で検索して取得
        $book = Book::findOrFail($id);
        // それぞれを更新
        $book->title = $request->title;
        $book->price = $request->price;
        $book->rate = $request->rate;
        $book->image = $filename;
        $book->memo = $request->memo;
        $book->save();


        // トップページへリダイレクトさせる
        return redirect('/');
    }

    // 「削除処理」
    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();


         // トップページへリダイレクトさせる
        return redirect('/');
    }
    
    /**
     * ユーザのブックマーク一覧ページを表示するアクション。
     *
     * @param  $id  ユーザのid
     * @return \Illuminate\Http\Response
     */
    public function bookmarks()
    {
        
        // ユーザーを識別する。
        $user = Auth::user();
        
        // ユーザーのブックマーク一覧を取得する。
        $bookmarks = $user->bookmarks()->orderBy('id', 'desc')->paginate(10);

        // ブックマーク一覧ビューでそれらを表示。
        return view('books.bookmarks', [
            'books' => $bookmarks,
            'user' => $user,
        ]);
    }
    
}
