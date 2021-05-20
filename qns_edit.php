<?php


require('inc/nav.php');

$qID = $_GET['id'];

//FetchDataFrom DB

$selectQry = "SELECT * FROM qns_bank WHERE `id`='$qID'";
$runQry = $conn->query($selectQry);
$row = $runQry->fetch_assoc();

if (isset($_POST['submit'])) {

    $Qid_form = $_POST['qid'];
    $subject_form = $_POST['subject'];
    $person_form = $_POST['person'];
    $qns_new = $_POST['qns_new'];

    //Updating the Question Data
    $updateQry = "UPDATE qns_bank SET `subject`='$subject_form',`qns`='$qns_new',`added_by`='$person_form' WHERE `id`='$Qid_form'";
    $runQry = $conn->query($updateQry);
    if (!$runQry) {
        echo "error" . mysqli_error($conn);;
    } else {
        echo "<script>alert('Question Updated');</script>";

        header("Location: index.php?updated=$qID");
        exit();
    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Question | iCloudEMS</title>
</head>

<body class="container">
    <div class="border container card">
        <div class="text-lg">
            <h1>Edit Question</h1>
        </div>
        <hr>

        <form class="form" action="#" method="POST">
            <input type="hidden" name="qid" value="<?php echo $qID; ?>" />
            <div class="form-group col-md-6">
                <label for="subject"><b>Subject</b></label>
                <input type="text" class="form-control" name="subject" id="subject" value="<?php echo $row['subject']; ?>" />

            </div>

            <div class="form-group col-md-6">
                <label for="person"><b>Added By</b></label>
                <input type="text" class="form-control" name="person" id="person" value="<?php echo $row['added_by']; ?>" />

            </div>
            <div class="form-group col-md-6">
                <label for="qns"><b>Question</b></label>
                <textarea type="text" class="form-control" name="qns_new" id="qns"><?php echo $row['qns']; ?> </textarea>

            </div>




            <input class="btn btn-primary" type="submit" name="submit" value="Edit">
        </form>

    </div>

</body>

</html>