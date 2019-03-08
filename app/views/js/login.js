$(document).ready(function() {
    $(".submit").click(function(event){
                event.preventDefault();

          
          $(".text-danger").remove();

        var username = $('#username').val();
        var password = $('#password').val();

        if(username==""){
            $("#username").closest('.form-group').addClass('has-error');
            $("#username").after('<p class="text-danger">Username is required</p>');
        }else{
            $("#username").closest('.form-group').removeClass('has-error');
            $("#username").closest('.form-group').addClass('has-success');
            
        }
          if(password==""){
            $("#password").closest('.form-group').addClass('has-error');
            $("#password").after('<p class="text-danger">Password is required</p>');
        }else{
            $("#password").closest('.form-group').removeClass('has-error');
            $("#password").closest('.form-group').addClass('has-success');
        }

        if(username && password){
            $.ajax({
                url: "app/controllers/User.php",
                method: "POST",
                data: {'getUserCredentials':true,'username':username,'password':password},
                dataType: "json",
                success: function(response){
                    if(response.success==true){
                        $("form").trigger("reset");
                        if(response.usertype == "admin"){
                            window.location.href = 'app/views/admin/admin_dashboard.php';
                        }
                        else{
                            window.location.href = 'app/views/class_teacher/authorization_level.php';
                        }
                        // alert(response.usertype);
                    
                    }else{
                        $("form").trigger("reset");
                        $(".form-group").removeClass('has-error').removeClass('has-success');
                        $(".messages").fadeIn().html(response);
                        $('.messages').delay(4000).fadeOut();
                  }
                // alert(response.usertype);
                }
            });
        }

    });

});