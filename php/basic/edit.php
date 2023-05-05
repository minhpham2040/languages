<?php
  include_one("connections/connection.php");

  $con = connection();

  if(isset($_GET['id'])){
    
    $id = $_GET['id'];
    
    $sql = "SELECT * FROM products WHERE id = '$id'";
    $row = $con->query($sql) or die($con->error);
  }

  if(isset($_POST['update'])){
    
    $name = $_POST['name'];
    $price = $_POST['price'];
    
    $sql = "UPDATE products SET name = '$name', price = '$price' WHERE id = '$id'";
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
    <title>PHP Basic</title>
</head>
<body>
  <div>
    <form action="" method="post">
        <div class="formGroup">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" value="<?php echo($row['name']);?>">
        </div>
        <div class="formGroup">
            <label for="price">Price</label>
            <input type="text" name="price" id="price" value="<?php echo($row['price']);?>">
        </div>
        <input type="submit" name="update" value="Update">
    </form>
  </div>
</body>
</html>
