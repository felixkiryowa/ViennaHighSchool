<?php
 /*Table schema
    
    lets create a classes table if it doesnt exist
*/

class Event
{
   
    public function __construct($title, $start_event, $end_event)
    {
        require('../database/db.php');
        $create_events_query = "CREATE TABLE IF NOT EXISTS events(id SERIAL PRIMARY KEY NOT NULL, title VARCHAR(255) NOT NULL,start_event DATE NOT NULL, end_event DATE  NOT NULL )";
        $connection->query($create_events_query);
        $this -> $title = $title;
        $this -> $start_event = $start_event;
        $this -> $end_event = $end_event;

        $register_events_query = $connection->query("INSERT INTO events(title, start_event, end_event)  VALUES ('".$this -> $title."', '".$this -> $start_event."','".$this -> $end_event."')");
        if($register_events_query) {
            return true;
        }
        else{
            return false;
        }
    }

    public static function load(){
        require('../database/db.php');
        $data = array();
        $query = "SELECT  * FROM events ORDER BY id";
        $execute = $connection->query($query);
        while ($row = $execute->fetch_assoc()) {

            $data[] = array(
                'id'   => $row["id"],
                'title'   => $row["title"],
                'start'   => $row["start_event"],
                'end'   => $row["end_event"]
               );
        }

        echo json_encode($data);
    }
    
    public static function update_event($title,$start,$end,$id) {
            require('../database/db.php');
    
            $validator = array('success' => false ,'messages' =>array());
            $sql = "UPDATE events SET title = '$title',start_event = '$start',end_event = '$end' WHERE id='$id'";
            $query = $connection->query($sql);

            if($query === TRUE) {
                $validator['success'] = true;
                $validator['messages'] = "Successfully Added";
            } else {
                $validator['success'] = false;
                $validator['messages'] = "Error while Updating Events";
            }

            // close the database connection
            $connection->close();

            echo json_encode($validator);

    }

    public static function delete_event($id) {
        require('../database/db.php');

        $validator = array('success' => false ,'messages' =>array());
        $sql = "DELETE FROM events  WHERE id='$id'";
        $query = $connection->query($sql);

        if($query === TRUE) {
            $validator['success'] = true;
            $validator['messages'] = "Successfully Deleted An Event";
        } else {
            $validator['success'] = false;
            $validator['messages'] = "Error while Deleting Events";
        }

        // close the database connection
        $connection->close();

        echo json_encode($validator);

    }

}
    
?>

    