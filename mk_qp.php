<?php

require('inc/nav.php');

// $subject = "test";
$userID = "test_user_001";


if (isset($_GET)) {

    if (isset($_GET['err'])) {
        if ($_GET['err'] == 'max') {
            $str_temp_err = "Please Add Max Marks to Each Question";

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
    <title>Make Question Paper | DSK Solutions</title>
    <link rel="shortcut icon" href="assets/images/logo.png" type="image/png" />


</head>

<body class="container">
    <div class="container card border">
        <h2>Make Question Paper</h2>
        <hr>


        <form action="mk_qp_preview" method="post" id="formWithQuestions">
            <div class="row col-md-12">
                <div class="col-md-3">
                    <b> User </b>
                    <input type="text" name="user" id="user" readonly class="form-control" value="<?php echo $userID; ?>">
                </div>

                <div class="col-md-3">
                    <b>Class</b>
                    <select class="form-control form-select" id="class" name="class" required>
                        <option value="TEST CLASS 1">TEST CLASS 1</option>
                        <option value="TEST CLASS 2">TEST CLASS 2</option>
                        <option value="TEST CLASS 3">TEST CLASS 3</option>
                        <option value="TEST CLASS 4">TEST CLASS 4</option>
                    </select>

                </div>
                <div class="col-md-3">
                    <b>Subject</b>
                    <select class="form-control form-select" id="subject" name="subject" onchange="
            $('#qns-area').load('fetch_sub_qns.php','subject='+this.value);" required>
                        <option value="select">select</option>
                        <option value="test_sub_1">test sub 1</option>
                        <option value="test_sub_2">test sub 2</option>
                        <option value="test_sub_3">test sub 3</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <b>Exam Date</b>
                    <input type="date" name="examDate" placeholder="Date" class="form-control" required />
                </div>
            </div>
            <br>
            <div class="row col-md-12">
                <div class="col-md-3">
                    <b>Sections</b>
                    <select class="form-control form-select" name="sections" id="sections">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>
                    <!-- <input type="hidden" name="sections" id="sectionValue" /> -->
                </div>
                <div class="col-md-3">
                    <b>Alloted Time in Minutes</b>
                    <input type="number" name="allotedTime" class="form-control" placeholder="Time" required />
                </div>
                <div class="col-md-3">
                    <b>Session</b>
                    <select class="form-control form-select" name="session">
                        <option value="FN">FN</option>
                        <option value="AN">AN</option>

                    </select>
                </div>
                <div class="col-md-3">
                    <b>Exam type</b>
                    <select class="form-control form-select" name="examType">
                        <option value="Internal">Internal</option>
                        <option value="Slip Test">Slip Test</option>
                        <option value="Formal">Formal</option>
                        <option value="Oral">Oral</option>
                        <option value="ViVa">ViVa</option>

                    </select>
                </div>
            </div>


            <br>

            <br>



            <h3>Added Questions
            </h3>
            <br>
            <div class="table-responsive">

                <table class="table table-hover" id="added_qns_tbl">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Question</th>
                            <th>Section</th>
                            <th>Max Marks</th>
                            <th>Co Maping</th>
                            <th>Difficulty</th>
                            <th>Delete</th>

                        </tr>
                    </thead>
                    <tbody id="added-qns">

                    </tbody>

                </table>
            </div>




            <center><input type="submit" class="btn btn-primary" name="submit" value="Make Question Paper" disabled id="submitbtn" /></center>
        </form>
        <div id="qns-area">

        </div>
    </div>


</body>

</html>
<script>
    $('#formWithQuestions').on('submit', function() {
        $.fn.rowCount = function() {
            return $('tr', $(this).find('tbody')).length;
        };
        var rowCount = $('#added_qns_tbl').rowCount();
        alert('Row Count' + rowCount);

        var coMAP = "";
        var difficult = "";

        $('#sections').attr('disabled', false);
        let disableToEnableIterValue = 1;
        while (disableToEnableIterValue <= rowCount) {
            coMAP = "#comap" + disableToEnableIterValue + "a";
            difficult = "#difficult" + disableToEnableIterValue + "a";
            $(coMAP).prop('disabled', false);
            $(difficult).prop('disabled', false);


            disableToEnableIterValue++;
        }


    });
</script>