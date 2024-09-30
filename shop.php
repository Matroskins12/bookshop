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
    <title>Shop</title>
</head>
<body>
    <?php require "./components/header.php" ?>
    <?php require "./database/connect.php";?> 
    <ul class="navUl">
        <li><a href="shop.php?category=novel">Novel</a></li>
        <li><a href="shop.php?category=drama">Drama</a></li>
        <li><a href="shop.php?category=mystery">Mystery</a></li>
        <li><a href="shop.php?category=comedy">Comedy</a></li>
        <li><a href="shop.php?category=fantasy">Fantasy</a></li>
        <li><a href="shop.php?category=adventure">Adventure</a></li>
    </ul>
    <?php
        if(isset($_GET["category"])){
            $categoryProduct = $_GET["category"];
            $sql =  "SELECT * FROM products WHERE category='$categoryProduct'";
        } else {
            $sql = "SELECT * FROM products";
        }
        $result = $connect -> query($sql);
        $row = $result -> fetch_assoc();
        ?>
     <div class="bookCardDiv">
     <?php
        // echo 'result';
        // var_dump($result);
        foreach ($result as $pr) {
            ?>
            <div class="bookCard">
                <div class="bookCardImgDiv">
                    <img src="image/<?php echo $pr['image']; ?>" alt="<?php echo $pr['image']; ?>" class="bookImg">
                </div>
                <div class="bookCardDescription">
                    <p><?php echo $pr['name']; ?></p>
                    <p>By <?php echo $pr['author']; ?></p>
                    <p><?php echo $pr['price']; ?>$</p>
                    <a href="./bookInfo.php?id=<?php echo $pr['id']?>">See more</a>
                    <?php 
                        if (!isset($_SESSION['login_user'])) {
                            ?>
                            <a href="login.php">Login to buy</a>
                            <?php
                        }
                    ?>
                </div>
            </div>
            <?php
        }
        ?>
        </div>
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
    <title>Shop</title>
</head>
<body>
    <?php require "./components/header.php" ?>
    <?php require "./database/connect.php";?> 
    <ul class="navUl">
        <li><a href="shop.php?category=novel">Novel</a></li>
        <li><a href="shop.php?category=drama">Drama</a></li>
        <li><a href="shop.php?category=mystery">Mystery</a></li>
        <li><a href="shop.php?category=comedy">Comedy</a></li>
        <li><a href="shop.php?category=fantasy">Fantasy</a></li>
        <li><a href="shop.php?category=adventure">Adventure</a></li>
    </ul>
    <?php
        if(isset($_GET["category"])){
            $categoryProduct = $_GET["category"];
            $sql =  "SELECT * FROM products WHERE category='$categoryProduct', display='show'";
        } else {
            $sql = "SELECT * FROM products WHERE display='show'";
        }
        $result = $connect -> query($sql);
        $row = $result -> fetch_assoc();
        ?>
     <div class="bookCardDiv">
     <?php
        // echo 'result';
        // var_dump($result);
        foreach ($result as $pr) {
            ?>
            <div class="bookCard">
                <div class="bookCardImgDiv">
                    <img src="image/<?php echo $pr['image']; ?>" alt="<?php echo $pr['image']; ?>" class="bookImg">
                </div>
                <div class="bookCardDescription">
                    <p><?php echo $pr['name']; ?></p>
                    <p>By <?php echo $pr['author']; ?></p>
                    <p><?php echo $pr['price']; ?>$</p>
                    <?php 
                        if (isset($_SESSION['login_user'])) {
                            ?>
                                <div>
                                    <a class="" href="./addToBasket.php?id=<?php echo $pr['id']?>">
                                        <i class="fa-solid fa-cart-shopping"></i>
                                    </a>
                                </div>
                            <?php
                        } else {
                            ?>
                                <a href="login.php">Login to buy</a>
                            <?php
                        }
                    ?>
                </div>
            </div>
            <?php
        }
        ?>
        </div>
</body>
>>>>>>> eb38ab8125a0fdf0bf4013ddc1a540cd5816213e
</html>