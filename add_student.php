<?php include_once "inc/header.php"; ?>
<?php include_once "classes/Student.php"; ?>

<?php
    
    $stn = new Student();


    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
        $name = $_POST['name'];
        $roll = $_POST['roll'];

        $inserStnData = $stn->insertStudnetData($name, $roll);
    }
?>

<section class="main_area">
    <div class="container">
        <div class="row">
            <div class="well">
                <a href="add_student.php" class="btn btn-success">Add Studnet</a>
                <a href="index.php" class="btn btn-success pull-right">Back</a>            
            </div>
            <div class="well">
                
                <?php
                    if(isset($inserStnData)){
                        echo $inserStnData;
                    }
                ?>
            </div>
            <div class="well">
                <form action="" method="post">
                  <div class="form-group">
                    <label for="name">Student Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Student Name">
                  </div>
                  <div class="form-group">
                    <label for="roll">Student Roll</label>
                    <input type="text" class="form-control" id="roll" name="roll" placeholder="Enter Student Roll">
                  </div>
                  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</section>

<?php include_once "inc/footer.php"; ?>

