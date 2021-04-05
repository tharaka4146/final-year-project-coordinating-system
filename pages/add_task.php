<?php

//add_task.php

include('database_connection.php');

if($_POST["task_name"])
{
 $data = array(
  ':user_id'  => $_SESSION['user_id'],
  ':task_details' => trim($_POST["task_name"]),
  ':task_status' => 'no'
 );

 $query = "
 INSERT INTO task_list 
 (user_id, task_details, task_status) 
 VALUES (:user_id, :task_details, :task_status)
 ";

 $statement = $connect->prepare($query);

 if($statement->execute($data))
 {
  $task_list_id = $connect->lastInsertId();

  echo '<br><a href="#" class="list-group-flush" id="list-group-flush'.$task_list_id.'" data-id="'.$task_list_id.'">'.$_POST["task_name"].' <span class="badge float-left" data-id="'.$task_list_id.'"><input type = "checkbox"></span></a>';

 }
}


?>
