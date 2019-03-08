<?php

session_start();
include_once('../models/student_model.php');

$class_id = 1;


function get_class_students_and_add_their_marks($class_id) {
    Student::get_class_students_to_add_their_marks($class_id);
}

get_class_students_and_add_their_marks($class_id);


?>