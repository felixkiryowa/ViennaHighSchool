<?php
session_start();
include_once('../models/user_model.php');

// get all teachers
// function get_teachers(){
//     $teachers = User::fetch_all_teachers();
//     echo json_encode($teachers);
// }


// Login In User
if (isset($_POST["getUserCredentials"])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $result = User::loginUser($username,$password);
    if($result == true){
        $_SESSION['loggedin']="YES";
        $get_user = User::getUserType($username,$password);
        #
        $_SESSION['usertype']=$get_user['usertype'];
        $_SESSION['user_id']=$get_user['user_id'];
        $_SESSION['name']=$get_user['firstname'].' '.$get_user['lastname'];

        $validator['success']= true;
        $validator['usertype']= $_SESSION['usertype'];
		echo json_encode($validator);
    }else{
        echo json_encode(" Wrong username or password!");
    }
}

// Add teacher
if (isset($_POST["create_teacher"])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $othername = $_POST['othername'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $userrole = $_POST['userrole'];
    $userstatus = $_POST['userstatus'];
    $teaches_class = $_POST['teaches_class'];
    $class_teacher_of = $_POST['class_teacher_of'];
    $subject_list = $_POST['subject_list'];
    echo json_encode($class_teacher_of);

    if(userrole == "admin"){
        $create_user = new User($firstname, $lastname, $othername, $username, $email, $password, $userrole, $userstatus, $teaches_class, "N/A", $subject_list);
    }
    else{
        if($class_teacher_of != "N/A"){
            $create_user = new User($firstname, $lastname, $othername, $username, $email, $password, $userrole, $userstatus, json_encode($teaches_class), json_encode($class_teacher_of), json_encode($subject_list));
        }
        else{
            $create_user = new User($firstname, $lastname, $othername, $username, $email, $password, $userrole, $userstatus, json_encode($teaches_class), $class_teacher_of, json_encode($subject_list));
        }
    }
   
   
    if($create_user == true){
        $message="Teacher added successfully";
		echo json_encode('<div class="alert alert-success alert-dismissible" role="alert">'.'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'.'<strong> <span class="glyphicon glyphicon-ok-sign"></span> </strong>'.$message.'</div>');
    }
    else{
        $message="Oops,something went wrong!";
		echo json_encode('<div class="alert alert-danger alert-dismissible" role="alert">'.'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'.'<strong> <span class="glyphicon glyphicon-ok-sign"></span> </strong>'.$message.'</div>');
    }
}
// get all teachers
// get_teachers();
  
?>