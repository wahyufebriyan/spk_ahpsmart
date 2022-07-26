<?php
// mengekspor ke excel
    header("Content-type: application/vnd-ms-excel");
// membuat nama file laporan.xls
    header("Content-Disposition: attachment; filename= Laporan.xls");
// mengambil data table
    include 'data-laporan.php';

?>