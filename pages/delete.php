<?php
$connect = mysqli_connect( 'localhost', 'root', '', 'fypcs' );
$sql = "DELETE FROM user WHERE indexNo = '".$_POST['id']."'";

if ( mysqli_query( $connect, $sql ) ) {

    echo 'Data Deleted';

}

?>