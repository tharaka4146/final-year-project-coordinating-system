<head>
     <style>
          table,
          th,
          td {
               border: 1px solid #BFBDC9;
          }
     </style>
</head>

<?php
//export.php
$connect = mysqli_connect('localhost', 'root', '', 'fypcs');
$output = '';
if (isset($_POST['export'])) {

     $query = "SELECT * from norm WHERE indexNo != 1";
     $result = mysqli_query($connect, $query);

     if (mysqli_num_rows($result) > 0) {
          $output .= '
               <table class="table">  
                    <tr>  
                         <th style="background-color:lightblue; color:white">Kdu Email</th>
                         <th style="background-color:lightblue; color:white">Name</th>
                         <th style="background-color:lightblue; color:white">Project Title</th>
                         <th style="background-color:lightblue; color:white">Area</th>
                         <th style="background-color:lightblue; color:white">Supervisor1</th>
                         <th style="background-color:lightblue; color:white">Supervisor2</th>
                         <th style="background-color:lightblue; color:white">Examiner1</th>
                         <th style="background-color:lightblue; color:white">Examiner2</th>
                         <th style="background-color:lightblue; color:white">Start (DD-MM-YY HH:mm)</th>
                         <th style="background-color:lightblue; color:white">End (DD-MM-YY HH:mm)</th>
                         <th style="background-color:lightblue; color:white">Location</th>
                         <th style="background-color:lightblue; color:white">Coordinator name</th>
                    </tr>
                    
  ';
          while ($row = mysqli_fetch_array($result)) {
               $output .= '
               <tr>  
               <td>' . $row['kduEmail'] . '</td>  
               <td>' . $row['firstName'] . " " . $row['lastName'] . '</td>  
               <td>' . $row['projectTitle'] . '</td>  
               <td>' . $row['area'] . '</td>  
               <td>' . $row['s1'] . '</td>  
               <td>' . $row['s2'] . '</td>  
               <td>' . $row['examiner1'] . '</td>  
               <td>' . $row['examiner2'] . '</td>  
               <td></td>  
               <td></td>  
               <td></td>  
               <td></td>  
             </tr>  
   ';
          }

          $output .= '</table>';
          header('Content-Type: application/xls');
          header("Content-Disposition: attachment; filename=sample file " . date("D-M-Y") . ".xls");
          echo $output;
     }
}
