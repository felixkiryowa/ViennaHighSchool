<?php
    session_start();
    include_once('../models/subject_model.php');

    // function get_all_classes() {
    //     RegisterClasses::get_classes();     
    // }

    // echo json_encode(get_all_classes());
    
    if (isset($_POST['add_subject'])) {
        $subject = $_POST['subject'];
        $subject_level = $_POST['subject_level'];
        $subject_password = $_POST['Subject_Password'];
        
        $create_new_class = new Subject($subject, $subject_level, $subject_password);
        if($create_new_class == true){
            $message="Subject added successfully";
            echo json_encode('<div class="alert alert-success alert-dismissible" role="alert">'.'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'.'<strong> <span class="glyphicon glyphicon-ok-sign"></span> </strong>'.$message.'</div>');
        }
        else{
            $message = "Oops, something went wrong!";
            echo json_encode('<div class="alert alert-danger alert-dismissible" role="alert">'.'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'.'<strong> <span class="glyphicon glyphicon-ok-sign"></span> </strong>'.$message.'</div>');
        }
    }
   
   
?>