<?php
session_start();
include_once('../models/student_model.php');

$class_id = 1;
  
if(isset($_POST['add_student'])) {

    $firstname = $_POST['firstname'];
    $lastname= $_POST['lastname'];
    $othernames=$_POST['othernames'];
    $student_status=$_POST['student_status'];
    $selectClasses = $_POST['selectClasses'];


    function add_student($firstname,$lastname,$othernames,$selectClasses,$student_status) { 
        $result = new  Student($firstname,$lastname,$othernames,$selectClasses,$student_status);
    }
    // Calling a function to add events
    add_student($firstname,$lastname,$othernames,$selectClasses,$student_status);
    
    }
    else if(isset($_POST['edit_student_code'])) {

        $student_id = $_POST['student_id'];
        get_single_student($student_id);
    }
    else if(isset($_POST['sendEditStudentcode'])) { 
        $student_id = $_POST['student_id'];
        $editfirstname = $_POST['editfirstname'];
        $editlastname = $_POST['editlastname'];
        $editothername = $_POST['editothername'];

        update_student_data($student_id, $editfirstname, $editlastname, $editothername);
    }
    else if(isset($_POST['discontinueStudent'])) {
        $student_id = $_POST['student_id']; 
        handle_discontinued_student($student_id);  
    }
    else {

        get_specific_class_students($class_id);
    }

    function get_specific_class_students($class_id) {
        Student::get_class_students($class_id);
    }

    function get_single_student($stud_id) {
        Student::get_selected_student_to_edit($stud_id);
    }


    function update_student_data($id, $editfirstname, $editlastname, $editothername) {
        Student::update_student($id, $editfirstname, $editlastname, $editothername);
    }

    function handle_discontinued_student($student_id) {
        Student::discontinue_student($student_id);          
    }
    
    
?>