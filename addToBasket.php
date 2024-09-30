<<<<<<< HEAD
<?php
    session_start()
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
    <?php require "./database/connect.php";
    $idUser = $_SESSION['id_user'];
    $idProduct = $_GET["id"];
    $sqlBasket = "SELECT * FROM productbasket WHERE productuserid = '$idUser' AND productid = '$idProduct'";
    $resultBasket = $connect -> query($sqlBasket);
    if ($resultBasket -> num_rows > 0) {
        $message = "This book had already been added";
        header("Location: ./shop.php?message=$message"); 
    } else {
        $sqlInsert = "INSERT INTO productbasket (productid, productquantity, productuserid) VALUES('$idProduct', '1', '$idUser')";
        if ($connect->query($sqlInsert) === TRUE) {
            echo "New book added to your basket";
            $message = "Congrats! Adding new book is successful";
            header("Location: ./shop.php?message=$message");
          } else {
            echo "Error: " . $sqlInsert . "<br>" . $connect->error;
          }
    }
    $sqlSelect = "SELECT * FROM products WHERE id=$idProduct";
    $result = $connect -> query($sqlSelect);
    $row = $result -> fetch_assoc();
      $connect -> close();
    ?>
    <div class="bookCard">
                <div class="bookCardImgDiv">
                    <img src="image/<?php echo $row['image']; ?>" alt="<?php echo $row['image']; ?>" class="bookImg">
                </div>
                <div class="bookCardDescription">
                    <p><?php echo $row['name']; ?></p>
                    <p>By <?php echo $row['author']; ?></p>
                    <p><?php echo $row['price']; ?>$</p>
                </div>
            </div>
</body>
=======
<?php
    session_start()
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
    <?php require "./database/connect.php";
    $iduser = $_SESSION['id_user'];
    $idProduct = $_GET["id"];
    $sqlSelect = "SELECT * FROM products WHERE id=$idProduct";
    $result = $connect -> query($sqlSelect);
    $row = $result -> fetch_assoc();
    $sqlAdd = "INSERT INTO productbasket (productid, productquantity, productuserid) VALUES('$idProduct', '1', '$iduser')";
    if ($connect->query($sqlAdd) === TRUE) {
        echo "New record created successfully";
        // $message = "Congrats! Adding new book is successful";
        // header("Location: ../admin/admin.php?message=$message");
      } else {
        echo "Error: " . $sqlAdd . "<br>" . $connect->error;
      }
      $connect -> close();
    ?>
    <div class="bookCard">
                <div class="bookCardImgDiv">
                    <img src="image/<?php echo $row['image']; ?>" alt="<?php echo $row['image']; ?>" class="bookImg">
                </div>
                <div class="bookCardDescription">
                    <p><?php echo $row['name']; ?></p>
                    <p>By <?php echo $row['author']; ?></p>
                    <p><?php echo $row['price']; ?>$</p>
                </div>
            </div>
</body>
>>>>>>> eb38ab8125a0fdf0bf4013ddc1a540cd5816213e
</html>