$(document).ready(function() {
    $.ajax({
        url : 'http://localhost/viennaHighSchool/app/controllers/AuthorizeUser.php',
        type : 'GET',
        dataType : 'json',
        success:function(response) {
            
            console.log(response.subjects[0]);
            console.log(response.classes[0]);

            for(let i  = 0; i < response.classes.length;i++){
                $('#teach_classes').append(
                    $('<option>',{
                        value:response.classes[i],
                        text:response.classes[i]
                    })
                );
            }

            
            for(let i  = 0; i < response.subjects.length;i++){
                $('#teach_subjects').append(
                    $('<option>',{
                        value:response.subjects[i],
                        text:response.subjects[i]
                    })
                );
            }
        }
    });
    $("#submit_form_data").click(function(event){
        event.preventDefault();
        $(".text-danger").remove();

        var selected_class = $('#teach_classes').val();
        var selected_subject  = $('#teach_subjects').val();
        var SubjectPassword  = $('#SubjectPassword').val();
        


        if(selected_class==""){
            $("#fteach_classes").closest('.form-group').addClass('has-error');
            $("#teach_classes").after('<p class="text-danger">Please select a class</p>');
        }else{
            $("#teach_classes").closest('.form-group').removeClass('has-error');
            $("#teach_classes").closest('.form-group').addClass('has-success'); 
        }
        if(selected_subject ==""){
            $("#teach_subjects").closest('.form-group').addClass('has-error');
            $("#teach_subjects").after('<p class="text-danger">Please select a subject</p>');
        }else{
            $("#teach_subjects").closest('.form-group').removeClass('has-error');
            $("#teach_subjects").closest('.form-group').addClass('has-success'); 
        }
        if(SubjectPassword ==""){
            $("#SubjectPassword").closest('.form-group').addClass('has-error');
            $("#SubjectPassword").after('<p class="text-danger">Enter the subject password</p>');
        }else{
            $("#SubjectPassword").closest('.form-group').removeClass('has-error');
            $("#SubjectPassword").closest('.form-group').addClass('has-success'); 
        }

        if(selected_class && selected_subject && SubjectPassword){
            $.ajax({
                url: "../../controllers/VerifiedUser.php",
                method: "POST",
                data: {'confirm_subject_password':true,'selected_class':selected_class,'selected_subject':selected_subject, 'SubjectPassword':SubjectPassword},
                dataType: "json",
                success: function(response){
                    // console.log(response);
                    if(response.success==true){
                       
                        $("form").trigger("reset");
                       
                            window.location.href = 'teacher_dashboard.php';
                    
                    }else{
                        $("form").trigger("reset");
                        $(".form-group").removeClass('has-error').removeClass('has-success');
                        $(".messages").fadeIn().html(response);
                        $('.messages').delay(4000).fadeOut();
                  }
                }
            });
        }
          
    });
})