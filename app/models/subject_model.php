<?php
require_once 'database.php';

 /*Table schema
    
    lets create a subjects table if it doesnt exist
*/

class Subject
{
    
    public function __construct($subject_name,$status)
    {
        require('../database/db.php');
        $create_subjects_query = "CREATE TABLE IF NOT EXISTS subjects(subject_id SERIAL PRIMARY KEY NOT NULL, subject_name VARCHAR(255) NOT NULL,subject_status VARCHAR(255) NOT NULL, registered_on TIMESTAMP DEFAULT NOW())";
        $connection -> query($create_subjects_query);
        $this -> $subject_name = $subject_name;
        $this -> $status = $status;
        $register_subjects_query = $connection -> query("INSERT INTO subjects (subject_name, subject_status)  VALUES ('".$this -> $subject_name."', '".$this -> $status."')");
        $connection->close();
        if( $register_subjects_query) {
            return "success";
        }
        else{
            return "failed";
        }
    }
}
    
?>

    