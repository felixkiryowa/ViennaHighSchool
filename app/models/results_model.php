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

            $check_if_student_mot_mark_exists = "SELECT * FROM results WHERE student_id ='$specific_student_id' AND subject_id = '$subject_id'";
        
        
            $execute_query = $connection->query($check_if_student_mot_mark_exists);
            $response = mysqli_fetch_array($execute_query);
        
            if($response == true) {
                $sql2 = "SELECT * FROM results WHERE student_id ='$specific_student_id' AND subject_id = '$subject_id'";
                $execute_sql2 = $connection->query($sql2);
                $row1 = mysqli_fetch_assoc($execute_sql2);
              
                if($row1['mid_term_mark'] == NULL) {
                    $update_sql = "UPDATE results SET mid_term_mark = $student_mark , mot_status=1 WHERE student_id ='$specific_student_id' AND subject_id = '$subject_id'";
                    $connection -> query($update_sql);
                    $validator['success'] = true;
                    $validator['messages'] = "Mid Term Student Mark Has Been Added!!";
                    echo json_encode($validator);
                }
                else {
                    $validator['success'] = false;
                    $validator['messages'] = "Mid Term Student Mark is Already Added!!";
                    echo json_encode($validator);  
                }
            }else {
                
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
               
            }

        }
        else {
            

            $this -> $student_mark = $student_mark;
            $this -> $class_id = $class_id;
            $this -> $specific_student_id = $specific_student_id;
            $this -> $subject_id = $subject_id;

            $check_if_student_mot_mark_exists = "SELECT * FROM results WHERE student_id ='$specific_student_id' AND subject_id = '$subject_id'";
        
            $execute_query = $connection -> query($check_if_student_mot_mark_exists);
            $response = mysqli_fetch_array($execute_query);

            if($response == true) {
                $sql2 = "SELECT * FROM results WHERE student_id ='$specific_student_id' AND subject_id = '$subject_id'";
                $execute_sql2 = $connection->query($sql2);
                $row = mysqli_fetch_assoc($execute_sql2);

                if($row['end_term_mark'] == NULL) {
                    $update_sql = "UPDATE results SET end_term_mark = $student_mark , eot_status=1 WHERE student_id ='$specific_student_id' AND subject_id = '$subject_id'";
                    $connection -> query($update_sql);
                    $validator['success'] = true;
                    $validator['messages'] = "End Of Term Student Mark Has Been Added!!";
                    echo json_encode($validator);
                }
                else {
                    $validator['success'] = false;
                    $validator['messages'] = "End Term Student Mark is Already Added!!";
                    echo json_encode($validator);  
                }

            }else {
                $register_results_query = $connection->query("INSERT INTO results (end_term_mark,class_id, student_id, subject_id,mot_status) VALUES ('".$this -> $student_mark."', '".$this -> $class_id."','".$this -> $specific_student_id."','".$this -> $subject_id."','1')"); 
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
            }

        }
    }

    public static function getSpecificStudentResults($student_id, $subject_id) {
        require('../database/db.php');

        $id = $student_id;

        $sql = "SELECT students.student_id,students.firstname,students.lastname,results.mid_term_mark,results.end_term_mark
        FROM students INNER JOIN results ON students.student_id = results.student_id  
        WHERE results.student_id = $id AND results.subject_id = $subject_id";
    
        $query = $connection->query($sql);
        $result = $query->fetch_assoc();

        $connection->close();

        echo json_encode($result);
    }
}
    
?>

    