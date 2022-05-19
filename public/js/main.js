    $('#createSubmit').on('click', function(){
        // jqueryにおける、クリックイベントの搭載の仕方。idがcreateSubmitということを、こういう形で表記する
       var result = window.confirm('登録してよろしいでしょうか？');
    //   window.confirm を書くことで、OK　キャンセルの分岐を出す
        if( result ){
            // 正しい場合、ファイルを反映、すなわち提出ができるようにしている。
        $('form').submit();
        }else{
            return false;
            // これを書くことによって、処理をしないようにしている。
        }
    });

    $('#updateSubmit').on('click', function(){
        // jqueryにおける、クリックイベントの搭載の仕方。idがupdateSubmitということを、こういう形で表記する
       var result = window.confirm('内容を更新してよろしいでしょうか？');
    //   window.confirm を書くことで、OK　キャンセルの分岐を出す
        if( result ){
            // 正しい場合、ファイルを反映、すなわち提出ができるようにしている。
        $('form').submit();
        }else{
            return false;
            // これを書くことによって、処理をしないようにしている。
        }
    });

 $('#deleteSubmit').on('click', function(){
        // jqueryにおける、クリックイベントの搭載の仕方。idがdeleteSubmitということを、こういう形で表記する
       var result = window.confirm('本当に削除してよろしいでしょうか？');
    //   window.confirm を書くことで、OK　キャンセルの分岐を出す
        if( result ){
            // 正しい場合、ファイルを反映、すなわち提出ができるようにしている。
        $('form').submit();
        }else{
            return false;
            // これを書くことによって、処理をしないようにしている。
        }
    });

$('#logout').on('click', function(){
        // jqueryにおける、クリックイベントの搭載の仕方。idがdeleteSubmitということを、こういう形で表記する
       var result = window.confirm('ログアウトしてよろしいでしょうか？');
    //   window.confirm を書くことで、OK　キャンセルの分岐を出す
        if( result ){
            // 正しい場合、ファイルを反映、すなわち提出ができるようにしている。
        $('form').submit();
        }else{
            return false;
            // これを書くことによって、処理をしないようにしている。
        }
    });
    
    
$('#unbookmarkSubmitkai').on('click', function(){
        // jqueryにおける、クリックイベントの搭載の仕方。idがdeleteSubmitということを、こういう形で表記する
       var result = window.confirm('ブックマークを解除してよろしいでしょうか？');
    //   window.confirm を書くことで、OK　キャンセルの分岐を出す
        if( result ){
            // 正しい場合、ファイルを反映、すなわち提出ができるようにしている。
        $('form').submit();
        }else{
            return false;
            // これを書くことによって、処理をしないようにしている。
        }
    });
    // const formSubmit = function(){
    //      if( result ){
    //         // 正しい場合、ファイルを反映、すなわち提出ができるようにしている。
    //     $('form').submit();
    //     }else{
    //         return false;
    //         // これを書くことによって、処理をしないようにしている。
    //     }
    // }