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
    $summaryAll = $_POST["summary"];
    // reguser
    $idUser = $_SESSION['id_user'];
    $sql = "SELECT DISTINCT products.name, products.price, products.author, products.image, productbasket.productquantity, productbasket.productid
    FROM productbasket 
    INNER JOIN products ON productbasket.productid = products.id
    WHERE productbasket.productuserid = '$idUser'";
    $result = $connect->query($sql);
    ?>
    <div class="receipt">
    <?php
    $x = 0;
    while ($row = $result->fetch_assoc()) {
        $x ++;
        $summary =  $row['price'] * $row['productquantity'];
        ?>
        <p><?php echo $x.')'.$row['name'].' = '.$row['price'].'$ X'.$row['productquantity'];?></p>
        <p>Summary: <?php echo $summary?>$</p>
        <?php
    }
    ?>
    <br>
    <p>Total: <?php echo $summaryAll?>$</p>
    <form action="orderPay.php" method="post">
        <input type="hidden" name="total" value="<?php echo $summaryAll ?>">
        <button type="submit">Buy Now!</button>
    </form>
    </div>
</body>
</html>