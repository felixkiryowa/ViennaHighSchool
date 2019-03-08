$(document).ready(function() {
    $("#add_O_subject_submit_btn").click(function(event){
                event.preventDefault();

          
          $(".text-danger").remove();

        var subject = $('#subject').val();
        var subject_level = $('#subject_level').val();
        var Subject_Password =  $('#Subject_Password').val();
        

        if(subject==""){
            $("#subject").closest('.form-group').addClass('has-error');
            $("#subject").after('<p class="text-danger">Enter subject</p>');
        }else{
            $("#subject").closest('.form-group').removeClass('has-error');
            $("#subject").closest('.form-group').addClass('has-success');
        }

        if(Subject_Password ==""){
            $("#Subject_Password ").closest('.form-group').addClass('has-error');
            $("#Subject_Password ").after('<p class="text-danger">Enter Subject Password</p>');
        }else{
            $("#Subject_Password ").closest('.form-group').removeClass('has-error');
            $("#Subject_Password ").closest('.form-group').addClass('has-success');
        }
       

        if(subject && Subject_Password){
            
            $.ajax({
                url: "../../controllers/Subject.php",
                method: "POST",
                data: {'add_subject':true,'subject':subject, 'subject_level':subject_level,'Subject_Password':Subject_Password},
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