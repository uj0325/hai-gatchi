<?php //CSSとJSを呼び出す ?>
 		<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
 		<script type="assets/js/bootstrap.js"></script>
 		<?php //ヘッダーのメニュータグを作成 ?>
 		<div  style="background-color: #f5f5f5;position: fixed;left:0px;width:15%;height:100%;z-index: 10;">
	 					
	 			<div style="padding:5px;text-align: center">
	 				<img src="parts_image/gatchi_logo.gif" width="120px">
	 			</div>
	 			<br>
	 			<div style="padding:5px;font-size: 20px;text-align: center">
	 				<a href="main.php">TOP</a>
	 			</div>
	 			<br>
	 			<div style="padding:5px;font-size: 20px;text-align: center">
	 				<a href="mypage.php">マイページ</a>
	 			</div>
	 			<br>	
	 			<div style="padding:5px;font-size: 20px;text-align: center">
	 				<a href="set.php">設定</a>
	 			</div>
	 			<br>	
	 			<div style="padding:2px;font-size: 20px;text-align: center">
	 				<a href="logout.php?user_id=<?php echo $user_id; ?>">log out</a>
	 			</div>
	 			<br><br>
	 			<br><br>
	 			<div style="font-size: 16px;text-align: center">
	 				<a href=""></a>
	 			</div>
	 			<br>
	 			<div style="font-size: 16px;text-align: center">
	 				<a href="">個人情報保護方針</a>
	 			</div>
	 			<br>
	 			<div style="font-size: 16px;text-align: center">
	 				<a href="">運営者情報</a>
	 			</div>
	 			<br>
	 			<div style="font-size: 16px;text-align: center">
	 				<a href="">利用規約</a>
	 			</div>
	 			<br>
	 			<div style="font-size: 16px;text-align: center">
	 				<a href="">ヘルプ</a>
	 			</div>
	 			<br>
	 	</div>
