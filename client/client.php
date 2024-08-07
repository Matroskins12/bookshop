<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Profile</title>
</head>
<body>
    <?php require "../database/connect.php"; ?>
    <?php
    // reguser
     $idUser = $_SESSION['id_user'];
     $sqlUser = "SELECT * FROM regusers WHERE id='$idUser'";
     $resultUser = $connect -> query($sqlUser);
     $rowUser = $resultUser -> fetch_assoc();
    // productbasket + products
     $sql = "SELECT DISTINCT products.*
     FROM products
     INNER JOIN productbasket ON products.id=productbasket.productid
     WHERE productuserid='$idUser'";
     $result = $connect -> query($sql);
    //  $trueResult = $result -> fetch_all();
    //  var_dump($result);
    ?>
    <a href="../index.php">Home</a> 
    <p>Your Profile</p>
    <div class="userProfile">
        <p>Your firstname is <?php echo $rowUser['firstname'];?></p>
        <p>Your lastname is <?php echo $rowUser['lastname'];?></p>
        <p>Your Email is <?php echo $rowUser['email'];?></p>
    </div>
    <!-- <a href="editProfile.php?id=<?//php echo $_SESSION['id_user'] ?>">Edit you profile</a> -->
     <form action="editProfile.php" method="post">
        <input name="editId" type="hidden" value="<?php echo $_SESSION['id_user'] ?>">
        <button type="submit">Edit your profile</button>
     </form>
    <p>Your basket</p>
    <div class="bookCardDiv">
    <?php
    while ($row = $result -> fetch_assoc())  {
        // var_dump($row);
        ?>
            <div class="bookCard">
                <div class="bookCardImgDiv">
                    <img src="../image/<?php echo $row['image']; ?>" alt="<?php echo $row['image']; ?>" class="bookImg">
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
        </div>
</body>
</html>