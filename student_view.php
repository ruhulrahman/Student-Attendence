<?php include_once "inc/header.php"; ?>
<?php include_once "lib/Database.php"; ?>
<?php include_once "classes/Student.php"; ?>



<?php
    
    $stn = new Student();
    $dt = $_GET['stnByDate'];

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $attend = $_POST['attend'];
        $updateStn = $stn->updateAttendance($dt, $attend);
    }
?>



<section class="main_area">
    <div class="container">
        <div class="row">
            <div class="panel panel-default">
                <div class="panel panel-heading" id="phead">
                    <a href="add_student.php" class="btn btn-success">Add Student</a>
                    <a href="date_view.php" class="btn btn-success pull-right">Back</a>
                    <a href="index.php" class="btn btn-danger">Home</a>
                </div>
            <div class="panel panel-body">
                
                    <?php
                        if(isset($updateStn)){
                            echo $updateStn;
                        }
                    ?>
                <div class="well text-center">
                    <strong>Date: </strong><?php echo $dt;?>
                </div>
                <form action="" method="post">
                    <table class="table table-striped">
                        <tr>
                            <th width="25%">Serial</th>
                            <th width="25%">Student Name</th>
                            <th width="25%">Student Roll</th>
                            <th width="25%">Attendance</th>
                        </tr>
                        <?php
                            $stnData = $stn->getStudentByAttendance($dt);
                            if($stnData){
                                $i=0;
                                while($result = $stnData->fetch_assoc()){ 
                                $i++; ?>
                        
                            <tr>
                                <td><?php echo $i;?></td>
                                <td><?php echo $result['name'];?></td>
                                <td><?php echo $result['roll'];?></td>
                                <td>
                                    <input type="radio" name="attend[<?php echo $result['roll'];?>]" value="present" <?php if($result['attend'] == 'present'){echo "checked";}?>>P
                                    <input type="radio" name="attend[<?php echo $result['roll'];?>]" value="absent" <?php if($result['attend'] == 'absent'){echo "checked";}?>>A
                                </td>
                            </tr>
                        <?php } } ?>
                        <tr>
                            <td colspan="4">
                                <input type="submit" name="submit" class="btn btn-primary" value="Update">
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
            </div>
        </div>
    </div>
</section>

<?php include_once "inc/footer.php"; ?>

