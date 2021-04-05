<?php
  $file = 'C:/xampp/htdocs/fypcs/from sites/viewPdf/tharaka4146@gmail.com.pdf';
  $filename = 'tharaka4146@gmail.com.pdf';
  header('Content-type: application/pdf');
  header('Content-Disposition: inline; filename="' . $filename . '"');
  header('Content-Transfer-Encoding: binary');
  header('Accept-Ranges: bytes');
  @readfile($file);
?>