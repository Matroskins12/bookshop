<?php
    $hostDB = 'localhost';
    $nameDB = 'root';
    $passwordDB = '';
    $databaseDB = 'shop';
    $connect = new mysqli($hostDB, $nameDB, $passwordDB, $databaseDB);
    if ($connect->connect_error) {
        echo 'database-connect-error';
    }
?>