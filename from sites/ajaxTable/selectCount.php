<?php
$connect = mysqli_connect( 'localhost', 'root', '', 'testing' );

$output = '';

$sql = 'SELECT (first_name) as count FROM tbl_sample';

$result = mysqli_query( $connect, $sql );

$output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">  
                <tr>  
                     <th width="10%">count</th>  
                </tr>';

$rows = mysqli_num_rows( $result );

if ( $rows > 0 ) {

    while( $row = mysqli_fetch_array( $result ) ) {
        $output .= '  
                <tr>  
                     <td class="last_name"  contenteditable>'.$row['count'].'</td>  
                </tr>  
           ';
    }

} else {

    $output .= '
				<tr>  
					<td></td>  
					<td id="first_name" contenteditable></td>  
					<td id="last_name" contenteditable></td>  
			   </tr>';
}

$output .= '</table>  
      </div>';

echo $output;

?>