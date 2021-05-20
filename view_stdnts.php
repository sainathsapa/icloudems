<?php
require('inc/nav.php');
if (isset($_GET['sucDel'])) {

    echo '<script>alert("Successfully Deleted ID ' . $_GET['sucDel'] . '.!");</script>';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Students | DSK Solutions</title>
</head>

<body class="container">
    <div class="border container card">
        <h2>View Students</h2>
        <hr>
        <div class="table-responsive">

            <table class="table tabler-bordered table-hover border" id="view_qp_tbl">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>RollNum</th>
                        <th>Name</th>
                        <th>Father Name</th>
                        <th>Mobile</th>
                        <th>Class</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // SELECT QRY
                    $qrytoSELECT = "SELECT * FROM stdnts";
                    $runQry = $conn->query($qrytoSELECT);
                    if (!$runQry) {
                        echo "error" . mysqli_error($conn);
                    } else {
                        $count = 1;
                        while ($row = $runQry->fetch_assoc()) {


                    ?>
                            <tr>
                                <td><?php echo $count++; ?></td>
                                <td><?php echo $row['rollNum']; ?></td>
                                <td><?php echo $row['sdntName']; ?></td>
                                <td><?php echo $row['stdntFName']; ?></td>
                                <td><?php echo $row['mobile']; ?></td>
                                <td><?php echo $row['class']; ?></td>
                                <td><a href="editStdnt?id=<?php echo $row['id']; ?>"><button type="button" class="btn btn-success">Edit</button> </a>



                                    <button type="button" class="btn btn-danger" value="<?php echo $row['id']; ?>" onclick="delete_record(this.value);">Delete</button>



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

            $(location).attr('href', 'deleteStdnt?id=' + id);
        } else {
            ;
        }
    }
</script>