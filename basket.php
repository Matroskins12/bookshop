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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
</head>

<body>
    <?php require "./components/header.php" ?>
    <?php require "./database/connect.php"; ?>
    <?php
    // reguser
    $idUser = $_SESSION['id_user'];
    // productbasket + products
    $sql = "SELECT DISTINCT products.name, products.price, products.author, products.image, productbasket.productquantity, productbasket.productid
    FROM productbasket 
    INNER JOIN products ON productbasket.productid = products.id
    WHERE productbasket.productuserid = '$idUser' AND productbasket.status='show'";
    $result = $connect->query($sql);
    // $sqlQuantity = "SELECT productquantity FROM productbasket WHERE productbasket.productuserid = '$idUser'";
    var_dump($result);
    ?>
    <p>Your basket</p>
    <div class="bookCardDiv">
        <?php
        $summaryAll = 0; 
        while ($row = $result->fetch_assoc()) {
            $summaryOne = $row['price'] * $row['productquantity'];
            $summaryAll += $row['price'] * $row['productquantity'];
            ?>
            <div class="bookCard">
                <div class="bookCardImgDiv">
                    <img src="./image/<?php echo $row['image']; ?>" alt="<?php echo $row['image']; ?>" class="bookImg">
                </div>
                <div class="bookCardDescription">
                    <p><?php echo $row['name']; ?></p>
                    <p>By <?php echo $row['author']; ?></p>
                    <p><?php echo $row['price']; ?>$</p>
                    <p>Count:<?php echo $row['productquantity'] ?></p>
                    <p>Summary: <?php echo $summaryOne;?>$</p>
                </div>
                <div class="editButtonsDiv">
                    <form action="./logic/quantityUpdate.php" method="post">
                        <input type="hidden" name="plus" value="<?php echo $row['productid'] ?>">
                        <button class="buttons plusButton">+</button>
                    </form>
                    <form action="./logic/quantityUpdate.php" method="post">
                        <input type="hidden" name="minus" value="<?php echo $row['productid'] ?>">
                        <input type="hidden" name="minquantity" value="<?php echo $row['productquantity'] ?>">
                        <button class="buttons minusButton">-</button>
                    </form>
                    <form action="./logic/quantityUpdate.php" method="post">
                        <input type="hidden" name="delete" value="<?php echo $row['productid'] ?>">
                        <button class="buttons deleteButton"><i class="fa-solid fa-trash-can"></i></button>
                    </form>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
        <div class="totalSumm">
            <p>Total : <?php echo $summaryAll ?>$</p>
        </div>
        <form action="bill.php" method="post">
            <input type="hidden" name="summary" value="<?php echo $summaryAll ?>">
            <button type="submit">View your order</button>
        </form>
        <?php if (isset($_GET["message"])) { ?>
            <p class="webMessage"><?php echo $_GET["message"] ?></p>
        <?php } ?>
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
    <?php require "./database/connect.php"; ?>
    <?php
    // reguser
     $idUser = $_SESSION['id_user'];
    // productbasket + products
    $sql = "SELECT products.name, products.price, products.author, products.image, productbasket.* 
    FROM productbasket 
    INNER JOIN products ON productbasket.productid = products.id
    WHERE productbasket.productuserid = '$idUser'";
     $result = $connect -> query($sql);
     var_dump($result);
    ?>
    <p>Your basket</p>
    <div class="bookCardDiv">
    <?php
    while ($row = $result -> fetch_assoc())  {
        ?> 
          <div class="bookCard">
                <div class="bookCardImgDiv">
                    <img src="./image/<?php echo $row['image']; ?>" alt="<?php echo $row['image']; ?>" class="bookImg">
                </div>
                <div class="bookCardDescription">
                    <p><?php echo $row['name']; ?></p>
                    <p>By <?php echo $row['author']; ?></p>
                    <p><?php echo $row['price']; ?>$</p>
                </div>
            </div>
        <?php
        }
        ?>
        </>
</body>
>>>>>>> eb38ab8125a0fdf0bf4013ddc1a540cd5816213e
</html>