<?php
$connect = mysqli_connect( 'localhost', 'root', '', 'fypcs' );

$output = '';

$sql = 'SELECT * FROM user ORDER BY indexNo DESC';

$result = mysqli_query( $connect, $sql );

$output .= '  
      <div class="table-responsive">  
           <table class="table table table-light table-striped table-hover">  

                <tr>  
                     <th width="10%" hidden>IndexNo</th>  
                     <th width="40%">KDU Email</th>  
                     <th width="40%">Password</th>  
                     <th width="10%">Delete</th>  
                </tr>';

$rows = mysqli_num_rows( $result );
if ( $rows > 0 ) {

    while( $row = mysqli_fetch_array( $result ) ) {

        $output .= '  
                <tr>  
                     <td hidden>'.$row['indexNo'].'</td>  
                     <td class="kduEmail" data-id1="'.$row['indexNo'].'" contenteditable>'.$row['kduEmail'].'</td>  
                     <td style = "-webkit-text-security: disc;" class="password" data-id2="'.$row['indexNo'].'" >'.$row['password'].'</td>  
                     <td><button type="button" name="delete_btn" data-id3="'.$row['indexNo'].'" class="btn btn-danger btn_delete">delete</button></td>  
                </tr>  
           ';

    }

}

$output .= '</table>  
      </div>';

echo $output;

?>