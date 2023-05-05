<?php
  function connection() {
    $host = "localhost";
    $username = "root";
    $password = "123";
    $database = "shopee";
    
    $con = new mysqli($host, $username, $password, $database);
    
    if(isset($con->connect_error)){
      echo($con->connect_error);
    }else{
      return $con;
    };
  };
?>
