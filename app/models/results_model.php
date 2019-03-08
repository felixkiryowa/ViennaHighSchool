<?php
 /*Table schema
    
    lets create a classes table if it doesnt exist
*/


class Results
{
    
    public function __construct($specific_student_id,$student_mark,$mark_category,$class_id,$subject_id)
    
    {
        require('../database/db.php');

        $create_results_table = "CREATE TABLE IF NOT EXISTS results 
        (id SERIAL PRIMARY KEY NOT NULL,
        mid_term_mark INTEGER NULL,
        end_term_mark INTEGER NULL,
        class_id INTEGER NOT NULL,
        student_id INTEGER NOT NULL,
        subject_id INTEGER NOT NULL,
        registered_on  TIMESTAMP DEFAULT NOW(),
        mot_status INTEGER NULL ,
        eot_status INTEGER NULL
        -- FOREIGN KEY (class_id)REFERENCES classes (class_id) ON UPDATE CASCADE ON DELETE CASCADE,
        -- FOREIGN KEY (student_id) REFERENCES students (student_id) ON UPDATE CASCADE ON DELETE CASCADE,
        -- FOREIGN KEY (subject_id) REFERENCES subjects (subject_id) ON UPDATE CASCADE ON DELETE CASCADE
        
        )
        ";
        $connection -> query($create_results_table);

        if($mark_category == 'mot') {
            $validator = array('success' => false ,'messages' =>array());

            $this -> $student_mark = $student_mark;
            $this -> $class_id = $class_id;
            $this -> $specific_student_id = $specific_student_id;
            $this -> $subject_id = $subject_id;

            $check_if_student_mot_mark_exists = "SELECT * FROM results WHERE student_id ='$specific_student_id' AND subject_id = '$subject_id' 
            AND mid_term_mark !== null";
        
            $execute_query = $connection -> query($check_if_student_mot_mark_exists);
            $response = mysqli_fetch_array($execute_query);
            if($response == true) {

                $sql_query = "INSERT INTO results (mid_term_mark,class_id,student_id,subject_id,mot_status) VALUES ('".$this->$student_mark."', '".$this -> $class_id."','".$this -> $specific_student_id."','".$this -> $subject_id."','1')";

                $register_results_query = $connection->query($sql_query);
                
                if($register_results_query === TRUE) {
                    $validator['success'] = true;
                    $validator['messages'] = "Successfully Added Student Mid Term  Mark";
                } else {
                    $validator['success'] = false;
                    $validator['messages'] = "Error while adding the Student Mark";
                }
                // close the database connection
                $connection->close();

                echo json_encode($validator);
    
            }else {
                $validator['success'] = false;
                $validator['messages'] = "Mid Term Student Mark is Already Added!!";
                echo json_encode($validator);
            }

        }
        else {
            

            $this -> $student_mark = $student_mark;
            $this -> $class_id = $class_id;
            $this -> $specific_student_id = $specific_student_id;
            $this -> $subject_id = $subject_id;

            $check_if_student_mot_mark_exists = "SELECT * FROM results WHERE student_id ='$specific_student_id' AND subject_id = '$subject_id' 
            AND end_term_mark !== null";
        
            $execute_query = $connection -> query($check_if_student_mot_mark_exists);
            $response = mysqli_fetch_array($execute_query);

            if($response == true) {
                $register_results_query = $connection -> query("INSERT INTO results (end_term_mark,class_id, student_id, subject_id,mot_status) VALUES ('".$this -> $student_mark."', '".$this -> $class_id."','".$this -> $specific_student_id."','".$this -> $subject_id."','1')"); 
                if($register_results_query === TRUE) {
                    $validator['success'] = true;
                    $validator['messages'] = "Successfully Added Student Mark";
                } else {
                    $validator['success'] = false;
                    $validator['messages'] = "Error while adding the Student Mark";
                }
                // close the database connection
                $connection->close();
    
                echo json_encode($validator);

            }else {

                $validator['success'] = false;
                $validator['messages'] = "End Term Student Mark is Already Added!!";
                echo json_encode($validator);

            }

        }
    }
}
    
?>

    