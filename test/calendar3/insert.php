<?php

//insert.php

$connect = new PDO( 'mysql:host=localhost;dbname=fypcs', 'root', '' );

if ( isset( $_POST['title'] ) && isset( $_POST['name'] ) )
 {
    $query = "
 INSERT INTO events 
 (title, name, start_event, end_event) 
 VALUES (:title,:name, :start_event, :end_event)
 ";
    $statement = $connect->prepare( $query );
    $statement->execute(
        array(
            ':title'  => $_POST['title'],
            ':name'  => $_POST['name'],
            ':start_event' => $_POST['start'],
            ':end_event' => $_POST['end']
        )
    );
}

?>