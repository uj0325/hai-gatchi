<?php
session_start();
require('../dbconnect.php');

$_SESSON['login_user']['id']=1;
$_SESSON['login_user']['condition']=1;
$login_id = $_SESSON['login_user']['id'];
$friend = 2;

require('himajin.php');
require('condition_gatch.php');
// require('request.php');
// require('receive.php');

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
    <!-- ========PHPで定義した変数をJSで使う======== -->
    <script type="text/javascript">
        var login_id = <?php echo json_encode($login_id); ?>;
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

    <div id="himajin">
        <?php foreach($login_users as $login_users): ?>
            <div>
                <img src="../profile_image/<?php echo $login_users['profileImage'] ?>">
                <p><?php echo $login_users['username']; ?></p>
                <button>合致通知</button>
            </div>
        <?php endforeach ?>
    </div><!-- himajin -->

    <div id="gatch">
        <h1>合致ユーザー</h1>
        <?php foreach($condition_gatch as $condition_gatch): ?>
            <div>
                <p><?php echo $condition_gatch['username']; ?></p>
                <button class="gatch">合致通知</button>
            </div>
        <?php endforeach ?>
    </div><!-- gatch -->

    <div id="condition">
        <h1 id="test">コンディション</h1>
            <div>
                <button id="karaoke" style="width: 100px;">カラオケ</button>
                <button id="drive">
                    <img src="../images/i_drive.gif">
                </button>
                <button id="alcohol">
                    <img src="../images/i_nomi.gif">
                </button>
                <button id="cafe">
                    <img src="../images/i_cafe.gif">
                </button>
            </div>
    </div><!-- condition -->
<script type="text/javascript" src="ajax.js"></script>
</body>
</html>

<?php
// ・自動的にphpファイルを読み込む方法
// ・phpファイルにデータを送信する前に条件分岐する方法
 ?>