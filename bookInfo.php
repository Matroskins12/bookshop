<?php
    session_start();
    require "./database/connect.php";
    $idProduct = $_GET["id"];
    $sqlInfo = "SELECT * FROM products WHERE id = '$idProduct'";
    $row = $connect -> query($sqlInfo) -> fetch_assoc();
    // var_dump($row);
    $sql = "SELECT productid, SUM(productquantity) AS totalquantity
    FROM productbasket 
    -- INNER JOIN products ON productbasket.productid = products.id
    WHERE productid = '$idProduct'";
    // $result = $connect -> query($sql);
    // $rowQuantity = $result -> fetch_assoc();
    $rowQuantity = $connect -> query($sql) -> fetch_assoc();
    // var_dump($rowQuantity);
    $sqlComments = "SELECT * 
    FROM bookcomments
    -- INNER JOIN regusers ON user.id 
    WHERE productid=$idProduct";
    $resultComments = $connect -> query($sqlComments);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title><?php echo $row['name'];?></title>
</head>
<body>
    <?php require "./components/header.php";?>
    <div class="bookInfo">
                <div class="bookInfoImgDiv">
                    <img src="image/<?php echo $row['image']; ?>" alt="<?php echo $row['image']; ?>" class="bookImg">
                </div>
                <div class="bookCardDescription">
                    <p><span><?php echo $row['name'];?></span> by <?php echo $row['author']; ?> </p>
                    <p><?php echo $row['description']; ?></p>
                    <p><?php echo $row['price']; ?>$</p>
                    <p>Category:<?php echo $row['category']; ?></p>
                    <p>This book has been ordered <?php echo $rowQuantity['totalquantity'];?> times</p>
                    <?php 
                        if (isset($_SESSION['login_user'])) {
                            ?>
                                <div>
                                    <a class="addToBasketCart" href="./addToBasket.php?id=<?php echo $row['id']?>">
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
                if(isset($_SESSION['login_user'])) {
                    ?>
                    <form action="./logic/addcomment.php" method="post"> 
                <input type="hidden" name="productid" value="<?php echo $idProduct?>">              
                <label for="comment">Leave your comment here:</label>
                <textarea name="comment" id="comment" required></textarea>
                <label for="rate">Don't forget to rate this book</label>
                <select name="rate" id="rate" required>
                    <option value="0" selected>No rate</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
                <button>Send</button>
            </form>
                    <?php
                } else {
                    ?>  <a href="login.php">Login to leave a comemnt</a> <?php
                }
                while ($rowComment = $resultComments -> fetch_assoc()) {
                    var_dump($rowComment);
                    ?>
                    <div class="commentDiv">
                       <p class="commentUser"><?php echo $rowComment['username']?></p>
                       <p class="commentText"><?php echo $rowComment['comment']?></p>
                       <p class="commentRate"> Rating:<?php echo $rowComment['rating']?>/5</p>
                       <p class="commentTime"><?php echo $rowComment['commentime']?></p>
                    </div>
                    <?php
                }
            ?>
    <?php $connect -> close(); ?>
</body>
</html>