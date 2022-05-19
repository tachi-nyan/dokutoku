
    <nav class="navbar navbar-expand-sm navbar-dark bg-info">
        <!--ここでは、ナビゲーションバーの大きさや色を指定している。-->
        
        {{-- トップページへのリンク --}}
        <a class="navbar-brand" href="/">Dokutoku📖</a>

        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#nav-bar">
            <span class="navbar-toggler-icon"></span>
        </button>


        <div class="collapse navbar-collapse" id="nav-bar">
            <ul class="navbar-nav mr-auto"></ul>
            <ul class="navbar-nav">
             
                @if (Auth::check())
                    {{-- リンク --}}
                    <a href="{{ route('books.bookmarks') }}"　 class="nav-link" >ブックマーク</a>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">{{ Auth::user()->name }}</a>
                        <ul class="dropdown-menu dropdown-menu-right">
                            {{-- ログアウトへのリンク --}}
                            <li class="dropdown-item"><a href="{{ route('logout.get') }}" class = "dropdown-item" id= "logout">ログアウト</a></li>
                        </ul>
                    </li>
                @else
                 {{-- ユーザ登録ページへのリンク --}}
                    <li class="nav-item"><a href="{{ route('signup.get') }}" class = "nav-link">新規登録</a></li>
                    
                    {{-- ログインページへのリンク --}}
                    <li class="nav-item"><a href="{{ route('login') }}" class = "nav-link">ログイン</a></li>
                   
                @endif
            </ul>
        </div>
    </nav>