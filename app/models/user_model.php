<?php
 /*Table schema
    
    lets create a classes table if it doesnt exist
*/

class User
{
   
    public function __construct($firstname, $lastname, $othername, $username, $email, $password, $userrole,$status, $teaches_class, $class_teacher_of, $subject_list)
    {
        require('../database/db.php');
        $create_user_query = "CREATE TABLE IF NOT EXISTS users(user_id SERIAL PRIMARY KEY NOT NULL, firstname VARCHAR(255) NOT NULL,lastname VARCHAR(255) NOT NULL,othername VARCHAR(255) NULL, username VARCHAR(255) NOT NULL, email VARCHAR(255) NULL, userpass VARCHAR(255) NOT NULL, usertype VARCHAR(255) NOT NULL ,user_status VARCHAR(255) NOT NULL, teaches_class VARCHAR(255) NOT NULL,  class_teacher_of VARCHAR(255) NULL,subjects VARCHAR(255) NOT NULL,registered_on TIMESTAMP DEFAULT NOW() )";
        $connection->query($create_user_query);
        $this -> $firstname = $firstname;
        $this -> $lastname = $lastname;
        $this -> $othername = $othername;
        $this -> $username = $username;
        $this -> $email= $email;
        $this -> $password = $password;
        $this -> $userrole = $userrole;
        $this -> $status = $status;
        $this -> $teaches_class = $teaches_class;
        $this -> $class_teacher_of =  $class_teacher_of;
        $this -> $subject_list = $subject_list;
        $register_users_query = $connection->query("INSERT INTO users(firstname, lastname, othername, username, email, userpass, usertype, user_status, teaches_class, class_teacher_of, subjects)  VALUES ('".$this -> $firstname."', '".$this -> $lastname."','".$this -> $othername."','".$this -> $username."' , '".$this -> $email."', '".$this -> $password."','".$this -> $userrole."' ,'".$this -> $status."','".$this -> $teaches_class."', '".$this -> $class_teacher_of."', '".$this -> $subject_list."')");
        if($register_users_query) {
            return true;
        }
        else{
            return false;
        }
    }

    public static function loginUser($username, $password){
        require('../database/db.php');
        $query = "SELECT EXISTS(SELECT * FROM users WHERE username = '".$username."' AND userpass = '".$password."' LIMIT 1)";
        $result = mysqli_fetch_assoc($connection->query($query));
        if(current($result)==1){
            return true;
        }
        else{
            return false;
        }
    }

    public static function getUserType($username, $password){
        require('../database/db.php');
        $query = "SELECT * FROM users WHERE username = '".$username."' AND userpass = '".$password."'";
        $result = $connection->query($query);
        $row= $result->fetch_assoc();
        return $row;
    }

    public static function fetch_all_teachers(){
        require('../database/db.php');
        $output = array('data' =>array());
        $select_all_users= "SELECT * FROM users";
        $query = $connection->query($select_all_users);
        $x=1;
        while($row= $query->fetch_assoc()){
                $actionButton = '<button class="btn btn-warning" data-toggle="modal" data-target="#editMemberModal" onclick="editTeacher('.$row['user_id'].')"><span class="glyphicon glyphicon-pencil"></span></button>';
                
                $output['data'][] = array(
                    $x,
                    $row['firstname'],
                    $row['lastname'],
                    $row['othername'],
                    $row['username'],
                    $row['email'],
                    $row['userpass'],
                    $row['usertype'],
                    $row['user_status'],
                $actionButton,
                );
                $x++;

        }
        return $output;
    }
    public static function authorize_logged_user($user_id, $usertype){
        require('../database/db.php');

        $select_all_users= "SELECT teaches_class, subjects FROM users WHERE user_id ='".$user_id."' AND usertype = '".$usertype."'";
        $query = $connection->query($select_all_users);
        
        return $query->fetch_assoc();
    }

    public static function get_teacher_status($user_id){
        require('../database/db.php');

        $select_all_classes= "SELECT class_teacher_of FROM users WHERE user_id ='".$user_id."'";
        $query = $connection->query($select_all_classes);
        
        return $query->fetch_assoc();
    }



}
    
?>

    