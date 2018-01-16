<?php

session_start();
require('dbconect_gatch.php');

/*仮データ*/


/*chatに自分と相手のidデータを持ってくるように紐づける*/
$sql='SELECT `requesting_user`,`receive_user` 
      FROM `gatch` WHERE `gatch_id`=?';
$data=array(1);
$stmt=$dbh->prepare($sql);
$stmt->execute($data);
$record=$stmt->fetch(PDO::FETCH_ASSOC);

$user=8;/*$record['requesting_user'];*/
$other=4;/*$record['receive_user'];*/

// 何かしらボタンが押されたら、ここの中のコードが動く
if(!empty($_POST)){
          $errors = array();
          $chat = htmlspecialchars($_POST['chat']);

  if($chat == ''){
          $errors['chat'] = 'blank';
          echo '何も入っていません';
                  }      

 if(empty($errors)){
      // エラーがなかったら、ここのif文の処理が動く

      // ツイートテーブルに呟いた内容を保存しておく！
      $sql ='INSERT INTO `gatch_chat` SET 
                                      `user_id`=?,
                                      `other_id`=?,
                                      `chat` = ?,
                                      `created`=NOW()
       ';
      $data = array($user,$other,$chat); 
      $stmt = $dbh->prepare($sql); 
      $stmt->execute($data); 

      }

}

/* チャット画面にchatを表示させるためのsql*/
      $sql = 'SELECT `chat`,`username`,`user_id`,`other_id`
                       `profile_image` 
             FROM      `gatch_chat`
             LEFT JOIN `gatch_users` 
             ON `gatch_chat`.`user_id`=`gatch_users`.`id`
             WHERE (user_id = ? AND other_id =?) 
             OR (user_id=? AND other_id=?)
             ORDER BY `gatch_chat`.`created` DESC
        ';
       $data = array($user,$other,$other,$user); 
       $stmt = $dbh->prepare($sql); 
       $stmt->execute($data); 
       $tweets = $stmt->fetchAll();

/*自分のプロフィールを表示したい*/
       $sql='SELECT `id`,`username`,`profile_image`, `created`
             FROM `gatch_users` WHERE `id`=?';
       $data = array($user); 
       $stmt = $dbh->prepare($sql); 
       $stmt->execute($data); 
       $user_profile = $stmt->fetch(PDO::FETCH_ASSOC);

/*相手のプロフィールを表示したい*/

       $sql='SELECT `id`,`username`,`profile_image`,`created`
             FROM `gatch_users` WHERE `id`=?';
       $data = array($other); 
       $stmt = $dbh->prepare($sql); 
       $stmt->execute($data); 
       $other_profile = $stmt->fetch(PDO::FETCH_ASSOC);
     
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>チャットページ</title>
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
 　
 　<!-- チャット画面 -->
  <link rel="stylesheet" href="css_anna/chatmain.css">

  <!-- Modernizr JS -->
  <script src="js_anna/modernizr-2.6.2.min_anna.js"></script>
  <!-- FOR IE9 below -->
  <!--[if lt IE 9]>
  <script src="js/respond.min.js"></script>
  <![endif]-->

</head>
<body>
  <h1 style="text-align: center;">はい合致チャット画面</h1>
     <p style="text-align: center; font-size: 20px">
      <?php echo $other_profile['username'];?>さんと合致しました！！</p>


  <div class="container">
    <div class="row">
      <div class="col-xs-4">
      　
              <h3 style="text-align: center;">マイプロフィール</h3>
               ようこそ：<?php 
                       echo $user_profile['username'] ;
                        ?>
              さん<br>
              <img src="profile_image/<?php echo $user_profile['profile_image'];?>" width="50px">
              <br>
              <span style="font-size: 12px ;text-align: center;">
               id:<?php echo $user_profile['id']; ?>
               / ユーザー名:
               <?php
                echo $user_profile['username'];?><br>
               登録日時 :<?php echo $user_profile['created'] ;?>
              </span>

             <form method="POST" action="">
          
             <textarea name="chat"></textarea>
             <br>
             <input type="submit" value="送信" class="btn btn-primary">           
             </form>
             <?php if(isset($errors) && $errors == 'blank'){ 
             ?>
             <div class="alert alert-danger">
              何も入力されていません。
             </div>
          <?php } ?>


             <br>
             
             <a href="logout.php" class="btn btn-danger">
              ログアウト
             </a>
             </div>
　<!-- ここまで自分のプロフィール　 -->　　


  <!-- 1件分のツイート -->
         

　　
       <div class="col-xs-4" >
              
        <h3 style="text-align: center;">チャット画面</h3>


<?php foreach($tweets as $t){ ?>

    <?php if($t['user_id']==$user){ // 自分だったら  ?>
        <!-- 自分のつぶやき -->
        <div class="chat-box">
          <div class="chat-face">
            <img src="profile_image/<?php echo  $user_profile['profile_image'];  ?>" alt="自分のチャット画像です。" width="90" height="90">
          </div>

          <div class="chat-area">
            <div class="chat-hukidashi">
              <?php echo $t['chat']; ?>

            </div>
          </div>
        </div>
    <?php }else{ //相手だったら ?>
        <!-- 相手のつぶやき -->
        <div class="chat-box">
          <div class="chat-face">
            <img src="profile_image/<?php echo $other_profile['profile_image'];  ?>" 
            alt="誰かのチャット画像です。" width="90" height="90">
          </div>
          <div class="chat-area">
            <div class="chat-hukidashi someone">
              <?php echo $t['chat']; ?>
            </div>
          </div>
        </div>
    <?php }?>
<?php }?>
          
        </div>
                <!--  ここまでチャット画面 -->

           <div class="col-xs-4" >
           <h3 style="text-align: center;" >合致メイト</h3>  
            ようこそ：<?php echo $other_profile['username']; ?>さん<br>

                 <img src="profile_image/<?php echo $other_profile['profile_image'];?>" width="50px">
                 <br>
                 <span style="font-size: 12px">
                  
                  id:<?php echo $other_profile['id']; ?>/
                   ユーザー名:<?php echo $other_profile['username']; ?><br>
                  登録日時 :<?php echo $other_profile['created'];?>
                 </span>

                 
           </div>
      <!-- ここまで相手のプロフィール　 -->
      </div>
    </div>
  </div>





</body>
</html>