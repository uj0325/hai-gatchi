<?php 
 	//メインページ

	// require()関数
	// include()関数
	// どちらも、外部のファイルを読み込む
	
	// 処理をまとめる機能を持つ関数を別ファイルで持っておき、
	// 可読性のために別ファイルから呼び出す。
	require('parts/function.php');

	// テスト実行
	// helloWorld();

 ?>


 <!DOCTYPE html>
 <html lang="ja">
 <head>
 	<meta charset="utf-8">
 	<title></title>
 </head>
 <body>
 	<div>
 		<?php //ヘッダーを呼び出す  ?>
 		<?php require('parts/header.php') ?>
 	</div>

 	<div>
 		メインページのコンテンツです。<br>
 		<?php backbutton('next.php','こっちでも次のページにいけるよ'); ?>
 		
 		<br>テスト<br>
 		<?php backbutton('index.php','メインページへ') ?><br>
 		<?php backbutton('index.php','マイページへ') ?><br>
 		<?php backbutton('index.php','編集画面へ') ?><br>
 		<?php backbutton('index.php','ログインへ') ?><br>
 		<br>テスト<br>



 		<a href="next.php">次のページへ</a>
 	</div>

 	<div>
 		<?php //フッターを呼び出す ?>
 		<?php require('parts/footer.php') ?>
 	</div>

 
 </body>
 </html>