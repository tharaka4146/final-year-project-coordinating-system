<?php
$connect = mysqli_connect( 'localhost', 'root', '', 'fypcs' );

$output = '';

$sql = 'SELECT * FROM user ORDER BY indexNo DESC';

$result = mysqli_query( $connect, $sql );

$output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">  
                <tr>  
                     <th width="25%">indexNo</th>  
                     <th width="25%">KDU email</th>  
                     <th width="50%">Password</th>  
                </tr>';

$rows = mysqli_num_rows( $result );

if ( $rows > 0 ) {

    while( $row = mysqli_fetch_array( $result ) ) {
        $output .= '  
                <tr>  
                     <td>'.$row['indexNo'].'</td>  
                     <td class="kduEmail" data-id1="'.$row['indexNo'].'" contenteditable>'.$row['kduEmail'].'</td>  
                     <td class="password" data-id2="'.$row['indexNo'].'" contenteditable>'.$row['password'].'</td>  
                </tr>  
           ';
    }

} else {
    $output .= '
                    <tr>  
                         <td></td>
					<td id="kduEmail" contenteditable></td>  
					<td id="password" contenteditable></td>  
			   </tr>';
}

$output .= '</table></div>';

echo $output;

?>