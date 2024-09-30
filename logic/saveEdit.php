<?php 
  session_start();
  require "../database/connect.php";
  $id = $_SESSION['id_user'];
  $firstname = $_POST["firstname"];
  $lastname = $_POST["lastname"];
  $email = $_POST["email"];
  $sql = "UPDATE `regusers` SET `firstname`='$firstname',`lastname`='$lastname',`email`='$email' WHERE id=$id";
  if ($connect->query($sql) === TRUE) {
    echo "Edit is saved successfully";
    $message = "Congrats! Adding new book is successful";
    header("Location: ../client/client.php?message=$message");
  } else {
    echo "Error: " . $sql . "<br>" . $connect->error;
  }
  $connect -> close();
?>