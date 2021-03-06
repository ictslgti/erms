<?php
$title = ' ERMS | SLGTI Attendance';
$description = 'Online Examination Result  Management System (ERMS)-SLGTI';
?>
<!DOCTYPE html>
<html lang='en'>

<head>
    <?php include_once('.././head.php');
    include_once('../config.php');
    ?>
    <?php
    session_start();
    if (!isset($_SESSION['username'])) {
        header('Location: .././index.php');
    }

    ?>
</head>

<body>
    <?php
    $user = $_SESSION['username'];
    //session
    $student_id = '';
    $query = "SELECT * FROM student where email='$user'";
    $result = mysqli_query($con, $query);
    while ($row = mysqli_fetch_assoc($result)) {
        $student_id = $row['id'];
    }
    ?>
    <main class='page-content pt-2'>
        <?php include_once('nav.php');
        ?>
        <div id='overlay' class='overlay'></div>
        <div class='container-fluid p-5'>
            <!-- #1 Insert Your Content-->
            <div class='row'>
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <h3> <?php echo " $title" ?></h3>
                        </div>
                        <div class="card-body">

                            <!-- #1 Insert Your Content-->


                            <div class="container" style="margin-top:10px">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="row">
                                            <div class="col-3">
                                                <div class="dropdown">
                                                    <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" value="show details" name="show_date">
                                                        Attendance Review
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        <a class="dropdown-item" href="attendance_all.php">Moudel-wise</a>
                                                        <a class="dropdown-item" href="attendance_month.php">Month-wise</a>
                                                        <a class="dropdown-item" href="attendance_semester.php">Semester-wise</a>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="dropdown">
                                                <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" value="show details" name="show_date">
                                                    Module
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">


                                                    <?php
                                                    $sql = "SELECT * from attendance GROUP BY code ";
                                                    $result = $con->query($sql);
                                                    if ($result->num_rows > 0) {
                                                        while ($row = $result->fetch_assoc()) {
                                                            echo '<a href="?module=' . $row['code'] . '">' . $row['code'] . '</a><br> ';
                                                        }
                                                    } else {
                                                        echo 'no rows';
                                                    }
                                                    ?>


                                                </div>
                                            </div>

                                            <div class="col-3"></div>


                                        </div>
                                    </div>

                                    <div class="card-body">

                                        <div class="table-responsive">





                                            <div class="row">
                                                <div class="form-group col-md-12 table-responsive">
                                                    <table class="table align-middle table-striped">
                                                        <thead class='thead-light'>
                                                            <tr>
                                                                <th scope='col'>DATE</th>
                                                                <th scope='col'>TIME</th>
                                                                <th scope='col'>STATUS</th>
                                                            </tr>
                                                            <!-- dropdown start -->
                                                            <?php


                                                            if (isset($_GET['module'])) {
                                                                $mon = $_GET['module'];

                                                                //$sql = " select date(date),time(date),status from attendance where student_id='2018ICTBIT01'";
                                                                $sql = "SELECT attendance.attendance_date, attendance.attendance_time, student_attendance.status FROM attendance INNER JOIN 
                                                            student_attendance ON attendance.attendance_id=student_attendance.id where student_id='$student_id' and code='" . $mon . "' ";

                                                                $result = mysqli_query($con, $sql);
                                                                while ($row = mysqli_fetch_assoc($result)) {
                                                                    if (!$row) {
                                                                        echo "ZERO DATA";
                                                                    } else {
                                                            ?>


                                                                        <tr>
                                                                            <td scope='col'><?php echo $row['attendance_date']; ?></td>
                                                                            <td scope='col'><?php echo $row['attendance_time']; ?></td>
                                                                            <td scope='col'><?php echo $row['status']; ?></td>

                                                                        <?php
                                                                    }
                                                                }
                                                            } else {
                                                                $sql = "SELECT attendance.attendance_date, attendance.attendance_time, student_attendance.status FROM attendance INNER JOIN 
                                                            student_attendance ON attendance.attendance_id=student_attendance.id where student_id='$student_id'";

                                                                $result = mysqli_query($con, $sql);
                                                                while ($row = mysqli_fetch_assoc($result)) {
                                                                        ?>


                                                                        <tr>
                                                                            <td scope='col'><?php echo $row['attendance_date']; ?></td>
                                                                            <td scope='col'><?php echo $row['attendance_time']; ?></td>
                                                                            <td scope='col'><?php echo $row['status']; ?></td>

                                                                    <?php
                                                                }
                                                            }


                                                                    ?>
                                                                    <!-- dropdown end -->

                                                                        </tr>
                                                                        <table>

                                                                            <?php
                                                                            if (isset($_GET['module'])) {
                                                                                $mon = $_GET['module'];

                                                                                $sql = "SELECT count(student_attendance.status) as total_session,SUM(`status` = 'present') as take_session,
                                                                                    attendance.code from student_attendance,attendance where student_attendance.id=attendance.attendance_id and
                                                                                     student_id='$student_id' and code='" . $mon . "'";

                                                                                $result = mysqli_query($con, $sql);
                                                                                while ($row = mysqli_fetch_assoc($result)) {
                                                                                    $per = $row['take_session'] + $row['total_session'];
                                                                                    if ($row['take_session'] == 0) {
                                                                                        echo 'ZERO DATA';
                                                                                    } else {
                                                                                        $per1 = number_format(($row['take_session'] / $row['total_session']) * 100, 2) . "%";
                                                                                    }



                                                                            ?>
                                                                                    <tr>
                                                                                        <td style="text-align: right">Points over taken sessions:</td>
                                                                                        <td> <?php
                                                                                                if ($row['take_session'] == 0) {
                                                                                                    echo '0';
                                                                                                } else {
                                                                                                    $per1 = number_format(($row['take_session'] / $row['total_session']) * 100, 2) . "%";
                                                                                                }

                                                                                                echo $row['take_session']; ?><?php echo "/"; ?> <?php echo $row['total_session']; ?></td>

                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td style="text-align: right">Percentage over taken sessions:</td>

                                                                                        <td><?php
                                                                                            if ($row['take_session'] == 0) {
                                                                                                echo '0%';
                                                                                            } else {
                                                                                                echo $per1;
                                                                                            }
                                                                                            ?></td>
                                                                                <?php
                                                                                }
                                                                            } 

                                                                                ?>
                                                                                    </tr>
                                                                        </table>
                                                        </thead>
                                                        <tbody>

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>





                                        </div>
                                    </div>
                                </div>

</body>

</html>

<script type="text/javascript" src="js/bootstrap-datepicker.js"></script>
<link rel="stylesheet" href="css/datepicker.css" />

<div class="modal" id="formModal">
    <div class="modal-dialog">
        <form method="post" id="attendance_form">
            <div class="modal-content">

                <div class="modal-header">
                    <h4 class="modal-title" id="modal_title"></h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
            </div>
    </div>
    <div class="form-group" id="student_details">
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
            </table>
        </div>
    </div>
</div>
</main>

<?php include_once("../script.php");
?>
</body>

</html>