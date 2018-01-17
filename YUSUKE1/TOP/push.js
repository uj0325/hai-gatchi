
$(function(){

    $('#push').on('click',function(){
        $.ajax({
            type:"POST",
            url:"alert.php",
            data:{
                "pushed_user": login_id,
                "receive_user": 1,
            }
        })
        .done(function(data){
           alert('通知を送信しました');

        })
    });
});
