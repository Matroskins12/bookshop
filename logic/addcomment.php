<?php
session_start();
require "../database/connect.php";
$productid = $_POST["productid"];
$userid = $_SESSION['id_user'];
$comment = $_POST["comment"];
$rating = $_POST["rate"];
$sqlUser = "SELECT * FROM regusers WHERE id='$userid'";
$resultUser = $connect->query($sqlUser);
$rowUser = $resultUser->fetch_assoc();
$username = $rowUser['firstname'] . ' ' . $rowUser['lastname'];
$sql = "INSERT INTO bookcomments (productid, comment, rating, username) VALUES('$productid', '$comment', '$rating', '$username')";
if ($connect->query($sql) === TRUE) {
  $message = "Thank You! Your feedback is important for us";
  header("Location: ../bookInfo.php?id=$productid");
} else {
  echo "Error: " . $sql . "<br>" . $connect->error;
}
$connect->close();
?>