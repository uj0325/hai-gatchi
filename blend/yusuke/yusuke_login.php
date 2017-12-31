
<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="utf-8">
	<title>ログイン前</title>
	<style type="text/css">
		body {
			background-color: white;
		}
		.welcome {
			text-align: center;
			background-image: url(login_background.jpg);
			background-size: cover;
			padding-bottom: 300px;
			color: black;
		}
		.form {
			text-align: center;
		}
		.login {
			float: left;
		}
		.resister {
			float: left;
		}
	</style>
</head>
<body>
	<header>
		<div style="height: 80px">
			<img src="../images/gatchi_logo88.gif" alt="ロゴ" style="margin-left:20px; width: 150px;height:80px;">
			<img src="welcome.jpg" alt="ようこそ暇人さん。" style="position: absolute;left: 0px;right: 0px;top: 0px;margin: auto;width:150px;height:80px;">
		</div>
	</header>

	<div class="welcome" style="margin-top: -20px">
		<h1 style="padding-top:150px; font-size: 50px; color: white;">
			WHAT IS 「はい、合致～」？
		</h1>
		<p style="font-weight: bold; font-size: 25px; color: white;">ちょっと暇？急に暇？最速で暇人同士をはい合致！<br>独りが苦手なあなたの心のスキマ、お埋めします。
		</p>
		<div class="form" style="padding-left: 400px; padding-top: 30px; margin-top: 100px">
			<div class="login" style="margin-right: 25px; background-color: #f8f2f2; padding: 0 20px;">
				<p>「はい、合致～」会員ログイン</p>
				<form action="../yoka/cushion_page.php" method="POST">
					<input type="text" placeholder="メールアドレス" style="width: 250px; height: 30px; margin-bottom: 20px;"><br>
					<input type="password" placeholder="パスワード" style="width: 250px; height: 30px; margin-bottom: 20px;"><br>

					<a href="../yoka/cushion_page.php">
						<img src="../images/login_button.jpg" type="submit" style="width: 200px; height: 30px; margin-bottom: 15px;">
					</a>
					<!-- <input type="submit" value ="ログイン" style="width: 250px; height: 30px; margin-bottom: 20px;"> -->
					<div style="font-size: 10px;">
						<div style="float: left; font-size: 15px;">
							次回から自動ログインを有効にする
						</div>
						<input type="checkbox" style="float: left; height: 15px; width: 15px; margin-left: 15px;">
					</div>
				</form>
			</div>

			<div class="resister" style="background-color: #f8f2f2; margin-left: 25px; padding: 0 20px; ">
				<p>「はい、合致～」無料会員登録</p>
				<form action="resister.php" method="POST">
					<input type="text" placeholder="ユーザー名" style="width: 250px; height: 30px; margin-bottom: 10px;"><br>
					<input type="text" placeholder="メールアドレス" style="width: 250px; height: 30px; margin-bottom: 10px;" ><br>
					<input type="password" placeholder="パスワード" style="width: 250px; height: 30px; margin-bottom: 10px;"><br>
					<a href="../annabox/portfolio_anna.html"><img src="../images/create_account.jpg" type="submit" style="width: 200px; height: 30px; margin-bottom: 15px;"></a>



					<!-- <input type="submit" value="アカウント作成" style="width: 250px; height: 30px; margin-bottom: 15px;"> -->
				</form>
			</div>
		</div>
	</div>



	<footer style="width: 100%; background-color: #f8f2f2 ; float: left; padding-bottom: 20px;" >
	       <?php 

		require('../footer.html'); 

		?>
    </footer>


</body>
</html>