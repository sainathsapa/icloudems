<?php
require('inc/nav.php');
if (isset($_GET['sucDel'])) {

    echo '<script>alert("Successfully Deleted Question Paper ID ' . $_GET['sucDel'] . '.!");</script>';
}
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
        <h2>View Question Papers</h2>
        <hr>
        <div class="table-responsive">

            <table class="table tabler-bordered border table-hover" id="view_qp_tbl">
                <thead>
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
                        $count = 1;
                        while ($row = $runQry->fetch_assoc()) {


                    ?>
                            <tr>
                                <td><?php echo $count++; ?></td>
                                <td><?php echo $row['qpid']; ?></td>
                                <td><?php echo $row['class']; ?></td>
                                <td><?php echo $row['subject']; ?></td>
                                <td><?php echo $row['userName']; ?></td>
                                <td><?php echo $row['date']; ?></td>
                                <td><a href="preview_qp?qpid=<?php echo $row['qpid']; ?>"><button type="button" class="btn btn-primary">View</button></a>
                                <button type="button" class="btn btn-danger" value="<?php echo $row['qpid']; ?>" onclick="delete_record(this.value);">Delete</button>
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

    function delete_record(id) {


        if (window.confirm("Are Sure to Delete ID " + id + " ?")) {

            $(location).attr('href', 'deleteQP?id=' + id);
        } else {
            ;
        }
    }
</script>