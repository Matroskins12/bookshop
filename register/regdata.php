<?php
    // 1)подключаем базу данных
    require "../database/connect.php";
    // 2)получаем данные с каждого импута
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    // 3)отправка данных в указанную таблицу с полями
    $sql = "INSERT INTO regusers (firstname, lastname, email, password, userole) VALUES ('$firstname', '$lastname', '$email', '$hashed_password', 'client')";
    // 4)проверка на отправку данных
    if ($connect->query($sql) === TRUE) {
        echo "New record created successfully";
        $message = "Congrats! Registration is successful";
        header("Location: ../index.php?message=$message");
      } else {
        echo "Error: " . $sql . "<br>" . $connect->error;
      }
      $connect -> close();
?>