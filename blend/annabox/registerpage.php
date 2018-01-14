<?php
/*
sign.phpで実装すること*/
/*$_SESSIONというスーパーグローバル変数が使えるようになる
おまじないとして使う場合は記載しておく
session_start()がないと$_SESSIONは使えない
session_start()は複数回組んではいけない*/
session_start();
if(!isset($_SESSION['user_info'])){
//$_SESSIONが存在しない。つまり前の画面から飛んできていない
	/*＄＿SESSIONがない状態だとエラーが発生するので
	強制的に前の画面に戻してあげる
	headerとexit();はセットでつかいます*/
/*header('Location:signup.php');
exit();*/

}
/*
①バリデーション
②プロフィール画像をアップロードする
③セッションデータを使用しデータを一時的に保存する
④次のページへ移動する
*/
$username='';
$email='';
$password='';

/*POST送信されたかどうかを確認する*/
/*var_dump($_POST)*//*でバック関数は本番では使用しない
*/

/*
画像のアップロードの関して*/
/*$_FILES というスーパーグローバル変数を用意する*/
/*【注意点】*/
/*$_FILESを使用するには
enctype = "multiprat/form-data"という記述が必要になる
*/


if(!empty($_POST)){

	/*登録確認ボタンを押したときのみに動作するボタン*/

	echo '登録確認ボタンを押した！<br>';
	/*issetとempty
	isset->存在するとTRUEを出力する
	empty->存在しないとTUREを出力する
	!isset()->isset()の結果と逆を出力する
	!empty()->empty()の結果と逆を出力する*/
	
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = $_POST['password'];


	// エラー件数チェック
	$errors=array();
	//バリテーション（検証）
	if ($username==''){
	echo "ユーザー名が登録されていません";
	$errors['username']='blank';
	}

	if ($email==''){
         $errors['email']='blank';
     }
	if ($password==''){
         $errors['password']='blank';
     }elseif (strlen($password)<4) {
     /*	strlen()関数
     strlen('ここの文字')=>数字で文字の数になる*/
    /* mb_strlen()関数文字をcountする日本語対応*/
   $errors['password']='length';
     }
/*画像のバリデーション*/
if(!empty($_FILES['profile_image']['name']))
{
/*ファイル名があったらここの処理が動く*/
/*画像の拡張子チェック*/
/*プログラムは拡張子によって挙動が変化します
後ろから3文字抜き出す*/
$filename = $_FILES['profile_image']['name'];

$ext = substr($filename,-3);
/*echo$filename . 'の拡張子は'. $ext;*/

if ($ext != 'jpg' && $ext !='png' && $ext !='git') {
/*ここのIF 分に入ったら拡張子が(jpg,png,gif)以外*/
$errors['profile_image'] = 'extention';
}
}else{
/*ファイル名がなかったら、ファイルをアップロードしていない*/
 $errors['profile_image']='blank';

}


   if(empty($errors)){
   	echo'エラーがありませんでした確認画面に移動します<br>';
  /*  エラーがなかったら「画像を保存」しましょう
    move_uploaded_file(設定1,設定2);*/
  /* 画像をアップロードするために用意されている関数*/
  /* 設定一の部分では
   画像のpassを設定(場所/ファイル)
   設定2の部分
   保存するパスの設定*/
   /*フォルダの書き込み権限を読み書き可能な状態にする*/
   move_uploaded_file($_FILES['profile_image']['tmp_name'],'../profile_image/'.$_FILES['profile_image']['name']);
 /*これで画像を保存することができる*/

/*エラーがない場合はセッションにもデータを保存してあげる
*/

$_SESSION['user_info']['username']=$username;
$_SESSION['user_info']['email']=$email;
$_SESSION['user_info']['password']=$password;
$_SESSION['user_info']['profile_image']=$filename;

/*リダイレクト（ポスト送信を破棄してリンクを飛ばす）*/
header('Location:check.php');
exit;

}
}



//ユーザー登録ボタンを押したときのみ動作するプログラムを記述
if(!empty($_POST)){

/*現在、ユーザーが入力した登録したいユーザー名などは
$_SESSIONが保持している
これを永続的に歩zんするためDBに登録を行う
*/

}


?>

<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>ログイン前</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Website Template by FreeHTML5.co" />
	<meta name="keywords" content="free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive" />
	<meta name="author" content="FreeHTML5.co" />

 
  	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
	<link rel="shortcut icon" href="favicon.ico">

	<link href='https://fonts.googleapis.com/css?family=Roboto:400,300,600,400italic,700' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="annabox/css_anna/animate_anna.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css_anna/icomoon_anna.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css_anna/bootstrap_anna.css">
	<!-- Owl Carousel -->
	<link rel="stylesheet" href="css_anna/owl.carousel.min_anna.css">
	<link rel="stylesheet" href="css_anna/owl.theme.default.min_anna.css">
	<!-- Theme style  -->
	<link rel="stylesheet" href="css_anna/style_anna.css">

	<!-- Modernizr JS -->
	<script src="js_anna/modernizr-2.6.2.min_anna.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->
	
</head>
<body>
	<br>
  <h1 style="text-align: center;">はい合致login前top</h1>



<div class="container">
	<div class="row">
		<div class="col-xs-6">
			<br>
			<h3>はい合致会員登録画面</h3>
			<form method="POST" action="" enctype="">
	
              <label>ユーザー名</label>
               <br>
              <input type="text" name="gatchname" 
               placeholder="例：太郎" value="">
               <br>
              
              <label>emailアドレス</label>
               <br>
              <input type="text" name="gatemail" 
               placeholder="例：tom@tom" value="">
               <br>

               <label>プロフィール画像</label>
               <br> 
                <input type="file" name="gatemail" 
               placeholder="例：tom@tom" value="">
               <br>
               
               <label>パスワード</label>
               <br>
              <input type="text" name="gatchpass" 
               placeholder="例：tom@tom" value="">
               <br>

            </form>
		</div>
		<!-- ここまで会員登録 -->
        
		<div class="col-xs-6">
			<h3>はい合致ログイン</h3>

　　　　　　　<form method="POST" action="" enctype="">
           　 <label>emailアドレス</label>
               <br>
              <input type="text" name="gatemail" 
               placeholder="例：tom@tom" value="">
               <br>


             <label>パスワード</label>
               <br>
              <input type="text" name="gatchpass" 
               placeholder="例：tom@tom" value="">
               <br>
			　</form>
			  <input type="submit" name="ログイン">
		</div>
	</div>
</div>


</body>
</html>


