$(document).ready(function() {
    $("#add_class_submit_btn").click(function(event){
                event.preventDefault();

          
          $(".text-danger").remove();

        var class_name = $('#class_name').val();
       

        if(class_name==""){
            $("#class_name").closest('.form-group').addClass('has-error');
            $("#class_name").after('<p class="text-danger">Select a class</p>');
        }else{
            $("#class_name").closest('.form-group').removeClass('has-error');
            $("#class_name").closest('.form-group').addClass('has-success');
        }
       

        if(class_name){
            
            $.ajax({
                url: "../../controllers/Class.php",
                method: "POST",
                data: {'add_class':true,'class_name':class_name},
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