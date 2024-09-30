<?php
   session_start();
   require "./database/connect.php";
   $idUser = $_SESSION['id_user'];
   if (isset($_SESSION['payment_success']) === true) {
      $sqlUpdate = "UPDATE productbasket SET status='hide' WHERE productuserid='$idUser'";
      var_dump($sqlUpdate, $_SESSION['payment_success']);
      if ($connect->query($sqlUpdate) === true) {
         echo "New record created successfully";
         $message = "Congrats! Editing book is successful";
         header("Location: index.php?message=$message");
       } else {
         echo "Error: " . $sql . "<br>" . $connect->error;
       }
       $connect -> close();
   }
?>