<?php include_once "inc/header.php"; ?>
<?php include_once "lib/Database.php"; ?>
<?php include_once "classes/Student.php"; ?>


<script type="text/javascript">
    $(document).ready(function(){
        $("form").submit(function(){
            var roll = true;
            $(':radio').each(function(){
                name = $(this).attr('name');
                if(roll && !$(':radio[name="' + name + '"]:checked').length){
                    //alert(name + "Mising");
                    $(".alert").show().fadeOut(6000);
                    roll = false;
                }
            });
            return roll;
        });
    });
</script>






<?php
    error_reporting(0);
    $stn = new Student();
    $current_date = date('Y-m-d');

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $attend = $_POST['attend'];        
        $insertattn = $stn->inserAttendance($current_date, $attend);        
    }
?>



<section class="main_area">
    <div class="container">
        <div class="row">
            <div class="panel panel-default">
                <div class="panel panel-heading" id="phead">
                    <a href="add_student.php" class="btn btn-success">Add Student</a>
                    <a href="date_view.php" class="btn btn-success pull-right">View All</a>
                    <a href="index.php" class="btn btn-danger">Home</a>
                </div>
            <div class="panel panel-body">
                <div class='alert alert-danger' style="display: none;"><strong>Warning: </strong>Student Roll Missing</div>
                    <?php
                        echo $msg;
                        if(isset($insertattn)){
                            echo $insertattn;
                        }
                    ?>
                <div class="well text-center">
                    <strong>Date: </strong><?php echo $current_date;?>
                </div>
                <form id="studentAtnForm" action="" method="post">
                    <table class="table table-inverse">
                        <tr>
                            <th width="25%">Serial</th>
                            <th width="25%">Student Name</th>
                            <th width="25%">Student Roll</th>
                            <th width="25%">Attendance</th>
                        </tr>
                        <?php
                            $stnData = $stn->getStudentData();
                            if($stnData){
                                $i=0;
                                while($result = $stnData->fetch_assoc()){ 
                                $i++; ?>
                        
                            <tr>
                                <td><?php echo $i;?></td>
                                <td><?php echo $result['name'];?></td>
                                <td><?php echo $result['roll'];?></td>
                                <td>
                                    <input type="radio" name="attend[<?php echo $result['roll'];?>]" value="present">P
                                    <input type="radio" name="attend[<?php echo $result['roll'];?>]" value="absent">A
                                </td>
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

