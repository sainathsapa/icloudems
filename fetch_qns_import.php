<div class="table-responsive">


    <table class="table table-hover" id="qns_disp_tbl">
        <thead class="table-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Subject</th>
                <th scope="col">Question</th>
                <th scope="col">Added by</th>
                <th scope="col">Date</th>
                <th scope="col">Actions</th>


            </tr>
        </thead>
        <tbody>
            <?php
            require('inc/db.php');
            require('inc/js.php');
            $subject = $_GET['subject'];
            $selectQry = "SELECT * FROM qns_bank WHERE `subject`='$subject'";
            $runQry = $conn->query($selectQry);
            $count = 1;
            while ($row = $runQry->fetch_assoc()) {
            ?>
                <tr>


                    <th scope="row"><?php echo $count++; ?></th>
                    <td><?php echo $row['subject']; ?></td>
                    <td><?php echo $row['qns']; ?></td>
                    <td><?php echo $row['added_by']; ?></td>
                    <td><?php echo $row['time_date']; ?></td>
                    <td><a href="imp_marks?qpid=<?php echo $row['id']; ?>"> <button class="btn btn-success">Import <img class="img px-1" src="assets/images/importq.png" height="20px" /> </button> </a></td>


                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<script>
    $(document).ready(function() {
        $('#qns_disp_tbl').DataTable();
    });
</script>