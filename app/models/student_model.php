<?php
 /*Table schema
    
    lets create a classes table if it doesnt exist
*/
class Student
{
    public function __construct($firstname, $lastname, $othername, $class_id, $status)
    {
        require('../database/db.php');
        if($othername == null) {
            $create_students_table = "CREATE TABLE IF NOT EXISTS students(student_id SERIAL PRIMARY KEY NOT NULL,firstname VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, othername VARCHAR(255) NULL,class_id INTEGER NOT NULL,student_status VARCHAR(255) NOT NULL,registered_on TIMESTAMP DEFAULT NOW(), 
            FOREIGN KEY (class_id)REFERENCES classes (class_id) ON UPDATE CASCADE ON DELETE CASCADE)";
            $connection -> query($create_students_table);
            $this -> $firstname = $firstname;
            $this -> $lastname = $lastname;
            // $this -> $othername = $othername;
            $this -> $class_id = $class_id;
            $this -> $status = $status;
            $register_students_query = $connection -> query("INSERT INTO students(firstname, lastname, class_id, student_status)  VALUES ('".$this -> $firstname."', '".$this -> $lastname."', '".$this -> $class_id."', '".$this -> $status."')");
            $connection->close();

            if($register_students_query) {
                $validator['success'] = true;
                $validator['messages'] = "Successfully Added Student";
            } else {
                $validator['success'] = false;
                $validator['messages'] = "Error while adding Student";
            }

        }else {
            $create_students_table = "CREATE TABLE IF NOT EXISTS students(student_id SERIAL PRIMARY KEY NOT NULL,firstname VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, othername VARCHAR(255) NULL,class_id INTEGER NOT NULL,student_status VARCHAR(255) NOT NULL,registered_on TIMESTAMP DEFAULT NOW(), FOREIGN KEY (class_id)REFERENCES classes (class_id) ON UPDATE CASCADE ON DELETE CASCADE)";
            $connection -> query($create_students_table);
            $this -> $firstname = $firstname;
            $this -> $lastname = $lastname;
            $this -> $othername = $othername;
            $this -> $class_id = $class_id;
            $this -> $status = $status;
            $register_students_query = $connection -> query("INSERT INTO students(firstname, lastname, othername, class_id, student_status)  VALUES ('".$this -> $firstname."', '".$this -> $lastname."','".$this -> $othername."', '".$this -> $class_id."', '".$this -> $status."')");
            $connection->close();
    
            if($register_students_query) {
                $validator['success'] = true;
                $validator['messages'] = "Successfully Added Student";
            } else {
                $validator['success'] = false;
                $validator['messages'] = "Error while adding Student";
            }
        }
        
        echo json_encode($validator);  
    } 

    public static function get_class_students($class_id) {
        require('../database/db.php');
        $output = array('data' => array());
    
            $sql = "SELECT * FROM students WHERE class_id=$class_id";
            $query = $connection->query($sql);
    
            $x = 1;
            while ($row = $query->fetch_assoc()) {
    
    
                $actionButton = '
                <div class="btn-group">
                <button type="button" class="btn btn-success"  dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Action <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                <li><a type="button"   data-toggle="modal" data-target="#EditSudentInfo" onclick="editMovie('.$row['student_id'].')"> <span class="glyphicon glyphicon-edit"></span> Edit</a></li>
                <li><a type="button"  data-toggle="modal" data-target="#removeMovieModal" onclick="removeMovie('.$row['student_id'].')"> <i class="fa fa-scissors"></li> Discontinue</a></li>
                </ul>
                </div>';
                if($row['othername'] == null) {
                    $y =  "None";
                   }
                   else {
                      $y =   $row['othername'];
                   }
                    
                
    
                $output['data'][] = array(
                    $x,
                    $row['firstname'],
                    $row['lastname'],
                    $y,
                    $row['student_status'],
                    $row['registered_on'],
                    $actionButton
                );
    
                $x++;
            }
    
            // database conion close
            $connection->close();
    
            echo json_encode($output); 
       }

} 



?>

    