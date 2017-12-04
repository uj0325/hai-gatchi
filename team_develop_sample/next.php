<?php 
 	//メインページ

	// require()関数
	// include()関数
	// どちらも、外部のファイルを読み込む

	// 相違点:エラーが起きた時の挙動
	// エラーが起きても最後まで処理を実行使用とするinclude関数
	// エラーが起きたら処理を止めようとするのがrequire関数
	//

	require('parts/function.php');

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
 		次ページのコンテンツです。<br>
 		<?php backbutton('index.php','戻る') ?>
 	</div>

 	<div>
 		<?php //フッターを呼び出す ?>
 		<?php require('parts/footer.php') ?>
 	</div>

 
 </body>
 </html>