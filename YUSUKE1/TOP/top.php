<?php
session_start();
require('../dbconnect.php');

$_SESSON['login_user']['id']=1;
$login_user = $_SESSON['login_user']['id'];
$friend = 2;

require('request.php');
require('receive.php');

?>

<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="utf-8">
	<title>練習</title>
	<!-- ========stylesheet======== -->
	<link rel="stylesheet" type="text/css" href="top.css">
	<!-- ========fontawesome======== -->
	<link rel="stylesheet" type="text/css" href="../font-awesome-4.7.0/css/font-awesome.min.css">
	<!-- ========jQuery======== -->
	<script src="../jQuery/jquery-3.1.1.js"</script>
    <script src="../jQuery/jquery-migrate-1.4.1.js"></script>
    <!-- ========AJAX======== -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

</head>

<body>
	<header>
		<span style="line-height: 56px; font-size: 25px;">ようこそ暇人さん</span>
		<div id="hamburger">
			<i class="fa fa-bars" aria-hidden="true"></i>
		</div>
		<div id="friend-add">
			<a href="../ID/idcreate.php"><i class="fa fa-user-plus" aria-hidden="true"></i></a>
		</div>
		<div id="alert">
			<i class="fa fa-bell" aria-hidden="true"></i></i>
		</div>
	</header>
<!-- 	<div id="sidevar">
		<h1>はい合致<h1>
		<div class="upper-list">
			<ul>
				<li><a>TOP</a></li>
				<li><a>マイページ</a></li>
				<li><a>設定</a></li>
				<li><a>ログアウト</a></li>
			</ul>
		</div>
		<div class="bottom-list">
			<ul>
				<li><a>個人情報保護方針</a></li>
				<li><a>運営者情報</a></li>
				<li><a>利用規約</a></li>
				<li><a>ヘルプ</a></li>
			</ul>
		</div>
	</div> <!-- side -->

	<div id="himajin">
		<h1>暇人一覧</h1>
		<form method="POST" action="">
			<div>
				<p>aaaaaaaaaa</p>
				<button type="submit" name="request" value="request">合致申請</button>
			</div>
			<div>
				<p>aaaaaaaaaa</p>
				<button type="submit" name="request" value="request">合致申請</button>
			</div>
			<div>
				<p>aaaaaaaaaa</p>
				<button type="submit" name="request" value="request">合致申請</button>
			</div>
			<div>
				<p>aaaaaaaaaa</p>
				<button type="submit" name="request" value="request">合致申請</button>
			</div>
			<div>
				<p>aaaaaaaaaa</p>
				<button type="submit" name="request" value="request">合致申請</button>
			</div>
			<div>
				<p>aaaaaaaaaa</p>
				<button type="submit" name="request" value="request">合致申請</button>
			</div>
			<div>
				<p>aaaaaaaaaa</p>
				<button type="submit" name="request" value="request">合致申請</button>
			</div>
			<div>
				<p>aaaaaaaaaa</p>
				<button type="submit" name="request" value="request">合致申請</button>
			</div>
		</form>
	</div><!-- himajin -->

	<div id="request">
		<h1 style="padding-top: 50px;">リクエストユーザー</h1>
		<?php foreach($requested as $requests): ?>
			<form method="POST" action="">
			<p><?php echo $requests['requesting_user']; ?></p>
				<input type="hidden" name="requesting_user" value="<?php echo $requests['requesting_user']; ?>">
				<button type="submit" name="accept" value="accept">承認</button>
			</form>
		<?php endforeach ?>
	</div>

	<div id="recommend">
		<h1>おすすめユーザー</h1>
		<form method="POST" action="">
			<div>
				<p>aaaaaaaaaa</p>
				<button type="submit" name="request" value="request">合致申請</button>
			</div>
			<div>
				<p>aaaaaaaaaa</p>
				<button type="submit" name="request" value="request">合致申請</button>
			</div>
			<div>
				<p>aaaaaaaaaa</p>
				<button type="submit" name="request" value="request">合致申請</button>
			</div>
			<div>
				<p>aaaaaaaaaa</p>
				<button type="submit" name="request" value="request">合致申請</button>
			</div>
		</form>
	</div>
</body>
</html>