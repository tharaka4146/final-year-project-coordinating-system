<?php
$connect = mysqli_connect('localhost', 'root', '', 'fypcs');

//$sql = 'SELECT * FROM events';
//$sql = 'SELECT * FROM student';
$sql = "SELECT norm.kduEmail as kduEmail, student.admissionNo as admissionNo, norm.firstName as firstName, norm.lastName as lastName, norm.projectTitle as projectTitle, norm.area as area, norm.supervisor1 as supervisor1, norm.supervisor2 as supervisor2, student.examiner1 as examiner1, student.examiner2 as examiner2, events.start_event as start_event, events.end_event as end_event, events.location as location , student.coordinator as coordinator FROM norm INNER JOIN student ON norm.kduEmail=student.kduEmail INNER JOIN events ON norm.kduEmail=events.kduEmail";
$result = mysqli_query($connect, $sql);
?>
<html>

<head>
  <title>Export MySQL data to Excel in PHP</title>
  <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css' />
  <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js'></script>
  <script src='https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js'></script>
</head>

<body>
  <div class='container'>
    <br />
    <br />
    <br />
    <div class='table-responsive'>
      <h2 align='center'>Export MySQL data to Excel in PHP</h2><br />
      <table class='table table-bordered'>
        <tr>
          <th style='background-color:lightblue; color:white'>indexNo</th>
          <th style='background-color:lightblue; color:white'>Name</th>
          <th style='background-color:lightblue; color:white'>projectTitle</th>
          <th style='background-color:lightblue; color:white'>area</th>
          <th style='background-color:lightblue; color:white'>supervisor1</th>
          <th style='background-color:lightblue; color:white'>supervisor2</th>
          <th style='background-color:lightblue; color:white'>examiner1</th>
          <th style='background-color:lightblue; color:white'>examiner2</th>
          <th style='background-color:lightblue; color:white'>startDateTime</th>
          <th style='background-color:lightblue; color:white'>endtDateTime</th>
          <th style='background-color:lightblue; color:white'>location</th>
          <th style='background-color:lightblue; color:white'>coordinator</th>
        </tr>

        <?php
        while ($row = mysqli_fetch_array($result)) {

          echo '  
       <tr>  
         <td>' . $row['admissionNo'] . '</td>  
         <td>' . $row['firstName'] ." ".$row['lastName']. '</td>  
         <td>' . $row['projectTitle'] . '</td>  
         <td>' . $row['area'] . '</td>  
         <td>' . $row['supervisor1'] . '</td>  
         <td>' . $row['supervisor2'] . '</td>  
         <td>' . $row['examiner1'] . '</td>  
         <td>' . $row['examiner2'] . '</td>  
         <td>' . $row['start_event'] . '</td>  
         <td>' . $row['end_event'] . '</td>  
         <td>' . $row['location'] . '</td>  
         <td>' . $row['coordinator'] . '</td>  
       </tr>  
        ';
        }
        ?>

      </table>
      <br />
      <form method='post' action='export.php'>
        <input type='submit' name='export' class='btn btn-success' value='Export' />
      </form>
    </div>
  </div>
</body>

</html>