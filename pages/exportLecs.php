<?php
//export.php
$connect = mysqli_connect('localhost', 'root', '', 'fypcs');

$output = '';
if (isset($_POST['export'])) {

    $query = "SELECT distinct(name) as name, kduEmail from supervisors";
    $result = mysqli_query($connect, $query);

    if (mysqli_num_rows($result) > 0) {
        $output .= '
               <table class="table" border="1">  

                    <tr>  
                         <th style="background-color:lightblue; color:white">Name</th>
                         <th style="background-color:lightblue; color:white">Kdu Email</th>
                    </tr>
                    
    ';
        while ($row = mysqli_fetch_array($result)) {
            $output .= '
               <tr>  
                    <td>' . $row['name'] . '</td>  
                    <td>' . $row['kduEmail'] . '</td>  
               </tr>  
   ';
        }


        $output .= '</table>';
        header('Content-Type: application/xls');
        header("Content-Disposition: attachment; filename=lecturer names " . date("D-M-Y") . ".xls");
        echo $output;
    }
}
