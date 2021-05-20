<?php

require('inc/nav.php');

// $subject = "test";
$userID = "test_user_001";

if (isset($_POST['submit'])) {

    $qns = $_POST['qns'];
    $subject = $_POST['subject'];
    if ($subject == 'select') {

        header("Location: add_qns.php?err=subject");
        exit();
    } else {
        if (strlen($qns) < 5) {
            echo "<script>alert('Added Well Formed Question must greater then 5 char');</script>";
        } else {
            // preparing qry to insert qns

            $insertQuery = "INSERT INTO qns_bank (`subject`,`qns`,`added_by`) VALUES('$subject','$qns','$userID')";
            $runQuery = $conn->query($insertQuery);
            if ($runQuery) {
                echo "<script>alert('Question added');</script>";
            }
        }
    }
}


if (isset($_GET)) {
    if (isset($_GET['updated'])) {
        $str_temp_update = "Question ID " . $_GET['updated'] . " has Updated";
        echo "<script>alert('$str_temp_update');</script>";
    }
    if (isset($_GET['err'])) {
        if ($_GET['err'] == 'subject') {
            $str_temp_err = "Please Select Subject First";

            echo "<script>alert('$str_temp_err');</script>";
        }
    }

    if (isset($_GET['deleted'])) {
        $str_temp_update = "Question ID " . $_GET['deleted'] . " has Deleted";
        echo "<script>alert('$str_temp_update');</script>";
    }
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Questions | iCloudEMS</title>
</head>

<body class="container">

    <div class="container border card">
    <h2>Add Questions</h2>
        <hr>

       
        <form class="form" action="#" method="post">


            <b> User </b>
            <input type="text" name="user" id="user" readonly class="form-control col-md-2" value="<?php echo $userID; ?>">

            <b> Subject </b>
            <!-- <input type="text" name="subject" id="subject" readonly class="form-control col-md-2" value="//<?php //echo $subject; 
                                                                                                                ?>"> -->
            <select class="form-control col-md-2 form-select" id="subject" name="subject" required>
                <option value="select">select</option>
                <option value="test_sub_1">test sub 1</option>
                <option value="test_sub_2">test sub 2</option>
                <option value="test_sub_3">test sub 3</option>

            </select>



            <br>
            <b> Add Your Question </b>

            <textarea class="form-control" name="qns" required>

</textarea>

            <br>
            <input class="btn btn-success" type="submit" name="submit" value="Add">
        </form>
        <center>

            <button type="button" class="btn col-md-3 btn-info" id="btn-view" onclick='
                if($("#subject").val()=="select") {
                    alert("select subject first");
                }

                    $("#qns_area").load(
                    "fetch_qns.php",
                    "subject="+$("#subject").val());
                '>
                View Previous Questions

            </button>
        </center>
        <div id="qns_area">
        </div>

        <br>
    </div>
</body>

</html>
