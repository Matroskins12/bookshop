<?php
require "../database/connect.php";
$plusId = $_POST['plus'];
$minQuantity = $_POST['minquantity'];
$minusId = $_POST['minus'];
$deleteId = $_POST['delete'];
if ($plusId) {
    $sqlPlus = "UPDATE productbasket SET productquantity = productquantity + 1 WHERE productid = '$plusId'";
    if ($connect->query($sqlPlus) === TRUE) {
        header("Location: ../basket.php");
    } else {
        echo "Error: " . $sqlPlus . "<br>" . $connect->error;
    }
} else if ($minusId) {
    if ($minQuantity <= 1) {
        $message = "You can't make quantity below 1.";
        header("Location: ../basket.php?message=$message");
    } else {
        $sqlMinus = "UPDATE productbasket SET productquantity = productquantity - 1 WHERE productid = '$minusId'";
        if ($connect->query($sqlMinus) === TRUE) {
            header("Location: ../basket.php");
        } else {
            echo "Error: " . $sqlMinus . "<br>" . $connect->error;
        }
    }
} else if ($deleteId) {
    $sqlDelete = "DELETE FROM productbasket WHERE productid = '$deleteId'";
    if ($connect->query($sqlDelete) === TRUE) {
        header("Location: ../basket.php");
    } else {
        echo "Error: " . $sqlDelete . "<br>" . $connect->error;
    }
} else {
    echo "Query Error";
}
$connect->close();
?>