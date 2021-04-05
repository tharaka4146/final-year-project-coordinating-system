<?php

include 'config.php';

/* Getting file name */
$filename = $_FILES['file']['name'];
$newfilename = $_SESSION['uname'] . '.' . 'xlsx';


/* Location */
$location = "../uploads/ghanttCharts/" . $newfilename;
$uploadOk = 1;
$imageFileType = pathinfo($location, PATHINFO_EXTENSION);

/* Valid extensions */
$valid_extensions = array("xlsx");

/* Check file extension */
if (!in_array(strtolower($imageFileType), $valid_extensions)) {
   $uploadOk = 0;
}

if ($uploadOk == 0) {
   echo 0;
} else {
   /* Upload file */
   if (move_uploaded_file($_FILES['file']['tmp_name'], $location)) {
      echo $location;
   } else {
      echo 0;
   }
}
