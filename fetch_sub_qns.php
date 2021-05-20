<h3>Question Bank</h3>
<div class="table-responsive">


    <table class="table table-hover" id="qns_disp_tbl">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Question</th>
                <th scope="col">Max Marks</th>
                <th scope="col">CO Maping</th>
                <th scope="col">Difficulty Level</th>
                <th scope="col">Action</th>



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
                <tr id="<?php echo "row_sub_qns" . $count; ?>id">


                    <th scope="row"><?php echo $count; ?></th>
                    <td><input class="form-control col-md-12" type="text" name="qns[]" value="<?php echo $row['qns']; ?>" id="<?php echo "qns" . $count; ?>id" readonly></td>
                    <td><input class="form-control" type="number" name="maxMarks[]" id="<?php echo "mxMarks" . $count; ?>id" required /></td>
                    <td><select class="form-control" type="text" name="COMAP[]" id="<?php echo "comap" . $count; ?>id" required>
                            <option value="CO1">CO1</option>
                            <option value="CO2">CO2</option>
                            <option value="CO3">CO3</option>
                            <option value="CO4">CO4</option>
                        </select>
                    </td>
                    <td><select class="form-control" type="text" name="difficultLVL[]" id="<?php echo "diffLVL" . $count; ?>id" required>
                            <option value="Remember">Remember</option>
                            <option value="Understand">Understand</option>
                            <option value="Apply">Apply</option>
                            <option value="Learn">Learn</option>
                        </select>
                    </td>






                    <td>
                        <button type="button" class="btn btn-primary" onclick="                     
                        addQuestion(this.value);
                        let id=this.value;
                        let rowID = '#row_sub_qns'+id+'id';
                        $(rowID).hide();" value="<?php echo $count; ?>">Add</button>
                        <a href="qns_edit.php?id=<?php echo $row['id']; ?>"> <button type="button" class="btn btn-success">Edit</button> </a>


                    </td>


                </tr>
            <?php $count++;
            } ?>
        </tbody>
    </table>
</div>
<script>
    $(document).ready(function() {
        $('#qns_disp_tbl').DataTable();
    });
</script>