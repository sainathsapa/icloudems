<?php
require('inc/nav.php');
if (isset($_POST['submit'])) {
    //GetVars
    $studentName = $_POST['stdntname'];
    $fName = $_POST['fatherName'];
    $class = $_POST['class'];
    $address = $_POST['address'];
    $gender = $_POST['gender'];
    $mobile = $_POST['mobile'];

    $countQRY = "SELECT COUNT(id) as test FROM stdnts";
    $runQry = $conn->query($countQRY);
    $count = $runQry->fetch_assoc();

    $rollNUm = "icloud" . trim($class) .$count['test'];

    $insetQuery = "INSERT INTO `stdnts` (`rollNum`, `sdntName`, `stdntFName`, `class`, `gender`, `mobile`, `address`) VALUES ('$rollNUm', '$studentName', '$fName', '$class', '$gender', '$mobile', '$address');";

    if (!$runQry = $conn->query($insetQuery)) {
        echo "error" . mysqli_error($conn);
    } else {
        echo "<script> alert('Student " . $studentName . "added Succesfully');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student | DSK Solutions</title>
</head>

<body class="container">
    <div class="border container card">
        <h2>Add Student</h2>
        <hr>
        <form action="#" method="post">
            <div class="row col-md-12">
                <div class="col-md-4">
                    <b>Student Name :</b>
                    <input name="stdntname" type="text" class="form-control" placeholder="Student Name" required />
                </div>
                <div class="col-md-4">
                    <b>Father Name :</b>
                    <input name="fatherName" type="text" class="form-control" placeholder="Father Name" required />

                </div>
                <div class="col-md-4">
                    <b>Class :</b>
                    <select class="form-control form-select" id="class" name="class" required>
                        <option value="TEST CLASS 1">TEST CLASS 1</option>
                        <option value="TEST CLASS 2">TEST CLASS 2</option>
                        <option value="TEST CLASS 3">TEST CLASS 3</option>
                        <option value="TEST CLASS 4">TEST CLASS 4</option>
                    </select>
                </div>


            </div>
            <div class="row col-md-12">
                <div class="col-md-8">
                    <b>Address :</b>
                    <textarea class="form-control" name="address" required></textarea>
                </div>
                <div class="row col-md-4">
                    <div class="col-md-6">
                        <b>Gender :</b>
                        <select class="form-control form-select" id="gender" name="gender" required>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>

                        </select>
                    </div>
                    <div class="col-md-6">
                        <b>Mobile Num :</b>
                        <input name="mobile" type="tel" class="form-control" placeholder="91" required />


                    </div>
                </div>
            </div>
            <br>
            <input class="btn btn-primary form-btn" type="submit" name="submit" value="Add" />
        </form>



    </div>
</body>

</html>