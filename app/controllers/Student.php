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
    
}else {

    get_specific_class_students($class_id);
}


function get_specific_class_students($class_id) {
    Student::get_class_students($class_id);
}
    
    
?>