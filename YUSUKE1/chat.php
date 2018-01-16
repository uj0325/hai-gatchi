<?php

if (empty($_GET['id'])) {
    header('Location: top_push.php');
    exit();
}

?>
<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="utf-8">
	<title>チャット</title>
    <!-- ========jQuery======== -->
    <script src="../jQuery/jquery-3.1.1.js"</script>
    <script src="../jQuery/jquery-migrate-1.4.1.js"></script>
    <!-- ========push.js======== -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/push.js/0.0.11/push.min.js">Push.Permission.request();</script>
</head>
<body>

<button id="push">Push</button>
<script type="text/javascript">
  // jQueryを使うときの作法(おまじない、と称されるもの)
    $(document).ready(function(){
      // HTMLのコンテンツを全て読み込んだ後に実行する



        $('#push').click(function(){
            Push.create('こんにちは！', {
            body: '更新をお知らせします！',
            icon: 'icon.png',
            timeout: 8000, // 通知が消えるタイミング
            vibrate: [100, 100, 100], // モバイル端末でのバイブレーション秒数
                onClick: function() {
                // 通知がクリックされた場合の設定
                console.log(this);
                }
            });
        });
    });
</script>
</body>
</html>