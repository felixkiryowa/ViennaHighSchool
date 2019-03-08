<?php

 /*Table schema
    
    lets create a subjects table if it doesnt exist
*/

class Subject
{
    
    public function __construct($subject_name, $subject_level, $subject_password)
    {
        require('../database/db.php');
        $create_subjects_query = "CREATE TABLE IF NOT EXISTS subjects(subject_id SERIAL PRIMARY KEY NOT NULL, subject_name VARCHAR(255) NOT NULL, subject_level VARCHAR(255) NOT NULL,  subject_password VARCHAR(255) NOT NULL, registered_on TIMESTAMP DEFAULT NOW())";
        $connection -> query($create_subjects_query);
        $this -> $subject_name = $subject_name;
        $this -> $subject_level = $subject_level;
        $this -> $subject_password = $subject_password;
        $register_subjects_query = $connection -> query("INSERT INTO subjects (subject_name, subject_level, subject_password)  VALUES ('".$this -> $subject_name."', '".$this -> $subject_level."', '".$this -> $subject_password."')");
        $connection->close();
        if( $register_subjects_query) {
            return true;
        }
        else{
            return false;
        }
    }
    public static function confirm_subject_password($subject, $subject_password){
        require('../database/db.php');
        $query = "SELECT EXISTS(SELECT * FROM subjects WHERE subject_name = '".$subject."' AND subject_password = '".$subject_password."' LIMIT 1)";
        $result = mysqli_fetch_assoc($connection->query($query));
        if(current($result)==1){
            return true;
        }
        else{
            return false;
        }
    }
}
    
?>

    