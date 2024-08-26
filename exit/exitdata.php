<?php
    session_start();
    // if (($_SESSION['login_user']) == true) {
        // $_SESSION['login_user'] = false;
        session_destroy();
        header("Location: ../index.php?message=Successful exit!");
    // }
?>