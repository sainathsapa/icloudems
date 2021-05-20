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
    $id = $_POST['id'];

    $countQRY = "SELECT COUNT(id) as test FROM stdnts";
    $runQry = $conn->query($countQRY);
    $count = $runQry->fetch_assoc();

    $rollNUm = "icloud" . trim($class) . $count['test'];

    $insetQuery = "UPDATE `stdnts` SET `sdntName`='$studentName', `stdntFName`='$fName', `class`='$class', `gender`='$gender', `mobile`='$mobile', `address`='$address' WHERE `id`='$id'";

    if (!$runQry = $conn->query($insetQuery)) {
        echo "error" . mysqli_error($conn);
    } else {
        echo "<script> alert('Student " . $studentName . " Updated Succesfully');</script>";
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
        <?php
        $getID = $_GET['id'];
        $selectDataQry = "SELECT * FROM stdnts WHERE `id`='$getID'";
        $runQRY = $conn->query($selectDataQry);
        $rowData = $runQRY->fetch_assoc();

        ?>
        <form action="#" method="post">
            <div class="row col-md-12">
                <div class="col-md-4">
                    <b>Student Name :</b>
                    <input name="stdntname" type="text" class="form-control" value="<?php echo $rowData['sdntName']; ?>" required />
                    <input name="id" type="hidden" value="<?php echo $_GET['id']; ?>" required />

                </div>
                <div class="col-md-4">
                    <b>Father Name :</b>
                    <input name="fatherName" type="text" class="form-control" value="<?php echo $rowData['stdntFName']; ?>" required />

                </div>
                <div class="col-md-4">
                    <script>
                        $("#class").val(<?php echo $rowData['class']; ?>);
                    </script>
                    <b>Class :</b>
                    <select class="form-control form-select" id="class" name="class" required>
                        <option value="TEST CLASS 1" <?php
                                                        if ($rowData['class'] == "TEST CLASS 1") {
                                                            echo "selected";
                                                        }
                                                        ?>>TEST CLASS 1</option>
                        <option value="TEST CLASS 2" <?php
                                                        if ($rowData['class'] == "TEST CLASS 2") {
                                                            echo "selected";
                                                        }
                                                        ?>>TEST CLASS 2</option>
                        <option value="TEST CLASS 3" <?php
                                                        if ($rowData['class'] == "TEST CLASS 3") {
                                                            echo "selected";
                                                        }
                                                        ?>>TEST CLASS 3</option>
                        <option value="TEST CLASS 4" <?php
                                                        if ($rowData['class'] == "TEST CLASS 4") {
                                                            echo "selected";
                                                        }
                                                        ?>>TEST CLASS 4</option>
                    </select>
                </div>


            </div>
            <div class="row col-md-12">
                <div class="col-md-8">
                    <b>Address :</b>
                    <textarea class="form-control" name="address" required><?php echo $rowData['address']; ?></textarea>
                </div>
                <div class="row col-md-4">

                    <div class="col-md-6">
                        <b>Gender :</b>
                        <select class="form-control form-select" id="gender" name="gender" required>

                            <option value="Male" <?php
                                                    if ($rowData['gender'] == "Male") {
                                                        echo "selected";
                                                    }
                                                    ?>>Male</option>
                            <option value="Female" <?php
                                                    if ($rowData['gender'] == "Female") {
                                                        echo "selected";
                                                    }
                                                    ?>>Female</option>

                        </select>
                    </div>
                    <div class="col-md-6">
                        <b>Mobile Num :</b>
                        <input name="mobile" type="tel" class="form-control" value="<?php echo $rowData['mobile']; ?>" required />


                    </div>
                </div>
            </div>
            <br>
            <input class="btn btn-primary form-btn" type="submit" name="submit" value="Add" />
        </form>



    </div>
</body>

</html>