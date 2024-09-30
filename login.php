<<<<<<< HEAD
<?php
    session_start();
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
    <form action="./logic/logdata.php" method="post">
        <label for="email">email</label>
        <input id="email" name="email" type="email" required>
        <label for="password">password</label>
        <input id="password" name="password" type="password" required>
        <button class = "submitButton" type="submit">Login</button>
    </form>
    <p>You don't have account, do you?</p>
    <a href="registration.php">Create a new one!</a>
    <?php if (isset($_GET["message"])) { ?>
    <p class="webMessage"><?php echo $_GET["message"] ?></p>
    <?php } ?>
    <script src="./js/setTimeOut.js"></script>
</body>
=======
<?php
    session_start();
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
    <form action="./login/logdata.php" method="post">
        <label for="email">email</label>
        <input id="email" name="email" type="email" required>
        <label for="password">password</label>
        <input id="password" name="password" type="password" required>
        <button class = "submitButton" type="submit">Login</button>
    </form>
    <p>You don't have account, do you?</p>
    <a href="registration.php">Create a new one!</a>
    <?php if (isset($_GET["message"])) { ?>
    <p class="webMessage"><?php echo $_GET["message"] ?></p>
    <?php } ?>
    <script src="./js/setTimeOut.js"></script>
</body>
>>>>>>> eb38ab8125a0fdf0bf4013ddc1a540cd5816213e
</html>