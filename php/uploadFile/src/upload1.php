<?php
if (isset($_POST['submit'])) {
    $file = $_FILES['file'];
    $fileExt = explode('.', $file['name']);
    $fileActualExt = strtolower(end($fileExt));
    $allowed = array('js', 'css', 'html', 'png', 'jpg', 'jpeg', 'pdf');
    if (in_array($fileActualExt, $allowed)) {
        if ($file['error'] === 0) {
            if ($file['size'] < 1000000) {
                $fileNameNew = uniqid('', true) . $file['name'];
                $fileDestination = 'Uploads/' . $fileNameNew;
                move_uploaded_file($file['tmp_name'], $fileDestination);
                header('Location: ./../index.php');
            } else {
                echo ('Your file is too big');
            }
        } else {
            echo ('There error uploading your file');
        }
    } else {
        echo ('You can not upload file of this type');
    }
}
