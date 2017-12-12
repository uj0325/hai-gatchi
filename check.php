<?php
	
	// if(empty($_POST)){
	// 	echo 'データを入力してください。<br>';
	// 	echo '<a href="top.php">新規会員情報入力画面へ戻る</a>';
	// 	exit();
	// }

	$username=htmlspecialchars($_POST['username']);
	$email=htmlspecialchars($_POST['email']);
	$password=htmlspecialchars($_POST['password']);

?>
<!DOCTYPE html>
<html lang='ja'>
<head>
	<meta charset="utf-8">
	<title>新規会員入力情報確認画面</title>
</head>
<body>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
 	<script type="assets/js/bootstrap.js"></script>
 	
	<div style="text-align: center">
			<h1>入力内容確認</h1>
			<br>
			<div class="container">
				<div class="row">
					<div  class="col-lg-12" style="background-color: #e5fff2;">
						<?php
						echo '<h3>ユーザーネーム:' . $username .'様</h3>';
						echo '<h3>メールアドレス:' . $email .'</h3>';
						echo '<h3>パスワード:ユーザー設定のパスワード</h3>'; 
						?>
					</div>
				</div>
			</div>
			<br>
	
			<?php if ($username != '' && $email != '' && $password != ''): ?>
			<h4>こちらの内容で送信してもよろしいですか。</h4>
			<?php  endif;?>
			<br>

		<form method="POST" action="thanks.php">
			<input type="button" value="戻る" onclick="history.back()">

			<!-- 隠しデータをformで送信する -->
			<input type="hidden" name="username" value="<?php echo $username; ?>">
			<input type="hidden" name="email" value="<?php echo $email; ?>">
			<input type="hidden" name="password" value="<?php echo $password; ?>">

			<!-- if文の処理を分けて記述 -->
			<?php if ($username != '' && $email != '' && $password != ''): ?>
			<input type="submit" value="よろしいですよ。">
			<?php endif; ?>
			<br>

		</form>
	</div>

</body>
</html>