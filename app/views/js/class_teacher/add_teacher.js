$(document).ready(function() {
         // run callbacks
         var subject_list = [];
         $('#callbacks').multiSelect({
         afterSelect: function(values){
             alert("Select value: "+values);
             subject_list.push(values[0]);
         },
         afterDeselect: function(values){
             alert("Deselect value: "+values);
             subject_list.pop(values[0]);
         }
         
         });
         console.log(subject_list);
    
 


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

        var teaches_class = [];
            $.each($("input[name='teaches_class']:checked"), function(){            
                teaches_class.push($(this).val());
            });

        var class_teacher_of = [];
        $.each($("input[name='class_teacher_of']:checked"), function(){            
            class_teacher_of.push($(this).val());
        });
        

        if(firstname==""){
            $("#first-name").closest('.form-group').addClass('has-error');
            $("#first-name").after('<p class="text-danger">First Name is required</p>');
        }else{
            $("#first-name").closest('.form-group').removeClass('has-error');
            $("#first-name").closest('.form-group').addClass('has-success');
            
        }
          if(lastname==""){
            $("#last-name").closest('.form-group').addClass('has-error');
            $("#last-name").after('<p class="text-danger">Last Name is required</p>');
        }else{
            $("#last-name").closest('.form-group').removeClass('has-error');
            $("#last-name").closest('.form-group').addClass('has-success');
        }
       
          if(username==""){
            $("#user-name").closest('.form-group').addClass('has-error');
            $("#user-name").after('<p class="text-danger">Username is required</p>');
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
            $("#user-status").after('<p class="text-danger">User Status is required</p>');
        }else{
            $("#user-status").closest('.form-group').removeClass('has-error');
            $("#user-status").closest('.form-group').addClass('has-success');
            
        }
        if(userrole==""){
            $("#user-role").closest('.form-group').addClass('has-error');
            $("#user-role").after('<p class="text-danger">User Role is required</p>');
        }else{
            $("#user-role").closest('.form-group').removeClass('has-error');
            $("#user-role").closest('.form-group').addClass('has-success');
            
        }
        
        if(teaches_class.length == 0){
            $("#teaches_class").closest('.form-group').addClass('has-error');
            $("#teaches_class").after('<p class="text-danger">Select a class which this teacher is supposed to teach</p>');
        }else{
            $("#teaches_class").closest('.form-group').removeClass('has-error');
            $("#teaches_class").closest('.form-group').addClass('has-success');
        }

        if(subject_list.length== 0){
            $("#callbacks").closest('.form-group').addClass('has-error');
            $("#callbacks").after('<p class="text-danger">Select a subject</p>');
        }else{
            $("#callbacks").closest('.form-group').removeClass('has-error');
            $("#callbacks").closest('.form-group').addClass('has-success');
            
        }

        if(firstname && lastname && username && password && userrole && userstatus && teaches_class.length !=0 && subject_list.length != 0){
            $.ajax({
                url: "../../controllers/User.php",
                method: "POST",
                data: {'create_teacher':true,'firstname':firstname,'lastname':lastname,'othername':othername,'username':username,'email':email,'password':password,'userrole':userrole,'userstatus':userstatus, 'teaches_class':teaches_class,'class_teacher_of':class_teacher_of, 'subject_list':subject_list},
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