<?php
//export.php
$connect = mysqli_connect('localhost', 'root', '', 'fypcs');
$output = '';
if (isset($_POST['export'])) {
     //$query = 'SELECT * FROM tbl_customer ORDER BY Country';
     //     $query = 'SELECT * FROM norm INNER JOIN student ON norm.kduEmail=student.kduEmail INNER JOIN norm.kduEmail=events.kduEmail';
     $query = "SELECT norm.kduEmail as kduEmail, student.admissionNo as admissionNo, norm.firstName as firstName, norm.lastName as lastName, norm.projectTitle as projectTitle, norm.area as area, norm.supervisor1 as supervisor1, norm.supervisor2 as supervisor2, student.examiner1 as examiner1, student.examiner2 as examiner2, events.start_event as start_event, events.end_event as end_event, events.location as location , student.coordinator as coordinator FROM norm INNER JOIN student ON norm.kduEmail=student.kduEmail INNER JOIN events ON norm.kduEmail=events.kduEmail";

     $result = mysqli_query($connect, $query);
     if (mysqli_num_rows($result) > 0) {
          $output .= '
               <table class="table" bordered="1">  
                    <tr>  
                         <th style="background-color:lightblue; color:white">indexNo</th>
                         <th style="background-color:lightblue; color:white">Name</th>
                         <th style="background-color:lightblue; color:white">projectTitle</th>
                         <th style="background-color:lightblue; color:white">area</th>
                         <th style="background-color:lightblue; color:white">supervisor1</th>
                         <th style="background-color:lightblue; color:white">supervisor2</th>
                         <th style="background-color:lightblue; color:white">examiner1</th>
                         <th style="background-color:lightblue; color:white">examiner2</th>
                         <th style="background-color:lightblue; color:white">startDateTime</th>
                         <th style="background-color:lightblue; color:white">endtDateTime</th>
                         <th style="background-color:lightblue; color:white">location</th>
                         <th style="background-color:lightblue; color:white">coordinator</th>
                    </tr>
  ';
          while ($row = mysqli_fetch_array($result)) {
               $output .= '
               <tr>  
               <td>' . $row['admissionNo'] . '</td>  
               <td>' . $row['firstName'] . " " . $row['lastName'] . '</td>  
               <td>' . $row['projectTitle'] . '</td>  
               <td>' . $row['area'] . '</td>  
               <td>' . $row['supervisor1'] . '</td>  
               <td>' . $row['supervisor2'] . '</td>  
               <td>' . $row['examiner1'] . '</td>  
               <td>' . $row['examiner2'] . '</td>  
               <td style = "width:200%;">' . $row['start_event'] . '</td>  
               <td>' . $row['end_event'] . '</td>  
               <td>' . $row['location'] . '</td>  
               <td>' . $row['coordinator'] . '</td>  
             </tr>  
   ';
          }
          $output .= '</table>';
          header('Content-Type: application/xls');
          header('Content-Disposition: attachment; filename=download.xls');
          echo $output;
     }
}
