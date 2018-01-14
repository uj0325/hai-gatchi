<?php
// 合致通知ボタンが押されるとチャット画面に通知が来るようにする
// ボタン押す→DBに１が入る→自動でデータ取得→取得したら通知発動
// AJAXでPOST送信→DBにINSERT→成功したら○○に通知を送りました
var_dump($_POST);

?>
<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="utf-8">
	<title>チャット</title>
</head>
<body>
<script type="text/javascript">
    Push.create('こんにちは！', {
        body: '更新をお知らせします！',
        icon: 'icon.png',
        link: 'chat.php',
        timeout: 8000, // 通知が消えるタイミング
        vibrate: [100, 100, 100], // モバイル端末でのバイブレーション秒数
        onClick: function(){
        // 通知がクリックされた場合の設定
        console.log(this);
    }
});
</body>
</html>