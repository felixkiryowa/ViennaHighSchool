<?php
session_start();
include_once('../models/events_model.php');
    
        if(isset($_POST['event_calendar'])) {
            $title = $_POST['title'];
            $start = $_POST['start'];
            $end = $_POST['end'];

            function add_calendar_event($title, $start, $end) { 
                $result = new  Event($title, $start, $end);
                if($result == true){
                    echo json_encode("Successfully Added an Event !!");
                }else{
                    echo "Event Calendar Not Added";
                }

            }
            // Calling a function to add events
            add_calendar_event($title,$start,$end);
        }else if(isset($_POST['update_event'])){
            $title = $_POST['title'];
            $start = $_POST['start'];
            $end = $_POST['end'];
            $id = $_POST['id'];
             
            function update_event($title,$start,$end,$id) {
                Event::update_event($title,$start,$end,$id);
            }
            // Calling Update Calendar Function
            update_event($title,$start,$end,$id);

        }else if(isset($_POST['delete_event'])){
            $id = $_POST['id'];
             
            function delete_event($id) {
                Event::delete_event($id);
            }
            // Calling Delete Calendar Function
            delete_event($id);

        }else {
               // Calling a function to get all events
               get_all_events();
        }


    function get_all_events() {
         Event::load();     
    }
     
    
   


  
?>