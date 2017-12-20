<?php
	 					$dsn = 'mysql:dbname=hi_gatch;host=localhost';
		  				$user = 'root';
						$password = '';
						$dbh = new PDO($dsn,$user,$password);
						$dbh->query('SET NAMES utf8'); 

						$sql = 'UPDATE `gatch_users` SET
		                      `login`=?
		                       WHERE
		                      `user_id`=?;
		                ';
		                $user_id=htmlspecialchars($_GET['user_id']);

						$data = array(0,$user_id);
						//SQL文を実行する準備を行う
						$stmt = $dbh->prepare($sql);
						//SQL文を実行する(?マークを上書きして実行)
						$stmt->execute($data);
						header('Location: top.php');
						exit;
?>