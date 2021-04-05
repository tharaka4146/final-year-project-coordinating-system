<?php
$connect = mysqli_connect('localhost', 'root', '', 'fypcs');

//$sql = 'SELECT * FROM tbl_customer';
$sql = 'SELECT * FROM norm INNER JOIN student ON norm.kduEmail=student.kduEmail INNER JOIN norm.kduEmail=events.kduEmail';
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
          <th style='background-color:lightblue; color:white'>Name</th>
          <th style='background-color:lightblue; color:white'>Address</th>
          <th style='background-color:lightblue; color:white'>City</th>
          <th style='background-color:lightblue; color:white'>Postal Code</th>
          <th style='background-color:lightblue; color:white'>Country</th>
          <th style='background-color:lightblue; color:white'>new1</th>
          <th style='background-color:lightblue; color:white'>new2</th>
          <th style='background-color:lightblue; color:white'>new2</th>
          <th style='background-color:lightblue; color:white'>new2</th>
          <th style='background-color:lightblue; color:white'>new2</th>
          <th style='background-color:lightblue; color:white'>new2</th>
          <th style='background-color:lightblue; color:white'>new2</th>
          <th style='background-color:lightblue; color:white'>new2</th>
        </tr>
        <?php
        while ($row = mysqli_fetch_array($result)) {

          echo '  
       <tr>  
         <td>' . $row['indexNo'] . '</td>  
         <td>' . $row['firstName'] . '</td>  
         <td>' . $row['lastName'] . '</td>  
         <td>' . $row['topic'] . '</td>  
         <td>' . $row['area'] . '</td>
         <td>' . $row['supervisor1'] . '</td>
         <td>' . $row['supervisor2'] . '</td>
         <td>' . $row['supervisor3'] . '</td>
         <td>' . $row['examiner1'] . '</td>
         <td>' . $row['examiner2'] . '</td>
         <td>' . $row['start_event'] . '</td>
         <td>' . $row['end_event'] . '</td>
         <td>' . $row['location'] . '</td>
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