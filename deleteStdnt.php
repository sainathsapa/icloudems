<?php
require('inc/nav.php');
$id = $_GET['id'];

$deleteQueyr = "DELETE  FROM `stdnts` WHERE `id`=$id";;
$runQRY = $conn->query($deleteQueyr);

if ($runQRY) {
    echo "<script>window.location = 'view_stdnts?sucDel=$id';</script>";
    exit();
} else {
    echo "Error" . mysqli_error($conn);
    exit();
}
