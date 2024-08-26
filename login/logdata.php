<?php
    session_start();
    require "../database/connect.php";
    $email = $_POST["email"];
    $password = $_POST["password"];
    $sql = "SELECT * FROM regusers WHERE email='$email'";
    $result = $connect -> query($sql);
    $row = $result -> fetch_assoc();
    if (password_verify($password, $row['password'])) {
        $_SESSION['login_user'] = true;
        $_SESSION['role_user'] = $row['userole'];
        $_SESSION['id_user'] = $row['id'];
        if ($row['userole'] == 'admin') {
            header("Location: ../admin/admin.php?message=Login succesful!");
        } else {
            header("Location: ../index.php?message=Login succesful!");
        }
    } else {
        $_SESSION['login_user'] = false;
        header("Location: ../login.php?message=Incorrect! Try again!");
    }
    var_dump($row['password']);
    $connect -> close();
?>