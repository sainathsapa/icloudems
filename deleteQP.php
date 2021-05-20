<?php
require('inc/nav.php');
$id = $_GET['id'];

$deleteQueyr = "DELETE  FROM `qpapers` WHERE `qpid`='$id'";;
$runQRY = $conn->query($deleteQueyr);

if ($runQRY) {
    echo "<script>window.location = 'view_qp?sucDel=$id';</script>";
    exit();
} else {
    echo "Error" . mysqli_error($conn);
    exit();
}
