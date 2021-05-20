<?php

// Connection VAR


$server = "127.0.0.1";
$user = "root";
$pass = "";
$db = "icloudems";


$conn = new mysqli($server, $user, $pass, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection Faild: " . $conn->connect_error);
  }

 

?>