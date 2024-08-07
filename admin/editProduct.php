<?php
$idProduct = $_GET["id"];
require "../database/connect.php";
$sqlSelect = "SELECT * FROM products WHERE id=$idProduct";
$result = $connect->query($sqlSelect);
$row = $result->fetch_assoc();
// редактирование файла
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$name = $_POST["name"];
$description = $_POST["description"];
$price = $_POST["price"];
$category = $_POST["category"];
$author = $_POST["author"];
// $uploadfile = $uploaddir . '/' . basename($_FILES['image']['name']);
// $uploadimage = basename($_FILES['image']['name']);
// if (!getimagesize($_FILES["image"]["tmp_name"])) {
//     echo "Это не картинка...";
//     die();
// }
// if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile)) {
//     echo "Файл корректен и был успешно загружен.\n";
// } else {
//     echo "Возможная атака с помощью файловой загрузки!\n";
// }
    $sqlUpdate = "UPDATE products SET name='$name', description='$description', price='$price', category='$category', author='$author' WHERE id=$idProduct";
    if ($connect->query($sqlUpdate) === TRUE) {
    echo "New record created successfully";
    $message = "Congrats! Editing book is successful";
    header("Location: ../admin/admin.php?message=$message");
  } else {
    echo "Error: " . $sql . "<br>" . $connect->error;
  }
}
  $connect -> close();
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <form class="productForm" method="post" enctype="multipart/form-data">
        <label for="name">name</label>
        <input value="<?php echo $row['name'] ?>" name="name" id="name" type="text" required>
        <label for="description">description</label>
        <!-- <input name="description" id="description" type="text" required> -->
        <textarea name="description" id="description" required><?php echo $row['description'] ?></textarea>
        <label for="price">price</label>
        <input value="<?php echo $row['price'] ?>" name="price" id="price" type="text" required>
        <label for="category">category</label>
        <select name="category" id="category" required>
            <option selected disabled value="<?php echo $row['category'] ?>"> Current
                category:<?php echo $row['category'] ?></option>
            <option value="fantasy">Fantasy</option>
            <option value="novel">Novel</option>
            <option value="drama">Drama</option>
            <option value="comedy">Comedy</option>
            <option value="mystery">Mystery</option>
            <option value="adventure">Adventure</option>
        </select>
        <input type="file" name="image" accept="image/png, image/jpg, image/jpeg" required>
        <label for="author">author</label>
        <input value="<?php echo $row['author'] ?>" name="author" id="author" type="text" required>
        <button type="submit">Edit book</button>
    </form>
</body>

</html>