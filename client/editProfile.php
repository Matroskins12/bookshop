<?php
    session_start();
    require "../database/connect.php"; 
    $editId = $_POST['editId'];
    $sql = "SELECT * FROM regusers WHERE id=$editId";
    $result = $connect -> query($sql);
    $row = $result -> fetch_assoc();
    var_dump($row);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Edit Profile</title>
</head>
<body>
    <a href="../index.php">Home</a> 
    <p></p>
    <a href="client.php">Return to profile</a> 
    <form action="../logic/saveEdit.php" method="post">
        <p>Your firstname</p>
        <input name="firstname" type="text" value="<?php echo $row['firstname']; ?>">
        <p>Your lastname</p>
        <input name="lastname" type="text" value="<?php echo $row['lastname']; ?>">
        <p>Your email</p>
        <input name="email" type="text" value="<?php echo $row['email']; ?>">
        <button type="submit">Save edit</button>
    </form>
</body>
</html>