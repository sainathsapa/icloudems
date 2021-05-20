<?php
require('inc/db.php');

$qpID = $_GET['qpid'];
$selectQPQuery = "SELECT * FROM qpapers WHERE `qpid`='$qpID'";
$runQPQry = $conn->query($selectQPQuery);
$dataTOInsertInFile = array();

if (!$runQPQry) {
    echo "error" . mysqli_error($conn);
} else {

    $rowCount = 0;
    $maxMarks_Fetched;
    while ($row = $runQPQry->fetch_assoc()) {

        $questionNumbers_Fetched[$rowCount] = $row['qnNumber'];
        $maxMarks_Fetched[$rowCount] = $row['qnMax'];
        $rowForHeader = $row;
        $subject = $row['subject'];
        $rowCount++;
    }
    $class = $_GET['class'];
    $selectSTDNTQuery = "SELECT * FROM stdnts WHERE `class`='$class'";
    $runSTDNTQry = $conn->query($selectSTDNTQuery);
    if (!$runSTDNTQry) {
        echo "error" . mysqli_error($conn);
    } else {
        $rowCount = 0;

        while ($stdntRow = $runSTDNTQry->fetch_assoc()) {

            $dataTOInsertInFile[$rowCount]['Roll Number'] = $stdntRow['rollNum'];
            $dataTOInsertInFile[$rowCount]['Student Name'] = $stdntRow['sdntName'];
            $dataTOInsertInFile[$rowCount]['Class'] = $class;
            $dataTOInsertInFile[$rowCount]['Subject'] = $subject;


            $newIterValue = 0;
            while ($newIterValue < sizeof($questionNumbers_Fetched)) {
                $qnsNumberToBeInserted = "Q" . $questionNumbers_Fetched[$newIterValue];
                $dataTOInsertInFile[$rowCount][$qnsNumberToBeInserted] = '';
                $newIterValue++;
            }

            $rowCount++;
        }
    }
}

?>


<?php
$fileName = "temp/" . $subject . $class . "QP.csv";
$new_csv = fopen($fileName, 'w');
if (!$new_csv) {
    echo "error";
}
$i = 0;
fputcsv($new_csv, array_keys($dataTOInsertInFile[0]), ",", '"');

while ($i < sizeof($dataTOInsertInFile)) {
    fputcsv($new_csv, $dataTOInsertInFile[$i], ",", '"');

    $i++;
}


if (fclose($new_csv)) {
    header("Location: downloadcsv?name=$fileName");
}



exit;
