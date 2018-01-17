<?php
session_start();
require('../dbconnect.php');

$sql = "SELECT *
        FROM  `users`
        WHERE `id`= 1
        ";
    $data = array();
    $stmt = $dbh->prepare($sql);
    $stmt->execute($data);
    $user_info = $stmt->fetch(PDO::FETCH_ASSOC);



$_SESSION['login_user']['id']=$user_info['id'];
$_SESSION['login_user']['conditioned']= $user_info['conditioned'];
$login_id = $_SESSION['login_user']['id'];
$login_condition = $_SESSION['login_user']['conditioned'];

require('himajin.php');
require('condition_gatch.php');
// require('request.php');
// require('receive.php');

// if (empty($_POST['tochatpage'])) {
//     $sql='INSERT INTO `gatch`
//              SET  `requesting_user`=?,
//                   `receive_user` =?
//     ';
//     $data=array($_POST['jibun'],$_POST['aite']);
//     $stmt=$dbh->prepare($sql);
//     $stmt->execute($data);
// }
?>

<!DOCTYPE html>
<html lang="ja">
<head>

    <meta charset="utf-8">
    <title>練習</title>
    <!-- ========stylesheet======== -->
    <link rel="stylesheet" type="text/css" href="top.css">
    <!-- ========fontawesome========-->
    <link rel="stylesheet" type="text/css" href="../font-awesome-4.7.0/css/font-awesome.min.css">
    <!-- ========jQuery======== -->
    <script src="../jQuery/jquery-3.1.1.js"</script>
    <script src="../jQuery/jquery-migrate-1.4.1.js"></script>
    <!-- ========AJAX======== -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <!-- ========push.js======== -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/push.js/0.0.11/push.min.js">Push.Permission.request();</script>
    <!-- ========PHPで定義した変数をJSで使う======== -->
    <script type="text/javascript">
        var login_id = <?php echo json_encode($login_id); ?>;
        var login_condition = <?php echo json_encode($login_condition); ?>;
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
                <a href="../../ANNA1/chatpage.php?id=<?php echo $login_users['id']; ?>" style="text-decoration: none;">
                    <button type="submit" class="tochat">
                        <img src="../profile_image/<?php echo $login_users['profileImage'] ?>">
                    </button>
                </a>
                <p><?php echo $login_users['username']; ?></p>
                <button class="push">合致通知</button>
            </div>
        <?php endforeach ?>
    </div><!-- himajin -->

    <div id="gatch">
        <h1>合致ユーザー</h1>
        <?php foreach($condition_gatch as $condition_gatch): ?>
            <div>
            <a href="../../ANNA1/chatpage.php?id=<?php echo $condition_gatch['id']?>"
            style="text-decoration: none;">
                <button type="submit" class="tochat">
                    <img src="../profile_image/<?php echo $condition_gatch['profileImage'] ?>">
                </button>
            </a>
                <p><?php echo $condition_gatch['username']; ?></p>
                <button class="push">合致通知</button>
            </div>
        <?php endforeach ?>
    </div><!-- gatch -->

    <div id="condition">
        <p>あなたのコンディションは<img id="test" src="../images/<?php echo $login_condition; ?>">です</p>
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
<script type="text/javascript" src="condition.js"></script>
<script type="text/javascript" src="push.js"></script>

</body>
</html>
<?php
// ・自動的にphpファイルを読み込む方法
// ・phpファイルにデータを送信する前に条件分岐する方法
 ?>