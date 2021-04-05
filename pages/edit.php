<?php
$connect = mysqli_connect( 'localhost', 'root', '', 'fypcs' );
$id = $_POST['id'];

$text = $_POST['text'];

$column_name = $_POST['column_name'];

$sql = 'UPDATE user SET '.$column_name."='".$text."' WHERE indexNo='".$id."'";

if ( mysqli_query( $connect, $sql ) ) {

    echo 'Data Updated';

}

?>