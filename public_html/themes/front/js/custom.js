

$('body').on('focusout','#UserName', function(){
    var UserName = $('#UserName').val();
    $.ajax({
        type: 'post',
        url: base_url + 'login/check_users',
        data:{
            UserName: UserName
        },
        success: function(data){
            $('#user_name_alert').prepend(data);
        }
    });
})

$('body').on('focusout','#email', function(){
    var email = $('#email').val();
    $.ajax({
        type: 'post',
        url: base_url + 'login/check_email_is_exist',
        data:{
            email: email
        },
        success: function(data){
            $('#email_alert').prepend(data);
        }
    });
})