$(document).ready(function() {
    $("#add_teacher_submit_btn").click(function(event){
                event.preventDefault();

          
          $(".text-danger").remove();

        var firstname = $('#first-name').val();
        var lastname= $('#last-name').val();
        var othername = $('#other-name').val();
        var username = $('#user-name').val();
        var email = $('#email').val();
        var password = $('#password').val();
        var userrole = $('#user-role').val();
        var userstatus = $('#user-status').val();

        if(firstname==""){
            $("#first-name").closest('.form-group').addClass('has-error');
            $("#first-name").after('<p class="text-danger">Username is required</p>');
        }else{
            $("#first-name").closest('.form-group').removeClass('has-error');
            $("#first-name").closest('.form-group').addClass('has-success');
            
        }
          if(lastname==""){
            $("#last-name").closest('.form-group').addClass('has-error');
            $("#last-name").after('<p class="text-danger">Password is required</p>');
        }else{
            $("#last-name").closest('.form-group').removeClass('has-error');
            $("#last-name").closest('.form-group').addClass('has-success');
        }
       
          if(username==""){
            $("#user-name").closest('.form-group').addClass('has-error');
            $("#user-name").after('<p class="text-danger">Password is required</p>');
        }else{
            $("#user-name").closest('.form-group').removeClass('has-error');
            $("#user-name").closest('.form-group').addClass('has-success');
        }
      
        if(password==""){
            $("#password").closest('.form-group').addClass('has-error');
            $("#password").after('<p class="text-danger">Password is required</p>');
        }else{
            $("#password").closest('.form-group').removeClass('has-error');
            $("#password").closest('.form-group').addClass('has-success');
        }
        if(userstatus==""){
            $("#user-status").closest('.form-group').addClass('has-error');
            $("#user-status").after('<p class="text-danger">Username is required</p>');
        }else{
            $("#user-status").closest('.form-group').removeClass('has-error');
            $("#user-status").closest('.form-group').addClass('has-success');
            
        }
          if(userrole==""){
            $("#user-role").closest('.form-group').addClass('has-error');
            $("#user-role").after('<p class="text-danger">Password is required</p>');
        }else{
            $("#user-role").closest('.form-group').removeClass('has-error');
            $("#user-role").closest('.form-group').addClass('has-success');
        }

        if(firstname && lastname && username && password && userrole && userstatus){
            $.ajax({
                url: "../controllers/User.php",
                method: "POST",
                data: {'create_teacher':true,'firstname':firstname,'lastname':lastname,'othername':othername,'username':username,'email':email,'password':password,'userrole':userrole,'userstatus':userstatus},
                dataType: "json",
                success: function(response){
                        $("form").trigger("reset");
                        $(".form-group").removeClass('has-error').removeClass('has-success');
                        $(".messages").fadeIn().html(response);
                        $('.messages').delay(5000).fadeOut();
                }
            });
        }

    });

});