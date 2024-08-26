<header>
    <!-- <div class="imgDiv">
        <img src="./img/heartlogo.png">
    </div> -->
    <nav>
        <ul class="navUl">
            <li>
                <a class="navLi" href="index.php">Home</a>
            </li>
            <li>
                <a class="navLi" href="shop.php">Shop</a>
            </li>
            <?php
            // session_start();
            if ((isset($_SESSION['login_user']) === true) && (isset($_SESSION['role_user']) != null)) {
                if ($_SESSION['role_user'] === 'admin') {
                    ?>
                    <li>
                        <a class="navLi" href="admin/admin.php">Admin</a>
                    </li>
                <?php } else if($_SESSION['role_user'] === 'client'){
                    ?>
                    <li>
                        <a class="navLi" href="./client/client.php">Profile</a>
                    </li>
                    <li>
                        <a class="navLi" href="./basket.php"><i class="fa-solid fa-cart-shopping"></i></a>
                    </li>
                    <?php
                }  ?>

                <li>
                    <form action="./exit/exitdata.php" method="post">
                        <input class="exitInput" type="submit" value="Exit">
                    </form>
                </li>
                <?php
            } else {
                ?>
                <li>
                    <a class="navLi" href="registration.php">Registration</a>
                </li>
                <li>
                    <a class="navLi" href="login.php">Login</a>
                </li>
                <?php
            }
            ?>
        </ul>
    </nav>
</header>