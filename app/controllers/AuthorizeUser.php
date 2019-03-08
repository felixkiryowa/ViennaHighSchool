<?php 

session_start();
include_once('../models/user_model.php');
$user_type = $_SESSION['usertype'];
$user_id = $_SESSION['user_id'];


$x = User::authorize_logged_user($user_id, $user_type);
$teacher_details['subjects'] = json_decode($x['subjects']);
$teacher_details['classes'] = json_decode($x['teaches_class']);

echo json_encode($teacher_details);
