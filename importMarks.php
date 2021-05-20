<?php
require('inc/nav.php');
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
            $('#qns-area').load('fetch_qns_import.php','subject='+this.value);" required>
                    <option value="select">select</option>
                    <option value="test_sub_1">test sub 1</option>
                    <option value="test_sub_2">test sub 2</option>
                    <option value="test_sub_3">test sub 3</option>
                </select>
            </div>

        </div>
        <br>

        <div class="table-responsive">

            <table class="table tabler-bordered border table-hover" id="view_qp_tbl">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>QP ID</th>
                        <th>Class</th>
                        <th>Subject</th>
                        <th>Added BY</th>
                        <th>Exam Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // SELECT QRY
                    $qrytoSELECT = "SELECT * FROM qpapers GROUP BY `qpid` ORDER BY `date` desc";
                    $runQry = $conn->query($qrytoSELECT);
                    if (!$runQry) {
                        echo "error" . mysqli_error($conn);
                    } else {
                        $count = 0;
                        while ($row = $runQry->fetch_assoc()) {


                    ?>
                            <tr>
                                <td><?php echo $count++; ?></td>
                                <td><?php echo $row['qpid']; ?></td>
                                <td><?php echo $row['class']; ?></td>
                                <td><?php echo $row['subject']; ?></td>
                                <td><?php echo $row['userName']; ?></td>
                                <td><?php echo $row['date']; ?></td>
                                <td><a href="impMarks?class=<?php echo $row['class']; ?>&qpid=<?php echo $row['qpid']; ?>"><button type="button" class="btn btn-primary">Import<img class="img px-1" src="assets/images/importq.png" height="20px" /></button></a>

                                </td>





                            </tr>
                    <?php }
                    } ?>
                    
                </tbody>
            </table>
        </div>
        <br>
    </div>
</body>

</html>

<script>
    $(document).ready(function() {
        $('#view_qp_tbl').DataTable();
    });
</script>

