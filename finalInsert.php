<?php

if (!isset($_POST['submit'])) {
    echo "check URL";
} else {




    require('inc/db.php');
    $usertoinsert = $_POST['usertoInsert'];
    $class = $_POST['classToInsert'];
    $examType = $_POST['examTypetoInsert'];
    $sessionToinsert = $_POST['sessionToInsert'];
    $subjectToInsert = $_POST['subjectToInsert'];
    $timeToInsert = $_POST['timeToInsert'];
    $dateofExamtoInsert = $_POST['datetoInsert'];


    $qnNumber = $_POST['qnNumbertoInsert'];
    $qndesc = $_POST['questionstoInsert'];
    $qnSection = $_POST['section'];
    $qnMaxMarks = $_POST['maxMarkstoInsert'];
    $comapToInsert = $_POST['comapToInsert'];
    $difficultytoInsert = $_POST['difficultToInsert'];
    $iterValue = 0;
    $qpid=$subjectToInsert.$sessionToinsert.$dateofExamtoInsert;
    while ($iterValue < sizeof($qnNumber)) {
        $inertQuery = "INSERT INTO `qpapers`(`qpid`,`userName`, `class`, `examType`, `session`, `subject`, `time`, `date`, `section`, `qnNumber`, `qnDESC`, `qnMax`, `coMap`, `diffculty`) VALUES ('$qpid','$usertoinsert','$class','$examType','$sessionToinsert','$subjectToInsert','$timeToInsert','$dateofExamtoInsert','$qnSection[$iterValue]','$qnNumber[$iterValue]','$qndesc[$iterValue]','$qnMaxMarks[$iterValue]','$comapToInsert[$iterValue]','$difficultytoInsert[$iterValue]')";

        $runSQL_Query = $conn->query($inertQuery);
        


        $iterValue++;
    }
    if (!$runSQL_Query) {
        echo "error" . mysqli_error($conn);
    }
    else
    {
        header("Location: index?succ=qp_added");
        exit();

    }

}
