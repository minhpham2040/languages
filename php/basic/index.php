<?php
    include_one("./connections/connection.php");
    
    $con = connection();

    $sql = "SELECT * FROM products";
    $products = $con->query($sql) or die($con->error);
    $row = $products->fetch_assoc();
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
    <div class="productContainer">
        <div>
            <a href="./add.php">Add</a>
        </div>
        <div>
            <?php do{?>
            <div class="product">
                <h4 class="name"><?php echo($row['name']);?></h4>
                <span class="price"><?php echo($row['price'])?></span>
            </div>
            <?php }while($row->fetch_assoc());?>
        </div>
    </div>
</body>
</html>
