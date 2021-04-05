<?php

  $filename = $_GET['filename'];

  $file = "C:/xampp/htdocs/fypcs/uploads/interim1/".$filename.".pdf";
  //$filename = '"' . $filename . '".pdf';
  header('Content-type: application/pdf');
  //header('Content-Disposition: inline; filename="' . $filename . '"');
  //header('Content-Transfer-Encoding: binary');
  //header('Accept-Ranges: bytes');
  @readfile($file);
