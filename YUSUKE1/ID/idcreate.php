<?php
require('../dbconnect.php');

$loginuser = rand(101,200);
// $loginuser = 30;

	$str = array_merge(range('a', 'z'), range('0', '9'), range('A', 'Z'));
	$r_str = null;


		for ($i = 0; $i < 20; $i++) {
			$r_str .= $str[rand(0, count($str) - 1)];
		}
		// ここで$_strがDBにないか確認
		if (!empty($_POST)) { // $_strをコピーしたら
			echo "<br><br>".$_POST['onetimeId']."をコピーしました";

			$sql ="INSERT INTO `friend-add`
				   SET `creater_id` = ?,
				   	   `random` = ?,
		 			   `random_created` = NOW()";
			$data = array($loginuser,$_POST['onetimeId']);
			$stmt = $dbh->prepare($sql);
			$stmt->execute($data);
		}

	$sql = "SELECT `random`,`random_created`
			FROM   `friend-add`
			WHERE  `creater_id` = ?
	       ";

	$data = array($loginuser);
	$stmt = $dbh->prepare($sql);
	$stmt->execute($data);

	$created_id = $stmt->fetchall();
?>

<!DOCTYPE html>
<html lang="ja">
<head>
	<title>ID作成</title>
	<!-- ========stylesheet======== -->
	<link rel="stylesheet" type="text/css" href="../TOP/top.css">
	<!-- ========fontawesome======== -->
	<link rel="stylesheet" type="text/css" href="../font-awesome-4.7.0/css/font-awesome.min.css">
	<!-- ========jQuery======== -->
	<script src="../jQuery/jquery-3.1.1.js"</script>
    <script src="../jQuery/jquery-migrate-1.4.1.js"></script>
    <!-- ========AJAX======== -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script type="text/javascript">
        var clipboadCopy = function(){
            var id = document.getElementById("onetime");
            id.select();
            document.execCommand("copy");
        }
        </script>
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


	<div style="width: 75%; height:100%; position: fixed;left: 0;  text-align:center; padding-top: 100px;">
		<form method="POST" action="">
			<input style="width: 400px; padding: 5px; border: 1px solid black; display: inline-block; background-color: white; font-size: 20px; pointer-events: none;" type="text" name="onetimeId" value="<?php echo $r_str; ?>" id="onetime">
			</input>
			<input type="submit" name="idCreate" value="コピーする" onclick="clipboadCopy()">
		</form>
	</div>

	<div style="width: 25%; height: 100%; position: fixed; top: 50px; left: 75%; border-left: 1px solid black; overflow-x: auto;" >
		<h3>コピー履歴</h3>
		<?php foreach ($created_id as $key): ?>
			<p style="font-size: 10px;">
				<?php echo $key['random_created']; ?>
			</p>
			<p style="font-size:15px;">
				<?php echo $key['random']; ?>
			</p>
		<?php endforeach; ?>

		<br>
		<br>
		<br>
		<br>
		<a href="../TOP/top_push.php">トップへ</a>
	</div>




<?php require('created-destroy.php') ?>
</body>
</html>
