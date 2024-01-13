<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PHP-mvc</title>
    <link rel="stylesheet" href="/public/css/reset.css">
    <link rel="stylesheet" href="/public/css/base.css">
    <link rel="stylesheet" href="/public/css/master.css">
    <link rel="stylesheet" href="/public/css/same.css">
    <link rel="stylesheet" href="/public/css/responsive.css">
</head>

<body>
    <div class="wrapper">
        <header>
            <?php require_once "./mvc/views/blocks/header.php"; ?>
        </header>
        <main>
            <div class="flex">
                <?php require_once "./mvc/views/blocks/menuLeft.php"; ?>
                <?php require_once "./mvc/views/pages/" . $data['page'] . ".php"; ?>
            </div>
        </main>
        <footer>
            <?php require_once "./mvc/views/blocks/footer.php"; ?>
        </footer>
    </div>
</body>

</html>
