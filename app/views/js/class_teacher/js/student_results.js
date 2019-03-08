Add_Student_Mark_Datatable();

// Handle datatable for all students and add their marks
function Add_Student_Mark_Datatable() {

  console.log("Fake");
				
    if( typeof ($.fn.DataTable) === 'undefined'){ return; }
    
    var handleDataTableButtons = function() {
      if ($("#GetAllStudentsAddMarks").length) {
        $("#GetAllStudentsAddMarks").DataTable({
  
         "ajax": "../../controllers/Special.php",
          "order": [],
  
          dom: "Blfrtip",
          buttons: [
          
          ],
          responsive: true
        });
      }
    };
  
    TableManageButtons = function() {
      "use strict";
      return {
        init: function() {
          handleDataTableButtons();
        }
      };
    }();
  
    $('#datatable').dataTable();
  
    $('#datatable-keytable').DataTable({
      keys: true
    });
  
    $('#datatable-responsive').DataTable();
  
    $('#datatable-scroller').DataTable({
      ajax: "js/datatables/json/scroller-demo.json",
      deferRender: true,
      scrollY: 380,
      scrollCollapse: true,
      scroller: true
    });
  
    $('#datatable-fixed-header').DataTable({
      fixedHeader: true
    });
  
    var $datatable = $('#datatable-checkbox');
  
    $datatable.dataTable({
      'order': [[ 1, 'asc' ]],
      'columnDefs': [
        { orderable: false, targets: [0] }
      ]
    });
    $datatable.on('draw.dt', function() {
      $('checkbox input').iCheck({
        checkboxClass: 'icheckbox_flat-green'
      });
    });
  
    TableManageButtons.init();
    
  };


  GetStudentInfo = (id)  => {

    if(id){

      let edit_student_code = "editstudentcode";
      let student_name = document.getElementById('student_name');

      $("#student_id").remove();

       $.ajax({
        url: '../../controllers/Student.php',
        type: 'POST',
        data: {student_id : id,edit_student_code:edit_student_code},
        dataType: 'json',
        success:function(response) {
            var firstname = response.firstname;
            var lastname = response.lastname;
            student_name.innerHTML = lastname + " " + firstname;
             console.log(response);
            $(".specificStudent").append('<input type="hidden" name="specific_student_id" id="specific_student_id" value="'+ response.student_id +'"/>');

        }
       });

   }
       
  }

 $('#save_student_mark').click((event) => {
     event.preventDefault();
     $(".text-danger").remove();

    //  Validations
    var student_mark = $("#student_mark").val();
    var mark_category = $("#mark_category").val();
    var specific_student_id = $("#specific_student_id").val();


    if(student_mark == "") {
      $("#student_mark").closest('.form-group').addClass('has-error');
      $("#student_mark").after('<p class="text text-danger">The Student Mark field is required</p>');
    } else {
        $("#student_mark").closest('.form-group').removeClass('has-error');
        $("#student_mark").closest('.form-group').addClass('has-success');
    }
    if(mark_category == "none") {
      $("#mark_category").closest('.form-group').addClass('has-error');
      $("#mark_category").after('<p class="text text-danger">Choose Right Student Mark Category field</p>');
    } else {
        $("#mark_category").closest('.form-group').removeClass('has-error');
        $("#mark_category").closest('.form-group').addClass('has-success');
    }

    if(student_mark && mark_category) {

      var add_student_mark = "add_student_mark";
      console.log({specific_student_id:specific_student_id,student_mark:parseInt(student_mark),
        add_student_mark:add_student_mark,mark_category:mark_category});

      $.ajax({
          url:"../../controllers/Results.php",
          method:"POST",
          data: {specific_student_id:specific_student_id,student_mark:parseInt(student_mark),
            add_student_mark:add_student_mark,mark_category:mark_category},
          dataType: 'json',
          success: function(response) {

            console.log(response.success);

            if(response.success == true) { 
              $(".Add_marks_messages").html('<div class="alert alert-success alert-dismissible" role="alert">'+
              '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
              '<strong> <span class="glyphicon glyphicon-ok-sign"></span> </strong>'+response.messages+
             '</div>');

            }else {
              $(".Add_marks_messages").html('<div class="alert alert-warning alert-dismissible" role="alert">'+
                  '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                  '<strong> <span class="glyphicon glyphicon-exclamation-sign"></span> </strong>'+response.messages+
                '</div>');

            }

          }
      })

    }else {
      return false;
    }
 })


  