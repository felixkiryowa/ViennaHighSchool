<?php
session_start();
include_once('../models/results_model.php');

if(isset($_POST['add_student_mark'])) {

    $specific_student_id = $_POST['specific_student_id'];
    $student_mark = $_POST['student_mark'];
    $mark_category = $_POST['mark_category'];
    $class_id = 1;
    $subject_id = 1;

    // $specific_student_id = 3;
    // $student_mark = 90;
    // $mark_category = 'mot';
    // $class_id = 1;
    // $subject_id = 1;

    function add_student_mark($specific_student_id,$student_mark,$mark_category,$class_id,$subject_id) { 
        $result = new  Results($specific_student_id,$student_mark,$mark_category,$class_id,$subject_id);
    }
    // Calling a function to add Student Mark
    add_student_mark($specific_student_id,$student_mark,$mark_category,$class_id,$subject_id);
    
    }

 else if($_POST['editstudentresults']) {
    $subject_id = 1;
    get_all_students_and_edit_marks($_POST['student_id'], $subject_id);

 }


function get_all_students_and_edit_marks($student_id, $subject_id) {
    Results::getSpecificStudentResults($student_id,$subject_id);

}
  
?>