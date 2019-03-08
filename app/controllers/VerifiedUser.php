<?php
    session_start();
    include_once('../models/subject_model.php');
    include_once('../models/class_model.php');
    include_once('../models/user_model.php');


    $user_type = $_SESSION['usertype'];
    $user_id = $_SESSION['user_id'];
    if(isset($_POST['confirm_subject_password'])){
        
        $selected_class = $_POST['selected_class'];
        $selected_subject = $_POST['selected_subject'];
        $SubjectPassword = $_POST['SubjectPassword'];
        // echo json_encode("k"); json_encode( $selected_subject );
         $confirmed = Subject::confirm_subject_password( $selected_subject, $SubjectPassword);

        
         if($confirmed === True){
            $class_details = RegisterClasses::get_class_id($selected_class);
            
            $_SESSION['class_id'] =$class_details['class_id'];
            $is_class_teacher = User::get_teacher_status($user_id);
            // echo json_encode($is_class_teacher);
            
            $validator['success']= true;
            if($is_class_teacher['class_teacher_of'] != "not_applicable"){
                if(in_array( $selected_class , json_decode($is_class_teacher['class_teacher_of']))){
                    $_SESSION['class_teacher_of'] = "Yes";
                } 
                else{ 
                    $_SESSION['class_teacher_of']= "No";
                } 
                
            }
            else{
                $_SESSION['class_teacher_of'] = "No";
            }
            echo json_encode($validator);
        //         if( in_array( $selected_class , json_decode($is_class_teacher['class_teacher_of']))         
    }
    else{
        echo json_encode("Wrong subject password");
    }
}
  
?>