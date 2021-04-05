<?php


include 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;


$temp = explode(".", $_FILES["fileToUpload"]["name"]);
$newfilename = 'asdssasd' . '.' . end($temp);


$reader = IOFactory::createReader('Xlsx');
$spreadsheet = $reader->load($link = 'sample_data.xlsx');
$writer = IOFactory::createWriter($spreadsheet, 'Html');
$message = $writer->save('php://output');

//$newfilename = 'asd' . '.' . 'html';

if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], "uploads/" . $newfilename)) {
    echo "The file has been uploaded.";
} else {
    echo "Sorry, there was an error uploading your file.";
}
