$(function(){
   $('#karaoke').on('click',function(){
        $.ajax({
            type:"POST",
            url:"condition.php",
            data:{
                "login_id": login_id,
                "condition":1,
            }
        })
        .done(function(data){
            $('#test').attr('src','../images/?');
            console.log(data);
            $('body').load('http://localhost/20171030/haigachi/YUSUKE1/TOP/top_push.php');

        })
    });
   $('#drive').on('click',function(){
        $.ajax({
            type:"POST",
            url:"condition.php",
            data:{
                "login_id": login_id,
                "condition": "i_drive.gif",
            }
        })
        .done(function(data){
            $('#test').attr('src','../images/i_drive.gif');
            console.log(data);
            $('body').load('http://localhost/20171030/haigachi/YUSUKE1/TOP/top_push.php');

        })
    });
});

