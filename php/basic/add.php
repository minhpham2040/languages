<?php
    include_one("./connections/connection.php");

    $con = connection();

    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $price = $_POST['price'];

        $sql = "INSERT INTO `products`(`name`, `price`) VALUE('$name', '$price')";
        $con->query($sql) or die($con->error);
        echo("Location: index.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./css/style.css">
    <title>PHP Basic</title>
</head>
<body>
  <div>
    <form action="" method="post">
        <div class="formGroup">
            <label for="name">Name</label>
            <input type="text" name="name" id="name">
        </div>
        <div class="formGroup">
            <label for="price">Price</label>
            <input type="text" name="price" id="price">
        </div>
        <input type="submit" name="submit" value="Add Product">
    </form>
  </div>
</body>
</html>
