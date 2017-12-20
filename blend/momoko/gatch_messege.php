<?php 
	//session_start();
	//チャット
	// $user_id=$_SESSION['user']['user_id'];

 ?>

 <!DOCTYPE html>
 <html lang="ja">
 <head>
 	<meta charset="utf-8">
 	<title>はい、合致～!チャット画面</title>

 	<link href="assets/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="assets/css/main.css" rel="stylesheet">
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="assets/js/chart.js"></script>

 	<style type="text/css">
 		.mytext{
    		border:0;padding:10px;background:whitesmoke;
		}
		.text{
		    width:75%;display:flex;flex-direction:column;
		}
		.text > p:first-of-type{
		    width:100%;margin-top:0;margin-bottom:auto;line-height: 13px;font-size: 12px;
		}
		.text > p:last-of-type{
		    width:100%;text-align:right;color:silver;margin-bottom:-7px;margin-top:auto;
		}
		.text-l{
		    float:left;padding-right:10px;
		}        
		.text-r{
		    float:right;padding-left:10px;
		}
		.avatar{
		    display:flex;
		    justify-content:center;
		    align-items:center;
		    width:10%;
		    float:left;
		    padding-right:10px;
		}
		.macro{
		    margin-top:5px;width:85%;border-radius:5px;padding:5px;display:flex;
		}
		.msj-rta{
		    float:right;background:whitesmoke;
		}
		.msj{
		    float:left;background: snow;
		}
		.frame{
		    background:#e0e0de;
		    height:450px;
		    overflow:hidden;
		    padding:0;
		}
		.frame > div:last-of-type{
		    position:absolute;bottom:5px;width:100%;display:flex;
		}
		ul {
		    width:100%;
		    list-style-type: none;
		    padding:18px;
		    position:absolute;
		    bottom:32px;
		    display:flex;
		    flex-direction: column;

		}
		.msj:before{
		    width: 0;
		    height: 0;
		    content:"";
		    top:-5px;
		    left:-14px;
		    position:relative;
		    border-style: solid;
		    border-width: 0 13px 13px 0;
		    border-color: transparent #ffffff transparent transparent;            
		}
		.msj-rta:after{
		    width: 0;
		    height: 0;
		    content:"";
		    top:-5px;
		    left:14px;
		    position:relative;
		    border-style: solid;
		    border-width: 13px 13px 0 0;
		    border-color: whitesmoke transparent transparent transparent;           
		}  
		input:focus{
		    outline: none;
		}        
		::-webkit-input-placeholder { /* Chrome/Opera/Safari */
		    color: #d4d4d4;
		}
		::-moz-placeholder { /* Firefox 19+ */
		    color: #d4d4d4;
		}
		:-ms-input-placeholder { /* IE 10+ */
		    color: #d4d4d4;
		}
		:-moz-placeholder { /* Firefox 18- */
		    color: #d4d4d4;
		}   
 	</style>

 </head>
 <body>
 	<div>
 		<?php //ヘッダーを呼び出す ?>
 		<?php require('parts/header3.php') ?>
 	</div>

 	<div>
 		<?php //サイドバーを呼び出す ?>
 		<?php require('parts/sidebar3.php') ?>
 	</div>

 	
 	<div style="position: absolute;top:500px;left: 500px;width: 500px">
            <ul></ul>
            <div>
                <div class="msj-rta macro" style="margin:auto">                        
                    <div class="text text-r" style="background:whitesmoke !important">
                        <input class="mytext" placeholder="Type a message"/>
                    </div> 
                </div>
            </div>
 	</div>

 	<script type="text/javascript">
 		var me = {};
		me.avatar = "profile_image/icon_template.jpg";

		var you = {};
		you.avatar = "profile_image/icon_template.jpg";

		function formatAMPM(date) {
		    var hours = date.getHours();
		    var minutes = date.getMinutes();
		    var ampm = hours >= 12 ? 'PM' : 'AM';
		    hours = hours % 12;
		    hours = hours ? hours : 12; // the hour '0' should be '12'
		    minutes = minutes < 10 ? '0'+minutes : minutes;
		    var strTime = hours + ':' + minutes + ' ' + ampm;
		    return strTime;
		}            

		//-- No use time. It is a javaScript effect.
		function insertChat(who, text, time = 0){
		    var control = "";
		    var date = formatAMPM(new Date());
		    
		    if (who == "me"){
		        
		        control = '<li style="width:100%">' +
		                        '<div class="msj macro">' +
		                        '<div class="avatar"><img class="img-circle" style="width:100%;" src="'+ me.avatar +'" /></div>' +
		                            '<div class="text text-l">' +
		                                '<p>'+ text +'</p>' +
		                                '<p><small>'+date+'</small></p>' +
		                            '</div>' +
		                        '</div>' +
		                    '</li>';                    
		    }else{
		        control = '<li style="width:100%;">' +
		                        '<div class="msj-rta macro">' +
		                            '<div class="text text-r">' +
		                                '<p>'+text+'</p>' +
		                                '<p><small>'+date+'</small></p>' +
		                            '</div>' +
		                        '<div class="avatar" style="padding:0px 0px 0px 10px !important"><img class="img-circle" style="width:100%;" src="'+you.avatar+'" /></div>' +                                
		                  '</li>';
		    }
		    setTimeout(
		        function(){                        
		            $("ul").append(control);

		        }, time);
		    
		}

		function resetChat(){
		    $("ul").empty();
		}

		$(".mytext").on("keyup", function(e){
		    if (e.which == 13){
		        var text = $(this).val();
		        if (text !== ""){
		            insertChat("me", text);              
		            $(this).val('');
		        }
		    }
		});

		//-- Clear Chat
		resetChat();

		//-- Print Messages
		insertChat("me", "Hi,kai", 0);  
		insertChat("you", "Hi, tomtom", 1500);
		insertChat("me", "ご飯どこいく？九兵衛でいい？", 3500);
		insertChat("you", "よろしいでしょう。",7000);
		insertChat("me", "何時に会いますか？", 9500);
		insertChat("you", "６時でよろしいでしょう。", 12000);
		insertChat("me", "では、後ほど九兵衛で！", 15500);


		//-- NOTE: No use time on insertChat.
 	</script>
 
 </body>
 </html>