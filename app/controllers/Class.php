<?php
    // session_start();
    include_once('../models/class_model.php');

    // function get_all_classes() {
    //     RegisterClasses::get_classes();     
    // }

    // echo json_encode(get_all_classes());
    
    if (isset($_POST['class_name'])) {
        $class_name = $_POST['class_name'];
        
        $create_new_class = new RegisterClasses($class_name);
        if($create_new_class == true){
            $message="Class added successfully";
            echo json_encode('<div class="alert alert-success alert-dismissible" role="alert">'.'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'.'<strong> <span class="glyphicon glyphicon-ok-sign"></span> </strong>'.$message.'</div>');
        }
        else{
            $message = "Oops, something went wrong!";
            echo json_encode('<div class="alert alert-danger alert-dismissible" role="alert">'.'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'.'<strong> <span class="glyphicon glyphicon-ok-sign"></span> </strong>'.$message.'</div>');
        }
    }
   
   
?>