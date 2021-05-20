<?php
require('inc/db.php');
require('inc/style.php');
require('inc/js.php');
//SELECT Query
$qpID = $_GET['qpid'];
$selectQuery = "SELECT * FROM qpapers WHERE `qpid`='$qpID'";
$runQry = $conn->query($selectQuery);

if (!$runQry) {
    echo "error" . mysqli_error($conn);
} else {


    $qnsNumber = 1;
    $flag = 0;
    $itervalue = 0;
    $rowCount = 0;
    $maxMarks_Fetched = 0;
    $sectionArrayForIterRate;
    while ($row = $runQry->fetch_assoc()) {

        $maxMarks_Fetched += $row['qnMax'];
        $sectionArrayForIterRate[$rowCount] = $row['section'];

        $rowForHeader = $row;
        $rowCount++;
    }


    // $rowForHeader = $runQry->fetch_assoc();
    $institutionName = "TEST Group of Institutions";
    $class = $rowForHeader['class'];
    $subjectName = $rowForHeader['subject'];
    $timeAlloted = $rowForHeader['time'];
    $dateOfExam = $rowForHeader['date'];
    $examType = $rowForHeader['examType'];
    $session = $rowForHeader['session'];
    $logoURL = "https://play-lh.googleusercontent.com/9_QKDE-rt3vbAn1VUqtfAv4t29-UItPCYdRbzieK07aUy1rcpM_BOMzh5Dtrob0MXg";

?>
    <style>
        th {
            font-weight: normal;
        }

        * {
            font-family: 'times new roman';
        }
    </style>
    <div class="container">
            <table class="container">
                <thead align="center">
                    <tr>
                        <th><img src="<?php echo $logoURL; ?>" height="150px" width="150px" /></th>
                        <th colspan="">
                            <h1><?php echo $institutionName; ?></h1>
                            <h4><?php echo $class; ?>-<?php echo $examType . " - Session : " . $session; ?> </h4>
                            <input type="hidden" name="classToInsert" value="<?php echo $class; ?>">
                            <input type="hidden" name="examTypetoInsert" value="<?php echo $examType; ?>">
                            <input type="hidden" name="sessionToInsert" value="<?php echo $_POST['session']; ?>">
                            <input type="hidden" name="usertoInsert" value="<?php echo $_POST['user']; ?>">





                        </th>
                    </tr>
                    <tr align="left">
                        <th><b>Subject :</b> <?php echo $subjectName; ?></th>
                        <input type="hidden" name="subjectToInsert" value="<?php echo $subjectName; ?>">

                        <th colspan="2"><b>CourseCode : </b> <?php echo $subjectName; ?></th>

                        <th colspan="2">
                            <b>Time :</b>
                            <?php

                           
                                echo $timeAlloted;
                            
                            ?>
                        </th>
                    </tr>
                    <tr align="left">
                        <th><b>Branch :</b><?php echo $class; ?></th>
                        <th colspan="2"><b>Max Marks :</b><?php echo $maxMarks_Fetched; ?></th>
                        <input type="hidden" name="maxMarkstoInsert" value="<?php echo $subjectName; ?>">



                        <th colspan="2"><b>Date :</b><?php echo $dateOfExam; ?></th>
                        <input type="hidden" name="datetoInsert" value="<?php echo $dateOfExam; ?>">



                    </tr>
                    <tr>
                        <th colspan="6">
                            <hr style="height:2px;border-width:0;color:gray;background-color:gray">
                        </th>

                    </tr>
                </thead>
            </table>

            <?php
            $sectionIterValue = 0;
            $sectionArray = array("A", "B", "C", "D");
            while ($sectionIterValue < sizeof(
                array_unique($sectionArrayForIterRate, SORT_STRING)
            )) {

            ?>

                <table class="container">

                    <thead align="center">
                        <tr>
                            <th colspan="5">
                                <h4>Section - <?php echo $sectionArray[$sectionIterValue]; ?></h4>


                            </th>
                        </tr>
                        <tr align="right">
                            <th class="font-weight-bold"></th>
                            <th class="font-weight-bold" align="right">MaxMarks</th>
                            <th class="font-weight-bold" align="right">COMAP</th>
                            <th class="font-weight-bold" align="right">Difficulty</th>

                        </tr>
                    </thead>
                    <tbody align="left">
                        <?php
                        $sectionIterValueForQns = 0;
                        $selectQuery = "SELECT * FROM qpapers WHERE `qpid`='$qpID'";
                        $runQry = $conn->query($selectQuery);

                        while ($sectionIterValueForQns < $rowCount) {

                            while ($NewRowFetchForSection = $runQry->fetch_assoc()) {


                                if ($NewRowFetchForSection['section'] == $sectionArray[$sectionIterValue]) {



                        ?>
                                    <input type="hidden" name="section[]" value="<?php echo $NewRowFetchForSection['section']; ?>" />

                                    <tr align="left">

                                        <input type="hidden" name="qnNumbertoInsert[]" value="<?php echo $qnsNumber; ?>" />

                                        <td><?php echo $qnsNumber . " )       . "; ?><?php echo $NewRowFetchForSection['qnDESC']; ?></td>
                                        <input type="hidden" name="questionstoInsert[]" value="<?php echo $NewRowFetchForSection['qnDESC']; ?>" />

                                        <td align="right">[ <?php echo $NewRowFetchForSection['qnMax']; ?> ]</td>
                                        <input type="hidden" name="maxMarkstoInsert[]" value="<?php echo $NewRowFetchForSection['qnMax']; ?>" />

                                        <td align="right">[<?php echo $NewRowFetchForSection['coMap']; ?>]</td>
                                        <input type="hidden" name="comapToInsert[]" value="<?php echo $NewRowFetchForSection['coMap']; ?>" />

                                        <td align="right">[<?php echo $NewRowFetchForSection['diffculty']; ?>]</td>
                                        <input type="hidden" name="difficultToInsert[]" value="<?php echo $NewRowFetchForSection['diffculty']; ?>" />


                                    </tr>
                        <?php $qnsNumber++;
                                }
                            }
                            $sectionIterValueForQns++;
                        } ?>
                    </tbody>
                </table>
                <br>

            <?php $sectionIterValue++;
            }
            ?>
            <center><input class="btn btn-primary" id="btn" type="submit" name="submit" value="Print" onclick="$('#btn').hide(); window.print(); "></center>

    </div>
<?php } ?>