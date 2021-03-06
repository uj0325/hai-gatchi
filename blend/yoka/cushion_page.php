<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="utf-8">
	<title>コンディション設定</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Website Template by FreeHTML5.co" />
	<meta name="keywords" content="free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive" />
	<meta name="author" content="FreeHTML5.co" />











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
	<link rel="stylesheet" href="css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.css">
	<!-- Owl Carousel -->
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">
	<!-- Theme style  -->
	<link rel="stylesheet" href="cushion_page.css">

	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
</head>
<body>

<header>
	<img src="../images/gatchi_logo88.gif" class="logo">
	<img src="../images/header_asset02.jpg" class="header-img">
</header>

<div id="heading">

	<h1>今のあなたの気分は？</h1>
	<p>３つまで選択できます。</p>

	<!-- <div class="condition-btn"> -->
		
		<!-- <img src="../images/drink_green_btn3.gif" class="individual" >
		<img src="../images/drive_green_btn3.gif" class="individual">
		<img src="../images/drinkathome_green_btn3.gif" class="individual">
		<br>
		<img src="../images/game_green_btn3.gif" class="individual">
		<img src="../images/cafe_green_btn3.gif" class="individual">
		<img src="../images/meal_green_btn3.gif" class="individual">

		<br>
		<img src="../images/shopping_green_btn3.gif" class="individual">
		<img src="../images/karaoke_green_btn.gif" class="individual">
		<img src="../images/other_green_btn3.gif" class="individual"> -->

	
	<!-- 試し -->
	<!-- <div class="checkbox02"> -->
  <label>
    <input type="checkbox" name="checkbox01[]" class="checkbox01-input">
    <span class="checkbox01-parts"><img src="../images/drink_green_btn3.gif" class="individual" id="test" onclick="tom()"></span>
  </label>
  <label>
    <input type="checkbox" name="checkbox01[]" class="checkbox01-input">
    <span class="checkbox01-parts"><img src="../images/drive_green_btn3.gif" class="individual" id="test2" onclick="tom2()"></span>
  </label>
  <label>
    <input type="checkbox" name="checkbox01[]" class="checkbox01-input">
    <span class="checkbox01-parts"><img src="../images/drinkathome_green_btn3.gif" class="individual" id="test3" onclick="tom3()"></span>
  </label>
  <br>
  <label>
    <input type="checkbox" name="checkbox01[]" class="checkbox01-input">
    <span class="checkbox01-parts"><img src="../images/game_green_btn3.gif" class="individual" id="test4" onclick="tom4()"></span>
  </label>

   <label>
    <input type="checkbox" name="checkbox01[]" class="checkbox01-input">
    <span class="checkbox01-parts"><img src="../images/cafe_green_btn3.gif" class="individual" id="test5" onclick="tom5()"></span>
  </label>

  <label>
    <input type="checkbox" name="checkbox01[]" class="checkbox01-input">
    <span class="checkbox01-parts"><img src="../images/meal_green_btn3.gif" class="individual" id="test6" onclick="tom6()"></span>
  </label>
  <br>

  <label>
    <input type="checkbox" name="checkbox01[]" class="checkbox01-input">
    <span class="checkbox01-parts"><img src="../images/shopping_green_btn3.gif" class="individual" id="test7" onclick="tom7()"></span>
  </label>

    <label>
    <input type="checkbox" name="checkbox01[]" class="checkbox01-input">
    <span class="checkbox01-parts"><img src="../images/karaoke_green_btn.gif" class="individual" id="test8" onclick="tom8()"></span>
  </label>

    <label>
    <input type="checkbox" name="checkbox01[]" class="checkbox01-input">
    <span class="checkbox01-parts"><img src="../images/other_green_btn3.gif" class="individual" id="test9" onclick="tom9()"></span>
  </label>


<script type="text/javascript">
	function tom(){		
		var test = document.getElementById('test');
		if ( document.getElementById("test").classList.contains('individual') ){
			test.classList.remove('individual');	
			test.classList.add('tomtom');		
		}else{
			test.classList.remove('tomtom');	
			test.classList.add('individual');		
		}
	}

		function tom2(){		
		var test = document.getElementById('test2');
		if ( document.getElementById("test2").classList.contains('individual') ){
			test.classList.remove('individual');	
			test.classList.add('tomtom');		
		}else{
			test.classList.remove('tomtom');	
			test.classList.add('individual');		
		}
	}

	function tom3(){		
		var test = document.getElementById('test3');
		if ( document.getElementById("test3").classList.contains('individual') ){
			test.classList.remove('individual');	
			test.classList.add('tomtom');		
		}else{
			test.classList.remove('tomtom');	
			test.classList.add('individual');		
		}
	}


	function tom4(){		
		var test = document.getElementById('test4');
		if ( document.getElementById("test4").classList.contains('individual') ){
			test.classList.remove('individual');	
			test.classList.add('tomtom');		
		}else{
			test.classList.remove('tomtom');	
			test.classList.add('individual');		
		}
	}

	function tom5(){		
		var test = document.getElementById('test5');
		if ( document.getElementById("test5").classList.contains('individual') ){
			test.classList.remove('individual');	
			test.classList.add('tomtom');		
		}else{
			test.classList.remove('tomtom');	
			test.classList.add('individual');		
		}
	}

	function tom6(){		
		var test = document.getElementById('test6');
		if ( document.getElementById("test6").classList.contains('individual') ){
			test.classList.remove('individual');	
			test.classList.add('tomtom');		
		}else{
			test.classList.remove('tomtom');	
			test.classList.add('individual');		
		}
	}

	function tom7(){		
		var test = document.getElementById('test7');
		if ( document.getElementById("test7").classList.contains('individual') ){
			test.classList.remove('individual');	
			test.classList.add('tomtom');		
		}else{
			test.classList.remove('tomtom');	
			test.classList.add('individual');		
		}
	}

	function tom8(){		
		var test = document.getElementById('test8');
		if ( document.getElementById("test8").classList.contains('individual') ){
			test.classList.remove('individual');	
			test.classList.add('tomtom');		
		}else{
			test.classList.remove('tomtom');	
			test.classList.add('individual');		
		}
	}

	function tom9(){		
		var test = document.getElementById('test9');
		if ( document.getElementById("test9").classList.contains('individual') ){
			test.classList.remove('individual');	
			test.classList.add('tomtom');		
		}else{
			test.classList.remove('tomtom');	
			test.classList.add('individual');		
		}
	}


	// $(function()){
	// 	$('.individual').click(function()){
	// 		$(this).css(
 //    'transform', 'translateY(4px)'/*下に動く*/)
	// 	}
	// });



</script>
</div>

<!-- 試し -->

<div id="tsubuyaki-container">
	<h1>とりあえずつぶやいておきましょう</h1>
	<p>暇人募集のつぶやき（２０文字以内）</p>

	<textarea id="tsubuyaki"></textarea>
	<br>

<a href="../kai/kai_index.html"><img src="../images/search_friend_btn.gif" class="search"></a>
	

	

</div>



	<footer style="width: 100%; background-color: #f8f2f2 ; float: left; padding-bottom: 20px;" >
	       <?php 

		require('../footer.html'); 

		?>
    </footer>







</body>
</html>