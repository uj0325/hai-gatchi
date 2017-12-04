<?php 
	// 関数について

	// ・ユーザー定義関数（自作関数）
	// ・組み込み関数
	// 例:count(),empty(),strlen()

	// 構文：
	// 自作関数の定義
	// function 関数名(){
	// 	ここに処理を記載
	// }

	// 関数の使用方法
	// 関数名();
	// 例:count($array); // 配列の長さが取得できる

	// 一番シンプルな形の関数
	// function helloWorld(){
	// 	echo 'hello function<br>';
	// }

	// helloWorld(); // echo 'hello function<br>';

	// 引数がある関数
	function backbutton($button,$value){
		// バックボタンのレイアウトを統一する
		echo  '<a href="'.$button.'"><div class="btn btn-default">'.$value.'</div></a>';

	}

	// 引数がある関数を呼び出すときは、
	// 呼び出す際も引数の数だけ、データを用意しなければならない。
	// 用意しないと　Missing argument というエラーが発生する。

	// 【対処法】
	// 引数の設定が呼び出す際になかった場合を想定して、
	// デフォルト値を定義側に記載する。

	// 関数のreturnについて(戻り値)


 ?>