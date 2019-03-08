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
            $create_students_table = "CREATE TABLE IF NOT EXISTS students(
                student_id SERIAL PRIMARY KEY NOT NULL,
                firstname VARCHAR(255) NOT NULL, 
                lastname VARCHAR(255) NOT NULL, othername VARCHAR(255) NULL,class_id INTEGER NOT NULL,student_status VARCHAR(255) NOT NULL,registered_on TIMESTAMP DEFAULT NOW(), 
               FOREIGN KEY (class_id) REFERENCES classes (class_id) ON UPDATE CASCADE ON DELETE CASCADE)";
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
    
            $sql = "SELECT * FROM students WHERE class_id=$class_id AND student_status != 'discountinued'";
            $query = $connection->query($sql);
    
            $x = 1;
            while ($row = $query->fetch_assoc()) {
    
    
                $actionButton = '
                <div class="btn-group">
                <button type="button" class="btn btn-success"  dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Action <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                <li><a type="button"   data-toggle="modal" data-target="#EditSudentInfo" onclick="editStudentInfo('.$row['student_id'].')"> <span class="glyphicon glyphicon-edit"></span> Edit</a></li>
                <li><a type="button"  data-toggle="modal" data-target="#discountinueStudentModal" onclick="DiscontinueStudent('.$row['student_id'].')"> <span class="glyphicon glyphicon-remove"></span> Discontinue</a></li>
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


    public static function get_selected_student_to_edit($student_id)  {

        require('../database/db.php');


        $id = $student_id;

        $sql = "SELECT * FROM students WHERE student_id = $id ";
    
        $query = $connection->query($sql);
        $result = $query->fetch_assoc();

        $connection->close();

        echo json_encode($result);

   }

public static function update_student($id, $editfirstname, $editlastname, $editothername)  {
       require('../database/db.php');

        $validator = array('success' => false ,'messages' =>array());
      
        $sql = "UPDATE students SET firstname = '$editfirstname',lastname = '$editlastname',othername = '$editothername' WHERE student_id='$id'";
        $query = $connection->query($sql);
   
        if($query === TRUE) {
            $validator['success'] = true;
            $validator['messages'] = "Successfully Updated Student Data";
        } else {
            $validator['success'] = false;
            $validator['messages'] = "Error while Updating Student Data";
        }
   
        // close the database connection
        $connection->close();
   
        echo json_encode($validator);
  }

public static function discontinue_student($student_id) {
    require('../database/db.php');

    $validator = array('success' => false ,'messages' =>array());
  
    $sql = "UPDATE students SET student_status = 'discountinued' WHERE student_id='$student_id'";
    $query = $connection->query($sql);

    if($query === TRUE) {
        $validator['success'] = true;
        $validator['messages'] = "Successfully  Discontinued Student";
    } else {
        $validator['success'] = false;
        $validator['messages'] = "Error while Updating Student Data";
    }

    // close the database connection
    $connection->close();

    echo json_encode($validator);
} 


// function to get students to add their marks
public static function  get_class_students_to_add_their_marks($class_id)  {
    require('../database/db.php');
    $output = array('data' => array());

        $sql = "SELECT * FROM students WHERE class_id=$class_id AND student_status != 'discountinued'";
        $query = $connection->query($sql);

        $x = 1;
        while ($row = $query->fetch_assoc()) {


            $actionButton = '
              <button class="btn btn-primary btn-sm btn-lg" data-toggle="modal" data-target="#AddStudentMark" onclick="GetStudentInfo('.$row['student_id'].')"><span class="glyphicon glyphicon-plus-sign"></span> Add Mark</button>
             ';
        
            $output['data'][] = array(
                $x,
                $row['firstname'],
                $row['lastname'],
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

    