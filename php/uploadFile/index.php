<?php
include_once('src/upload.php');

if (isset($_POST['submit'])) {
    $upload = new Upload($_FILES['file']);
    $upload->uploadFile();
}
?>
<html>

<head>
    <title>PHP Starter</title>
</head>

<body>
    <h1>PHP Starter in hi test CodeSandbox</h1>
    <form action="" method="post" enctype="multipart/form-data">
      <h3>Upload file with file class(upload.php)</h3>
        Select image to upload:
        <input type="file" name="file" id="file">
        <input type="submit" value="Upload Image" name="submit">
    </form>
  
    <form action="src/upload1.php" method="post" enctype="multipart/form-data">
      <h3>Upload file with file normal(upload1.php)</h3>
        Select image to upload:
        <input type="file" name="file" id="file">
        <input type="submit" value="Upload Image" name="submit">
    </form>
</body>

</html>
