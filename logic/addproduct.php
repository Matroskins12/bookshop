<?php
    require "../database/connect.php";
    $name = $_POST["name"];
    $description = $_POST["description"];
    $price = $_POST["price"];
    $category = $_POST["category"];
    $author = $_POST["author"];
    $uploaddir = dirname(__FILE__, 2) . "/image";
    if (!file_exists($uploaddir)) {
      mkdir($uploaddir, 775, true);
      chmod($uploaddir, 775);
    }
    $uploadfile = $uploaddir . '/' . basename($_FILES['image']['name']);
    $uploadimage = basename($_FILES['image']['name']);
    if (!getimagesize($_FILES["image"]["tmp_name"])) {
      echo "Это не картинка...";
      die(); 
    }
    if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile)) {
      echo "Файл корректен и был успешно загружен.\n";
    } else {
      echo "Возможная атака с помощью файловой загрузки!\n";
    }
    var_dump($uploadfile);
    //
    $sql = "INSERT INTO products (name, description, price, category, image, author) VALUES('$name', '$description', '$price', '$category', '$uploadimage', '$author')";
    if ($connect->query($sql) === TRUE) {
        echo "New record created successfully";
        $message = "Congrats! Adding new book is successful";
        header("Location: ../admin/admin.php?message=$message");
      } else {
        echo "Error: " . $sql . "<br>" . $connect->error;
      }
      $connect -> close();
?>