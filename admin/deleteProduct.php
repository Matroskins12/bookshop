<?php
$idProduct = $_GET["id"];
require "../database/connect.php";
$sqlSelect = "SELECT * FROM products WHERE id=$idProduct";
$result = $connect->query($sqlSelect);
$row = $result->fetch_assoc();
// удаление файла 
    $sqlDelete = "DELETE FROM products  WHERE id=$idProduct";
    if ($connect->query($sqlDelete) === TRUE) {
        echo "New record created successfully";
        $message = "Congrats! Deleting book is successful";
        header("Location: ../admin/admin.php?message=$message");
      } else {
        echo "Error: " . $sqlDelete . "<br>" . $connect->error;
      }
      $connect -> close();