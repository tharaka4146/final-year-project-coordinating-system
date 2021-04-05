<?php

//upload.php

include 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;


$reader = IOFactory::createReader('Xlsx');
$spreadsheet = $reader->load($_FILES['select_excel']['tmp_name']);
$writer = IOFactory::createWriter($spreadsheet, 'Html');
$message = $writer->save('php://output');


//echo $message;
