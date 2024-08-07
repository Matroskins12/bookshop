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
    $sql = "SELECT DISTINCT products.name, products.price, products.author, products.image, productbasket.*
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
                    <p>ID:<?php echo $row['id']; ?></p>
                </div>
            </div>
        <?php
        }
        ?>
        </>
</body>
</html>