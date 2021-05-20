<?php
require('inc/nav.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Questions | DSK Solutions</title>
</head>

<body class="container">
    <div class="border container card">
        <h3>View Questions</h3>
        <hr>
        <div class="table-responsive">
            <b>Select Subject : </b>
            <select class="form-control col-md-2 form-select" id="subject" onchange='
         $("#qns_area").load( "fetch_qns" , "subject=" +this.value);
         '>
                <option value="select">select</option>
                <option value="test_sub_1">test sub 1</option>
                <option value="test_sub_2">test sub 2</option>
                <option value="test_sub_3">test sub 3</option>

            </select>



            <br>


            <div id="qns_area">

            </div>

            <br>
        </div>
</body>

</html>