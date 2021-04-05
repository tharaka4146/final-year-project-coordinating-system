<?php

$con = mysqli_connect('localhost', 'root', '', 'fypcs');

if (mysqli_connect_errno()) {
    echo 'Failed to connect to database' . mysqli_connect_error();
}

$uploadfile = $_FILES['uploadfile']['tmp_name'];

require '../Classes/PHPExcel.php';
require_once '../Classes/PHPExcel/IOFactory.php';

$objExcel = PHPExcel_IOFactory::load($uploadfile);

$insertqry = 'DELETE FROM `events` WHERE `id` > 1';
$insertres = mysqli_query($con, $insertqry);

foreach ($objExcel->getWorksheetIterator() as $worksheet) {

    $highestrow = $worksheet->getHighestRow();

    for ($row = 2; $row <= $highestrow; $row++) {

        $start_event = $worksheet->getCellByColumnAndRow(8, $row)->getValue();
        $start_event = PHPExcel_Style_NumberFormat::toFormattedString($start_event, "YYYY-M-D HH:MM");

        $end_event = $worksheet->getCellByColumnAndRow(9, $row)->getValue();
        $end_event = PHPExcel_Style_NumberFormat::toFormattedString($end_event, "YYYY-M-D HH:MM");

        $location = $worksheet->getCellByColumnAndRow(10, $row)->getValue();
        $kduEmail = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
        $examiner1 = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
        $examiner2 = $worksheet->getCellByColumnAndRow(7, $row)->getValue();
        $coordinator = $worksheet->getCellByColumnAndRow(11, $row)->getValue();


        $insertqry = "INSERT INTO `events`( `start_event`, `end_event`, `name`, `title`, `examiner1`, `examiner2`, `coordinator`) VALUES ('$start_event','$end_event','$location', '$kduEmail', '$examiner1', '$examiner2', '$coordinator')";
        $insertres = mysqli_query($con, $insertqry);
    }
}

//header( 'Location: blank.html' );
