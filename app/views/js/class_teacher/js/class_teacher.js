// var AllStudentsTable;

init_DataTables();

$(document).ready(function() {

   

        $.ajax({
            url : 'http://localhost/ViennaHighSchool/app/controllers/Class.php',
            type : 'GET',
            dataType : 'json',
            success:function(response) {
                console.log(response);
                for(let i  = 0; i < response.length;i++){
                    console.log(response[i].class_name);
                    
                    $('#selectClasses').append(
                        $('<option>',{
                            value:response[i].id,
                            text:response[i].class_name
                        })
                    );
                }
            }
        });

        // remove the error
        $(".form-group").removeClass('has-error').removeClass('has-success');
        $(".text-danger").remove();
        // empty the message div
        $(".messages").html("");

        // submit form

        SubmitAddStudentForm = (event) =>  {
            event.preventDefault();
            $(".text-danger").remove();

            var form = $(this);

            // validation
            var firstname = $("#firstname").val();
            var lastname = $("#lastname").val();
            var othernames = $("#othernames").val();
            var student_status = $('#student_status').val();
            var selectClasses = $('#selectClasses').val();
            var add_student = "add_student";

            // alert(firstname + "" + lastname +" " + othernames + " " + selectClasses);
            if(firstname == "") {
                $("#firstname").closest('.form-group').addClass('has-error');
                $("#firstname").after('<p class="text text-danger">The firstname field is required</p>');
            } else {
                $("#firstname").closest('.form-group').removeClass('has-error');
                $("#firstname").closest('.form-group').addClass('has-success');
            }

            if(lastname == "") {
                $("#lastname").closest('.form-group').addClass('has-error');
                $("#lastname").after('<p class="text text-danger">The lastname field is required</p>');
            } else {
                $("#lastname").closest('.form-group').removeClass('has-error');
                $("#lastname").closest('.form-group').addClass('has-success');
            }

            if(student_status == "choose") {
                $("#student_status").closest('.form-group').addClass('has-error');
                $("#student_status").after('<p class="text text-danger">The student status field is required</p>');

            }else {
                $("#student_status").closest('.form-group').removeClass('has-error');
                $("#student_status").closest('.form-group').addClass('has-success');
            }
            if(selectClasses == "choose_class") {
                $("#selectClasses").closest('.form-group').addClass('has-error');
                $("#selectClasses").after('<p class="text text-danger">The student class field is required</p>');

            }else {
                $("#selectClasses").closest('.form-group').removeClass('has-error');
                $("#selectClasses").closest('.form-group').addClass('has-success');
            }

            if(firstname && lastname && student_status && selectClasses) {
                console.log({
                    firstname:firstname,lastname:lastname,othernames:othernames,student_status:student_status,selectClasses:selectClasses,add_student:add_student
                });
                //submi the form to server
                $.ajax({
                    url : 'http://localhost/ViennaHighSchool/app/controllers/Student.php',
                    type : 'POST',
                    data : {
                        firstname:firstname,lastname:lastname,othernames:othernames,student_status:student_status,selectClasses:selectClasses,add_student:add_student
                    },
                    dataType : 'json',
                    success:function(response) {
                        // remove the error
                        $(".form-group").removeClass('has-error').removeClass('has-success');

                        if(response.success == true) {
                            $(".messages").html('<div class="alert alert-success alert-dismissible" role="alert">'+
                             '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                             '<strong> <span class="glyphicon glyphicon-ok-sign"></span> </strong>'+response.messages+
                            '</div>');

                            // reset the form
                            $("#AddStudentForm")[0].reset();

                        } else {
                            $(".messages").html('<div class="alert alert-warning alert-dismissible" role="alert">'+
                             '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                             '<strong> <span class="glyphicon glyphicon-exclamation-sign"></span> </strong>'+response.messages+
                            '</div>');
                        } // /else
                    } // success
                }); // ajax subit
            } /// if

            return false;
        }               

});

function init_DataTables() {
				
    if( typeof ($.fn.DataTable) === 'undefined'){ return; }
    console.log('init_DataTables');
    
    var handleDataTableButtons = function() {
      if ($("#AllStudentsTable").length) {
        $("#AllStudentsTable").DataTable({

         "ajax": "http://localhost/ViennaHighSchool/app/controllers/Student.php",
          "order": [],

          dom: "Blfrtip",
          buttons: [
            {
              extend: "copy",
              className: "btn-sm"
            },
            {
              extend: "csv",
              className: "btn-sm"
            },
            {
              extend: "excel",
              className: "btn-sm"
            },
            {
              extend: "pdfHtml5",
              className: "btn-sm"
            },
            {
              extend: "print",
              className: "btn-sm"
            },
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

