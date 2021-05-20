<?php
require('inc/db.php');
require('inc/style.php');
require('inc/js.php');

if (!isset($_POST['submit'])) {
    echo "Check the URL";
} else {

    $qnsNumber = 1;
    $flag = 0;
    $itervalue = 0;
    $maxMarks_Fetched = 0;
    while ($itervalue < sizeof($_POST['qns'])) {
        if ($_POST['maxMarks'][$itervalue] == "") {
            echo "<script>alert('Add Max Marks to Each Question');</script>";
            $flag = 1;

            header("Location: mk_qp?err=max");
            exit();
        } else {
            $maxMarks_Fetched += $_POST['maxMarks'][$itervalue];
        }

        $itervalue++;
    }

    $institutionName = "TEST Group of Institutions";
    $class = $_POST['class'];
    $subjectName = $_POST['subject'];
    $timeAlloted = $_POST['allotedTime'];
    $dateOfExam = $_POST['examDate'];
    $sectinNumberValue = $_POST['sections'];
    $examType = $_POST['examType'];
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
    <div class="container border">
        <form action="finalInsert" method="post">
            <table class="container">
                <thead align="center">
                    <tr>
                        <th><img src="<?php echo $logoURL; ?>" height="150px" width="150px" /></th>
                        <th colspan="">
                            <h1><?php echo $institutionName; ?></h1>
                            <h4><?php echo $class; ?>-<?php echo $examType . " - Session : " . $_POST['session']; ?> </h4>
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

                            if ($timeAlloted <= 60) {
                                echo $timeAlloted . "Min(s)";
                            } elseif ($timeAlloted > 60) {
                                $val = $timeAlloted / 60;
                                echo round($val, 2, PHP_ROUND_HALF_UP) . " Hrs";
                                echo '<input type="hidden" name="timeToInsert" value="' . round($val, 2, PHP_ROUND_HALF_UP) . ' Hrs">';
                            }
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
            while ($sectionIterValue < $sectinNumberValue) {

            ?>

                <table class="container">

                    <thead align="center">
                        <tr>
                            <th colspan="5">
                                <h4>Section - <?php echo $sectionArray[$sectionIterValue] ?></h4>


                            </th>
                        </tr>
                        <tr align="left">
                            <th class="font-weight-bold">Question No</th>
                            <th class="font-weight-bold"></th>
                            <th class="font-weight-bold">MaxMarks</th>
                            <th class="font-weight-bold">COMAP</th>
                            <th class="font-weight-bold">Difficulty</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sectionIterValueForQns = 0;
                        while ($sectionIterValueForQns < sizeof($_POST['qns'])) {

                            if ($_POST['section'][$sectionIterValueForQns] == $sectionArray[$sectionIterValue]) {



                        ?>
                                <input type="hidden" name="section[]" value="<?php echo $_POST['section'][$sectionIterValueForQns]; ?>" />

                                <tr>
                                    <td><?php echo $qnsNumber . " )"; ?></td>

                                    <input type="hidden" name="qnNumbertoInsert[]" value="<?php echo $qnsNumber; ?>" />

                                    <td><?php echo $_POST['qns'][$sectionIterValueForQns]; ?></td>
                                    <input type="hidden" name="questionstoInsert[]" value="<?php echo $_POST['qns'][$sectionIterValueForQns]; ?>" />

                                    <td>[ <?php echo $_POST['maxMarks'][$sectionIterValueForQns]; ?> ]</td>
                                    <input type="hidden" name="maxMarkstoInsert[]" value="<?php echo $_POST['maxMarks'][$sectionIterValueForQns]; ?>" />

                                    <td>[<?php echo $_POST['COMAP'][$sectionIterValueForQns]; ?>]</td>
                                    <input type="hidden" name="comapToInsert[]" value="<?php echo $_POST['COMAP'][$sectionIterValueForQns]; ?>" />

                                    <td>[<?php echo $_POST['diffcult'][$sectionIterValueForQns]; ?>]</td>
                                    <input type="hidden" name="difficultToInsert[]" value="<?php echo $_POST['diffcult'][$sectionIterValueForQns]; ?>" />


                                </tr>
                        <?php $qnsNumber++;
                            }
                            $sectionIterValueForQns++;
                        } ?>
                    </tbody>
                </table>
                <br>

            <?php $sectionIterValue++;
            }
            ?>
            <center><input class="btn btn-primary" type="submit" name="submit" value="Add Question Paper"></center>

        </form>
    </div>
<?php } ?>