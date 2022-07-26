<?php
// (A) CONNECT TO DATABASE - CHANGE SETTINGS TO YOUR OWN!
$dbhost = 'localhost';
$dbname = 'ahp';
$dbchar = 'utf8';
$dbuser = 'root';
$dbpass = 'wahyu@2997';
$pdo = new PDO(
  "mysql:host=$dbhost;charset=$dbchar;dbname=$dbname",
  $dbuser, $dbpass, [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
  ]
);
include('header_admin.php');

if(isset($_POST["submit_file"]))
{
$file = $_FILES["file"]["tmp_name"];
// (B) PHPSPREADSHEET TO LOAD EXCEL FILE
require "vendor/autoload.php";
$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
$spreadsheet = $reader->load($file);
$worksheet = $spreadsheet->getActiveSheet();

// (C) READ DATA + IMPORT
$sql = "INSERT INTO `alternatif` (`nama`) VALUES ( ?)";
foreach ($worksheet->getRowIterator() as $row) {
  // (C1) FETCH DATA FROM WORKSHEET
  $cellIterator = $row->getCellIterator();
  $cellIterator->setIterateOnlyExistingCells(false);
  $data = [];
  foreach ($cellIterator as $cell) { $data[] = $cell->getValue(); }

  // (C2) INSERT INTO DATABASE
  print_r($data);
  try {
    $stmt = $pdo->prepare($sql);
    $stmt->execute($data);
    echo "OK - SUKSES <br>";
  } catch (Exception $ex) { echo $ex->getMessage() . "<br>"; }
  $stmt = null;
}

// (D) CLOSE DATABASE CONNECTION
if ($stmt !== null) { $stmt = null; }
if ($pdo !== null) { $pdo = null; }
}