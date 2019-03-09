$(document).ready(function() {
        var subject_list = [];
    //////////////////////////////////////////USER STATUS LOGIG ///////////////////////////////////////////////////////////////////////
        $('#user-role').on('change', function (event) {
            // Will always be triggered when the select changes ...
          
            // .. so you should check for the value
            // (please add some value attribute to your options)
            if ($(this).find('option:selected').val() === 'teacher') {
            
        var response = ` <div class="form-group" id="teaches_class">
        <label for="user-status" class="control-label col-md-3 col-sm-3 col-xs-12">Teacher To Class? *</label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <input type="checkbox" class="flat" name="teaches_class" value=" S.1"> S.1
          <input type="checkbox" class="flat" name="teaches_class" value=" S.2"> S.2
          <input type="checkbox" class="flat" name="teaches_class" value=" S.3"> S.3
          <input type="checkbox" class="flat" name="teaches_class" value=" S.4"> S.4
          <input type="checkbox" class="flat" name="teaches_class" value=" S.5"> S.5
          <input type="checkbox" class="flat" name="teaches_class" value=" S.6"> S.6
        </div>
      </div>
      <div class="form-group" id="class_teacher_section">
        <label for="user-status" class="control-label col-md-3 col-sm-3 col-xs-12">Class Teacher To Class? *</label>
          <div class="col-md-6 col-sm-6 col-xs-12">
          <input type="checkbox" class="flat" name="class_teacher_of" value=" S.1"> S.1
          <input type="checkbox" class="flat" name="class_teacher_of" value=" S.2"> S.2
          <input type="checkbox" class="flat" name="class_teacher_of" value=" S.3"> S.3
          <input type="checkbox" class="flat" name="class_teacher_of" value=" S.4"> S.4
          <input type="checkbox" class="flat" name="class_teacher_of" value=" S.5"> S.5
          <input type="checkbox" class="flat" name="class_teacher_of" value=" S.6"> S.6
        </div>
      </div>
    
      <div class="form-group">
        <label for="subject" class="control-label col-md-3 col-sm-3 col-xs-12">Subject(s) *</label>
        <div class="col-md-6 col-sm-6 col-xs-12">
        <!-- name ="subject" class="form-control" -->
        <select id='callbacks' class="form-control" multiple='multiple'>
            <option value="">Choose..</option>
            <option value="ENGLISH">ENGLISH</option>
            <option value="MATHEMATICS">MATHEMATICS</option>
            <option value="GEOGRAPHY">GEOGRAPHY</option>
            <option value="COMMERCE">COMMERCE</option>
            <option value="HISTORY">HISTORY</option>
            <option value="FINE ART">FINE ART</option>
            <option value="BIOLOGY">BIOLOGY</option>
            <option value="CHEMISTRY">CHEMISTRY</option>
            <option value="PHYSICS">PHYSICS</option>
            <option value="AGRICULTURE">AGRICULTURE</option>
            <option value="C.R.E">C.R.E</option>
            <option value="ENTREPRENEURSHIP">ENTREPRENEURSHIP</option>
            <option value="KISWAHILI">KISWAHILI</option>
            <option value="I.R.E">I.R.E</option>
            <option value="COMPUTER">COMPUTER</option>
            <option value="LUGANDA">LUGANDA</option>
            <option value="ENGLISH LITERATURE">ENGLISH LITERATURE</option>
          </select>
        </div>
      </div>`;
        $("#view_details").fadeIn().html(response);
        //run callbacks
        
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

            }
            else{
                $("#view_details").fadeIn().html('');
            }
        });
/////////////////////////////////////////////END USER STATUS LOGIG ///////////////////////////////////////////////////////////////////////


//////////////////////////////////////////Add User///////////////////////////////////////////////////////////////////

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
        if(userrole != "admin"){
            if(teaches_class.length == 0){
                $("#teaches_class").closest('.form-group').addClass('has-error');
                $("#teaches_class").after('<p class="text-danger">Select a class which this teacher is supposed to teach</p>');
            }else{
                if(class_teacher_of == 0){
                    class_teacher_of = "N/A";
                }else{
                    //check if the check if he's a class teacher of the subject hes supposed to teach
                    var confirm_class = teaches_class.includes(class_teacher_of[0]);
                    console.log(confirm_class);
                    if(confirm_class == false){
                        class_teacher_of = [];
                        $("#class_teacher_section").closest('.form-group').addClass('has-error');
                        $("#class_teacher_section").after('<p class="text-danger">Select a class of which you are a teacher</p>');
                    }
                }
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
    

        }
        else{
            teaches_class = "N/A";
            subject_list = "N/A";
            class_teacher_of = "N/A";
        
        }
        console.log(typeof class_teacher_of);
      
        if(firstname && lastname && username && password && userrole && userstatus && teaches_class.length !=0 && subject_list.length != 0){
            $.ajax({
                url: "../../controllers/User.php",
                method: "POST",
                data: {'create_teacher':true,'firstname':firstname,'lastname':lastname,'othername':othername,'username':username,'email':email,'password':password,'userrole':userrole,'userstatus':userstatus, 'teaches_class':teaches_class,'class_teacher_of':class_teacher_of, 'subject_list':subject_list},
                dataType: "json",
                success: function(response){
                        // console.log(response);
                        $("form").trigger("reset");
                        $(".form-group").removeClass('has-error').removeClass('has-success');
                        $(".messages").fadeIn().html(response);
                        $('.messages').delay(5000).fadeOut();
                }
            });
        }

    });

});