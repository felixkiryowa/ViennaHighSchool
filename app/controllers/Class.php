<?php
    session_start();
    include_once('../models/class_model.php');

    function get_all_classes() {
        RegisterClasses::get_classes();     
    }

    get_all_classes();
     
    
   


  
?>