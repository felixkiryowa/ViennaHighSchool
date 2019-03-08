<?php
 /*Table schema
    
    lets create a classes table if it doesnt exist
*/


class Results
{
    
    public function __construct($mark, $class_id, $student_id, $subject_id)
    {
        require('../database/db.php');
        $create_results_table = "CREATE TABLE IF NOT EXISTS results (id SERIAL PRIMARY KEY NOT NULL,mark INTEGER NOT NULL,class_id INTEGER NOT NULL,student_id INTEGER NOT NULL,subject_id INTEGER NOT NULL, registered_on  TIMESTAMP DEFAULT NOW(),FOREIGN KEY (class_id)REFERENCES classes (class_id) ON UPDATE CASCADE ON DELETE CASCADE,FOREIGN KEY (student_id) REFERENCES students (student_id) ON UPDATE CASCADE ON DELETE CASCADE,FOREIGN KEY (subject_id) REFERENCES subjects (subject_id) ON UPDATE CASCADE ON DELETE CASCADE";
        $connection -> query($create_results_table);
        $this -> $mark = $mark;
        $this -> $class_id = $class_id;
        $this -> $student_id = $student_id;
        $this -> $subject_id = $subject_id;
        $register_results_query = $connection -> query("INSERT INTO results (mark, class_id, student_id, subject_id)  VALUES ('".$this -> $mark."', '".$this -> $class_id."','".$this -> $student_id."','".$this -> $subject_id."')");
        $connection->close();
        if($register_results_query) {
            return "success";
        }
        else{
            return "failed";
        }
    }
}
    
?>

    