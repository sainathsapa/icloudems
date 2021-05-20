<?php
require('inc/nav.php');
error_reporting(E_ALL ^ E_WARNING);

if (isset($_POST['submit'])) {
    $uploadCSV_Name = $_FILES['uploadCSV']['name'];
    $uploadCSV_Size = $_FILES['uploadCSV']['size'];
    $uploadCSV_temp = $_FILES['uploadCSV']['tmp_name'];
    $uploadCSV_type = $_FILES['uploadCSV']['type'];

    if (!move_uploaded_file($uploadCSV_temp, "uploads/" . $uploadCSV_Name . ".csv")) {
        echo "error";
    } else {

        $qpAID = $_POST['qpid'];

        $fileOpenName = "uploads/" . $uploadCSV_Name . ".csv";
        $csvFile = fopen($fileOpenName, 'r');

        $rowData = array();
        $rowCountData = 0;
        while (!feof($csvFile)) {
            $ar = fgetcsv($csvFile);
            $rowData[$rowCountData] = $ar;

            $rowCountData++;
        }
        unlink($fileOpenName);

        $iterValue = 0;
        while ($iterValue < 4) {
            unset($rowData[0][$iterValue]);
            $iterValue++;
        }

        $iterValue = 1;

        while ($iterValue < sizeof($rowData) - 1) {
            $i = 0;
            while ($i < sizeof($rowData[0])) {
                $qpAID;
                $insertRollNUmber = $rowData[$iterValue][0];
                $insertName = $rowData[$iterValue][1];
                $insertClass = $rowData[$iterValue][2];
                $insertSubject = $rowData[$iterValue][3];
                $insertQNO = $rowData[0][$i + 4];
                $insertMarks = $rowData[$iterValue][$i + 4];
                $insetMarksQuery = "INSERT INTO `student_marks`(`qpid`, `rollNum`, `studentName`, `class`, `subject`, `qno`, `qmarks`) VALUES ('$qpAID','$insertRollNUmber','$insertName','$insertClass','$insertSubject','$insertQNO','$insertMarks')";

                $runMarksInsertQry = $conn->query($insetMarksQuery);
                if (!$runMarksInsertQry) {
                    echo "error" . mysqli_error($conn);
                }
                $i++;
            }


            $iterValue++;
        }

        echo "<script>alert('Marks Added Succesfully')</script>";
    }
}





if (!isset($_GET['qpid'])) {
    echo "check URL";
} else {
    $qpID = $_GET['qpid'];
    $class = $_GET['class'];
    $selectQPQuery = "SELECT `subject` FROM qpapers WHERE `qpid`='$qpID'";
    $runQPQry = $conn->query($selectQPQuery);
    $row = $runQPQry->fetch_assoc();
    $subject = $row['subject'];

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Import Marks | DSK Solutions</title>
    </head>

    <body class="container">
        <div class="border container card">
            <h2>Import Marks</h2>
            <hr>

            <div class="row col-md-12">
                <div class="col-md-6">
                    <b>Question Paper ID : </b>
                    <?php echo $qpID; ?>
                    <br>
                    <br>
                    <b>Class : </b>
                    <?php echo $class; ?>

                    <b> Subject : </b>
                    <?php echo $subject; ?>

                </div>
                <div class="col-md-6">
                    <form action="#" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="subject" value="<?php echo $subject; ?>">
                        <input type="hidden" name="class" value="<?php echo $class; ?>" />
                        <input type="hidden" name="qpid" value="<?php echo $qpID; ?>" />



                        <a href="csvmake?qpid=<?php echo $qpID; ?>&class=<?php echo $class; ?>"><button type="button" class="btn btn-info">Download List XLS</button></a>
                        <br>
                        <br>
                        <b>Upload File</b>
                        <input type="file" name="uploadCSV" accept=".csv" class="form-control-file" id="uploadCSV" onchange="return fileValidation();" required />
                        <br>

                </div>

            </div>
            <center><input class="btn btn-primary" type="submit" name="submit" value="Upload Marks"></center>
            </form>



            <br>
            <br>
        </div>
    </body>

    </html>
<?php } ?>

<script>
    function fileValidation() {
        var fileInput =
            document.getElementById('uploadCSV');

        var filePath = fileInput.value;

        var allowedExtensions =
            /(\.csv|)$/i;

        if (!allowedExtensions.exec(filePath)) {
            alert('Invalid file type');
            fileInput.value = '';
            return false;
        } else {

            return true;
        }
    }
</script>
<?php

function change_key($array, $old_key, $new_key)
{

    if (!array_key_exists($old_key, $array))
        return $array;

    $keys = array_keys($array);
    $keys[array_search($old_key, $keys)] = $new_key;

    return array_combine($keys, $array);
}
?>