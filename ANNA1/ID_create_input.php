<?php 
require('dbconect_gatch.php');

require('ID_sql.php');


 ?>


 <!DOCTYPE html>
 <html lang="ja">
 <head>
 	<meta charset="utf-8">
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

<!-- idcreateから
 -->
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


 	<title>作成と入力</title>

</head>
   <body>
   
   <h1>はい合致edit</h1>

<br>
<br>
 　　　<div class="container">
 	　　　  <div class="row">
 		　    　<div class="col-xs-6">
			 		   <h4>ID出力画面</h4>
			 　　　  <div>
					     <form method="POST" action="">
						   <input  type="text" name="onetimeId" value="<?php echo $r_str; ?>" id="onetime" >
						   </input>
						   <input type="submit" name="idCreate" class="btn btn-primary" value="コピーする" onclick="clipboadCopy()">
					     </form>
				　　   </div>

　　　　　　　<!-- 履歴 -->
	   	 <div class="past">
				     <h4>コピー履歴</h4>
				<?php foreach ($created_id as $key): ?>
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
        					<a href="../TOP/top.php">トップへ</a>
              </div>    
			      </div><!-- col-xs-6 -->
        <div class="col-xs-6">
        <h4>ID入力画面</h4>	
        
          <div>
            <form method="POST" action="">
              <input  type="text" name="idInput" placeholder="友達から受け取ったIDを入力してください">
              </input>
              <input type="submit" value="友達追加" class="btn btn-primary">
            </form>
          </div>


        </div><!-- col-xs-6 -->
 	   </div><!-- row -->
   </div><!-- container -->


 </body>
 </html>