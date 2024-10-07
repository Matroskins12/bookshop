<?php
session_start();
if ($_SESSION['role_user'] != 'admin') {
    header("Location: ../error/error404");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Admin Dashboard</title>
</head>

<body>
    <p>Add Product</p>
    <a href="../index.php">Home</a>
    <form class="productForm" action="../logic/addproduct.php" method="post" enctype="multipart/form-data">
        <label for="name">name</label>
        <input name="name" id="name" type="text" required>
        <label for="description">description</label>
        <!-- <input name="description" id="description" type="text" required> -->
        <textarea name="description" id="description" required></textarea>
        <label for="price">price</label>
        <input name="price" id="price" type="text" required>
        <label for="category">category</label>
        <select name="category" id="category" required>
            <option selected="false" disabled="disabled">Choose category</option>
            <option value="fantasy">Fantasy</option>
            <option value="novel">Novel</option>
            <option value="drama">Drama</option>
            <option value="comedy">Comedy</option>
            <option value="mystery">Mystery</option>
            <option value="adventure">Adventure</option>
        </select>
        <input type="file" name="image" accept="image/png, image/jpg, image/jpeg" required>
        <label for="author">author</label>
        <input name="author" id="author" type="text" required>
        <label for="display">Do you want to hide?</label>
        <input name="display" id="display" type="checkbox" value="hide">
        <button type="submit">Add book</button>
    </form>
    <div class="bookCardDiv">
        <?php
        require "../database/connect.php";
        $sql = "SELECT * FROM products";
        $result = $connect->query($sql);
        $row = $result->fetch_assoc();
        ?>
        <script>

        </script>
        <?php
        // echo 'result';
        // var_dump($result);
        foreach ($result as $pr) {
            ?>
            <div class="bookCard">
                <div class="bookCardImgDiv">
                    <img src="../image/<?php echo $pr['image']; ?>" alt="<?php echo $pr['image']; ?>" class="bookImg">
                </div>
                <div class="bookCardDescription">
                    <p><?php echo $pr['name']; ?></p>
                    <p>By <?php echo $pr['author']; ?></p>
                    <p><?php echo $pr['price']; ?>$</p>
                    <p>ID:<?php echo $pr['id']; ?></p>
                </div>
                <div class="adminButtons">
                    <a href="editProduct.php?id=<?php echo $pr['id'] ?>">Edit</a>
                    <button class="deleteButton">Delete</button>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
    <?php if (isset($_GET["message"])) { ?>
        <p class="webMessage"><?php echo $_GET["message"] ?></p>
    <?php } ?>
    <div class="userList">
        <?php
        if ($_POST) {
            $searchValue = $_POST['search'];
        }
        if (empty($searchValue)) {
            $sqlUser = "SELECT * FROM regusers";
            $resultUser = $connect->query($sqlUser);
            $rowUser = $resultUser->fetch_all();
        } else {
            $sqlUser = "SELECT * FROM regusers WHERE firstname='$searchValue' OR lastname='$searchValue'";
            $resultUser = $connect->query($sqlUser);
            $rowUser = $resultUser->fetch_all();
        }
        //  var_dump($rowUser);
        ?>
        <div class="userFind">
            <form action="" method="post">
                <label for="search">Type firstname or lastname</label><br>
                <input id="search" name="search" type="text">
                <button type="submit">Search</button>
            </form>
        </div>
        <table class="userTable">
        <tr>
            <th>Id</th>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Email</th>
            <th>Role</th>
        </tr>
        <?php
        foreach ($resultUser as $row) {
            // var_dump($row);
            ?>
                <tr>
                    <td><?php echo $row['id'] ?></td>
                    <td><?php echo $row['firstname'] ?></td>
                    <td><?php echo $row['lastname'] ?></td>
                    <td><?php echo $row['email'] ?></td>
                    <td><?php echo $row['userole'] ?></td>
                </tr>
            <?php
        }
        ?>
         </table>
    </div>
    <script src="../js/setTimeOut.js"></script>
    <script>
        let deleteTarget = document.querySelectorAll('.bookCard');
        let deleteButton = document.querySelectorAll('.deleteButton');
        console.log(deleteButton);
        deleteButton.forEach(e => {
            e.addEventListener("click", askDelete)
            function askDelete() {
                let answerDelete = window.confirm("Do you want to delete this book?");
                console.log(answerDelete);
                if (answerDelete) {
                    console.log('deleted');
                    window.location.href = 'deleteProduct.php?id=<?php echo $pr['id'] ?>'
                } else {
                    console.log('not deleted');
                }
            }
        });
    </script>
</body>

</html>