
<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="utf-8">
	<title>ログイン前</title>
	<link rel="stylesheet" type="text/css" href="yusuke_login.css">
</head>
<body>
	<header>
		<div class="logo">
			<img src="../images/gatchi_logo88.gif" alt="ロゴ">
		</div>
		<div class="welcome">
			<img  src="welcome.jpg" alt="ようこそ暇人さん。">
		</div>
	</header>

	<div class="top">
		<div class="hello">
			<h1>WHAT IS 「はい、合致～」？</h1>
			<p>ちょっと暇？急に暇？最速で暇人同士をはい合致！<br>独りが苦手なあなたの心のスキマ、お埋めします。
			</p>
		</div>
		<div class="form">
			<div class="login box">
				<div class="login-input">
					<p>「はい、合致～」会員ログイン</p>
					<form action="../yoka/cushion_page.php" method="POST">
						<input type="text" placeholder="メールアドレス"><br>
						<input type="password" placeholder="パスワード"><br>

						<a href="../yoka/cushion_page.php">
							<img src="../images/login_button.jpg" type="submit">
						</a>
						<!-- <input type="submit" value ="ログイン" style="width: 250px; height: 30px; margin-bottom: 20px;"> -->
						<div id="autologin">
							<p>次回から自動ログインを有効にする</p>
							<input type="checkbox" id="auto">
						</div>
					</form>
				</div>
			</div>

			<div class="resister box">
				<div class="resister-input">
					<p>「はい、合致～」無料会員登録！</p>
					<form action="resister.php" method="POST">
						<input type="text" placeholder="ユーザー名"><br>
						<input type="text" placeholder="メールアドレス"><br>
						<input type="password" placeholder="パスワード"><br>
						<a href="../annabox/portfolio_anna.html"><img src="../images/create_account.jpg" type="submit"></a>
						<!-- <input type="submit" value="アカウント作成" style="width: 250px; height: 30px; margin-bottom: 15px;"> -->
					</form>
				</div>
			</div>
		</div>
	</div>

	<?php require('../footer.html'); ?>


</body>
</html>