// phpで定義した変数をjsで使いたい
// 変数を使ってクリックしたコンディションごとにphpファイルに送る値を変えたい
// おそらく eq() を使う
// クリックしたのが#karaoke なら condition =1,#cafeならcondition =2 など


$(function(){
   $('#karaoke').on('click',function(){
        $.ajax({
            type:"POST",
            url:"condition.php",
            data:{
                "login_id": login_id,
                "condition": 1,
            }
        })
        .done(function(data){
            $('#test').text('コンディションがかわりました');
            console.log(data);

        })
        .fail(function(data){
            $('#test').text("しっぱい");
            console.log(data);

        });
    });
});

