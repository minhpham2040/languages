<?php
  include_one("connections/connection.php");

  $con = connection();

  if(isset($_GET['id'])){
    
        $id = $_GET['id'];

        $sql = "SELECT * FROM products WHERE id = '$id'";
        $row = $con->query($sql) or die($con->error);
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Product</title>
</head>
<body>
  <div>
    <div>
        <a href="./edit.php?id=<?php echo($row['id']);?>">Edit</a>
        <a href="./delete.php?id=<?php echo($row['id']);?>">Delete</a>
    </div>
    <div class="product">
        <h4 class="name"><?php echo($row['name']);?></h4>
        <span class="price"><?php echo($row['price'])?></span>
    </div>
  </div>
</body>
</html>  
