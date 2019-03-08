<?php

include_once('../models/user_model.php');

$user1 = new User("Henry", "Ssekitto", "Se", "Sk", "henry@gmail.com", "123456", "admin", "valid");
print_r($user1);

include_once('../models/results_model.php');
// $array1 = array('S.1','S.6');
// $array2 = array('S.6');
// $array3 = array('english');
// // print_r(json_encode($array1));
// $user1 = new User("Henry", "Kiryawa", "", "khenry", "a@gmail.com", "123456","admin","valid",json_encode($array1),"not_applicable", json_encode($array3));
// print_r($user1);
// results (mark, class_id, student_id, subject_id)
$result = new Results(50, 1, 1, 3);
echo json_encode($result);
?>