<?php
    session_start();
    require "./database/connect.php"
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
</head>
<body>
    <?php require "./components/header.php" ?>
    <form action="./register/regdata.php" method="post">
        <label for="firstname">firstname</label>
        <input id="firstname" name="firstname" type="text" required>
        <label for="lastname">lastname</label>
        <input id="lastname" name="lastname" type="text" required>
        <label for="email">email</label>
        <input id="email" name="email" type="email" required>
        <label for="password">password</label>
        <input id="password" name="password" type="password" required>
        <button class="submitButton" type="submit">Sign up</button>
    </form>
</body>
</html>