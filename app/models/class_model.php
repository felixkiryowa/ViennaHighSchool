<?php
require_once 'database.php';


 /*Table schema
    
    lets create a classes table if it doesnt exist
*/

class RegisterClasses
{
    
    public function __construct($class_name,$stream)
    {
        require('../database/db.php');
        $create_classes_table = "CREATE TABLE IF NOT EXISTS classes( class_id SERIAL PRIMARY KEY NOT NULL,class_name VARCHAR(255) NOT NULL,stream VARCHAR(255) NULL,registered_on TIMESTAMP DEFAULT NOW())";
        $connection -> query($create_classes_table);
        $this -> $class_name = $class_name;
        $this -> $stream = $stream;
        $register_classes_query = $connection -> query("INSERT INTO classes (class_name, stream, registered_on)  VALUES ('".$this -> $class_name."', '".$this -> $stream."')");
        $connection->close();
        if($register_classes_query) {
            return "success";
        }
        else{
            return "failed";
    public function __construct($class_name)
    {
        require('../database/db.php');
        $create_classes_table = "CREATE TABLE IF NOT EXISTS classes( class_id SERIAL PRIMARY KEY NOT NULL,class_name VARCHAR(255) NOT NULL,registered_on TIMESTAMP DEFAULT NOW())";
        $connection -> query($create_classes_table);
        $this -> $class_name = $class_name;
        $register_classes_query = $connection -> query("INSERT INTO classes (class_name)  VALUES ('".$this -> $class_name."')");
        $connection -> close();
        if($register_classes_query) {
            return true;
        }
        else{
            return false;
        }
    }
    public static function get_classes() {
        require('../database/db.php');
        $data = array();
        $query = "SELECT  * FROM classes ORDER BY id";
        $execute = $connection->query($query);
        while ($row = $execute->fetch_assoc()) {

            $data[] = array(
                'id'   => $row["id"],
                'class_name'   => $row["class_name"]
               );
        }

        echo json_encode($data);
    }
        return $data;
    }

    public static function get_class_id($class_name){
        require('../database/db.php');

        $get_class_id = "SELECT class_id FROM classes WHERE class_name ='".$class_name."'";
        $query = $connection->query( $get_class_id);
        
        return $query->fetch_assoc();
    }
    
}
    
?>

    