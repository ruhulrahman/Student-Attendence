<?php include_once "inc/header.php"; ?>
<?php include_once "lib/Database.php"; ?>
<?php include_once "classes/Student.php"; ?>

<?php
    error_reporting(0);
    $stn = new Student();
    $current_date = date('Y-m-d');
?>

<section class="main_area">
    <div class="container">
        <div class="row">
            <div class="panel panel-default">
                <div class="panel panel-heading" id="phead">
                    <a href="add_student.php" class="btn btn-success">Add Studnet</a>
                    <a href="index.php" class="btn btn-success pull-right">Take Attendance</a>
                    <a href="index.php" class="btn btn-danger">Home</a>
                </div>
            <div class="panel panel-body">
                <form action="" method="post">
                    <table class="table table-striped">
                        <tr>
                            <th width="30%">Serial</th>
                            <th width="50%">Attendance Date</th>
                            <th width="20%">Action</th>
                        </tr>
                        <?php
                            $atnDate = $stn->getAttendanceDate();
                            if($atnDate){
                                $i=0;
                                while($result = $atnDate->fetch_assoc()){ 
                                $i++; ?>
                        
                            <tr>
                                <td><?php echo $i;?></td>
                                <td><?php echo $result['attend_date'];?></td>
                                <td><a class="btn btn-primary" href="student_view.php?stnByDate=<?php echo $result['attend_date'];?>">View</a></td>
                            </tr>
                        <?php } } ?>
                        <tr>
                            <td colspan="4">
                                <input type="submit" name="submit" class="btn btn-primary" value="Submit">
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

