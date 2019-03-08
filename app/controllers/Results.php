<?php
session_start();
include_once('../models/results_model.php');

if(isset($_POST['add_student_mark'])) {

    $specific_student_id = $_POST['specific_student_id'];
    $student_mark = $_POST['student_mark'];
    $mark_category = $_POST['mark_category'];
    $class_id = 1;
    $subject_id = 1;

    // $specific_subject_id = 1;
    // $student_mark = 79;
    // $mark_category = 'mot';
    // $class_id = 1;
    // $subject_id = 1;

    function add_student_mark($specific_student_id,$student_mark,$mark_category,$class_id,$subject_id) { 
        $result = new  Results($specific_student_id,$student_mark,$mark_category,$class_id,$subject_id);
    }
    // Calling a function to add Student Mark
    add_student_mark($specific_student_id,$student_mark,$mark_category,$class_id,$subject_id);
    
    }
  
?>