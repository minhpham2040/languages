<?php
class Upload
{
    public $file;
    public $fileName;
    public $fileTmpName;
    public $fileSize;
    public $fileError;
    public $fileType;

    public function __construct($file)
    {
        $this->file = $file;
        $this->fileName = $file['name'];
        $this->fileTmpName = $file['tmp_name'];
        $this->fileSize = $file['size'];
        $this->fileError = $file['error'];
        $this->fileType = $file['type'];
    }

    public function uploadFile()
    {
        $fileExt = explode('.', $this->fileName);
        $fileActualExt = strtolower(end($fileExt));
        $allowed = array('js', 'css', 'html', 'png', 'jpg', 'jpeg', 'pdf');
        if (in_array($fileActualExt, $allowed)) {
            if ($this->fileError === 0) {
                if ($this->fileSize < 1000000) {
                    $fileNameNew = uniqid('', true) . $this->fileName;
                    $fileDestination = 'src/uploads/' . $fileNameNew;
                    move_uploaded_file($this->fileTmpName, $fileDestination);
                    echo ('Location: index.php');
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
};
