<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>非同期通信</title>
    <script src="../jQuery/jquery-3.1.1.js"</script>
    <script src="../jQuery/jquery-migrate-1.4.1.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
</head>
<body>

<h1 id="test">データ入ってません</h1>
<button id="ajax">トムトム</button>
<script type="text/javascript">
        //button click
        $(function(){
        $('#ajax').on('click',function(){
            $.ajax({
                type:"POST",
                url:"push.php",
                data:{
                    "userid":"",
                }
            })
            .done(function(data){
                $('#test').text('データ入りました');
                console.log(data);

            })
            .fail(function(data){
                $('.result').html(data);
                console.log(data);

            });

        });
    });

</script>
</body>
</html>
<?php
// ・ajaxの挙動順序
// ・console.logの意味
// ・phpファイルからデータを受け取る方法
// ・自動的にphpファイルを読み込む方法
// ・phpファイルにデータを送信する前に条件分岐する方法
// ・

 ?>