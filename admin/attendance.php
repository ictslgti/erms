<?php
$title = "Dashboard | Online Examination Result Management System | SLGTI";
$description = "Online Examination Result  Management System (ERMS)-SLGTI";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once("../head.php"); ?>
    <?php include_once("../config.php"); ?>
</head>

<body>

    <div class="page-wrapper toggled bg2 border-radius-on light-theme">
        <nav id="sidebar" class="sidebar-wrapper">
            <?php include_once("nav.php"); ?>
        </nav>
        <main class="page-content pt-2">
            <div id="overlay" class="overlay"></div>
            <div class="container-fluid p-5">
                <!-- #1 Insert Your Content-->
                <div class="container">



                    <?php
                    $deparment = null;
                    $course = null;
                    $module = null;
                    $lecturer = null;
                    $batch = null;
                    $hour = null;
                    $date = null;
                    $min = null;
                    $week = null;
                    if (isset($_POST['submit'])) {
                        $date = $_POST['date'];
                        $week = $_POST['week'];
                        $lecturer = $_POST['lecturer'];
                        $module = $_POST['module'];
                        $hour = $_POST['hour'];
                        $min = $_POST['min'];
                        $course = $_POST['course'];

                        $sql = "INSERT INTO attendance (module_id,Lecturer_id,date,time,batch,course)
                        VALUES 
                        ('$module','$lecturer', 
                        '$date', 
                        '$hour|$min','$batch','$course')
                        ";

                        if (mysqli_query($con, $sql)) {
                            echo "
                        <div class='alert alert-success' role='alert'>
                        insert success fully 
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                         </button>
                       </div>";
                        } else {
                            echo "Error: " . $sql . "<br>" . mysqli_error($con);
                            echo "
                        <div class='alert alert-danger' role='alert'>
                        This academic_year alredy submit 
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                         </button>
                       </div>";
                        }
                    }


                    for ($y = 1; $y <= $week; $y++) {
                        $date1 = date('Y-m-d', strtotime('+7 day', strtotime($date)));
                        $sql = "INSERT INTO attendance (module_id,Lecturer_id,date,time,batch,course)
                        VALUES 
                        ('$module','$lecturer', 
                        '$date', 
                        '$hour|$min','$batch','$course')
                        ";

                        if (mysqli_query($con, $sql)) {
                            echo "";
                        }
                        $date = $date1;
                    }

                    ?>


                    <div class="">
                        <div class="card-header ">
                            <h2>Attendance</h2>
                        </div>
                        <div class="card-body ">
                            <!-- content -->
                            <form action="" method="POST">
                                <div class="row">
                                    <div class="col">
                                        <div class="input-group input-group-sm mb-3">

                                            <select class="custom-select" id="inputGroupSelect01" name="department">
                                                <option selected disabled value="">Choose Department</option>
                                                <?php
                                                $result = $con->query("SELECT `department_code` FROM `departments` ORDER BY `departments`.`department_code` ASC");
                                                while ($row = $result->fetch_assoc()) {
                                                    unset($dno);
                                                    $dno = $row['department_code'];
                                                    echo '<option value=" ' . $dno . '"  >' . $dno . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="input-group input-group-sm mb-3">

                                            <select class="custom-select" id="inputGroupSelect01" name="course">
                                                <option selected disabled value="">Choose Course</option>
                                                <?php
                                                $result = $con->query("SELECT `code` FROM `courses` ORDER BY `courses`.`code` ASC");
                                                while ($row = $result->fetch_assoc()) {
                                                    unset($dno);
                                                    $dno = $row['code'];
                                                    echo '<option value=" ' . $dno . '"  >' . $dno . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col">
                                        <div class="input-group input-group-sm mb-3">

                                            <select class="custom-select" id="inputGroupSelect01" name="module">
                                                <option selected disabled value="">Choose Module</option>
                                                <?php
                                                $result = $con->query("SELECT `code` FROM `modules` ORDER BY `modules`.`code` ASC");
                                                while ($row = $result->fetch_assoc()) {
                                                    unset($dno);
                                                    $dno = $row['code'];
                                                    echo '<option value=" ' . $dno . '"  >' . $dno . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="input-group input-group-sm mb-3">

                                            <select class="custom-select" id="inputGroupSelect01" name="batch">
                                                <option selected disabled value="">Choose batch</option>
                                                <?php
                                                $result = $con->query("SELECT `batch_no` FROM `batch` ORDER BY `batch`.`batch_no` DESC");
                                                while ($row = $result->fetch_assoc()) {
                                                    unset($dno);
                                                    $dno = $row['batch_no'];
                                                    echo '<option value=" ' . $dno . '"  >' . $dno . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>


                                <br>

                                <div class="row">
                                    <div class="col">
                                        <div class="input-group input-group-sm mb-3">

                                            <select class="custom-select" id="inputGroupSelect01" name="lecturer">
                                                <option selected disabled value="">Choose lecturer</option>
                                                <?php
                                                $result = $con->query("SELECT `id` FROM `lecturer` ");
                                                while ($row = $result->fetch_assoc()) {
                                                    unset($dno);
                                                    $dno = $row['id'];
                                                    echo '<option value=" ' . $dno . '"  >' . $dno . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="input-group input-group-sm mb-3">
                                            <input type="date" class="form-control" name=date aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" id="validationServer01" required>
                                            <select class="custom-select" id="inputGroupSelect01" name="hour">
                                                <option selected disabled value="">Choose hour</option>
                                                <?php
                                                for ($x = 0; $x < 13; $x++) {
                                                ?>
                                                    <option value="<?php echo $x; ?>"><?php echo $x; ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>

                                            <select class="custom-select" id="inputGroupSelect01" name="min">
                                                <option selected disabled value="">Choose mintue</option>
                                                <?php
                                                for ($x = 0; $x < 61; $x++) {
                                                ?>
                                                    <option value="<?php echo $x; ?>"><?php echo $x; ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                            <input type="text" name="week" placeholder="weeks" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" id="validationServer01" required>
                                        </div>
                                    </div>
                                </div>

                                <!-- content -->
                        </div>
                        <div class="card-footer ">
                            <div class="row">
                                <div class="col"></div>
                                <div class="col-auto">
                                    <input type="submit" name="submit" class="btn btn-primary" value="ADD ">
                                </div>
                            </div>
                        </div>
                    </div>

                    </form>



                </div>
                <!-- #1 Insert Your Content" -->
            </div>
        </main>
    </div>
    <?php include_once("../script.php"); ?>
    <script>

    </script>
</body>

</html>