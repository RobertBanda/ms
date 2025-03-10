<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "assets/dependencies/session.php"; ?>
    <?php include "assets/dependencies/header.php"; ?>
    <?php include "assets/connection/condb.php"; ?>
    <?php include "assets/dependencies/endpoints.php"; ?>
    <title>NIS</title>
</head>

<body>
    <div id="global-loader">
        <div class="loader"></div>
    </div>

    <div class="main-wrapper">

        <!-- navbar -->
        <?php include "assets/dependencies/navbar.php"; ?>

        <!-- sidebar -->
        <?php include "assets/dependencies/sidebar.php";
        $param = 'EmployeeID';
        $arg = $user['employeeID'];
        $employee = getEmployee($db, $param, $arg);
        $firstname = '';
        $lastname = '';
        $DOB = '';
        $gender = '';
        $PhoneNumber = '';
        $EmployeeID = '';
        $Position = '';
        $deptName = '';
        $grade = '';
        $qId = '';
        $deptName = '';
        $officeName = '';

        foreach ($employee as $key => $employee) {
            $firstname = $employee['fName'];
            $lastname = $employee['lName'];
            $DOB = $employee['DOB'];
            $gender = $employee['gender'];
            $PhoneNumber = $employee['PhoneNumber'];
            $EmployeeID = $employee['EmployeeID'];
            $Position = $employee['Position'];
            $deptName = $employee['departmentName'];
            $officeName = $employee['officeName'];
            $grade = $employee['grade'];
        }
        ?>


        <div class="page-wrapper">
            <div class="content">
                <div class="card">
                    <div class="card-body">
                        <div class="profile-set">
                            <div class="profile-head">
                            </div>
                            <div class="profile-top">
                                <div class="profile-content">
                                    <div class="profile-contentimg">
                                        <img src="assets/img/profiles/default.png" alt="img" id="blah">
                                    </div>
                                    <div class="profile-contentname">
                                        <h2><?php echo $firstname . ' ' . $lastname; ?></h2>
                                        <h4>Your Work and Personal Details</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                        if (isset($_SESSION['error'])) {
                            echo "
                                <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                            <strong>Error!</strong> " . $_SESSION['error'] . "
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                            </div>
                                        ";
                            unset($_SESSION['error']);
                        }
                        if (isset($_SESSION['success'])) {
                            echo "
                            <div class='alert alert-success alert-dismissible fade show' role='alert'>
                            <strong>Success!</strong> " . $_SESSION['success'] . "
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                            </div>
                                    ";
                            unset($_SESSION['success']);
                        }
                        ?>
                        <section>
                            <label>
                                <h6 class="fw-bold">Personal Details</h6>
                            </label>
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">

                                        <div class=" col-sm-4">

                                            <div class="form-group">
                                                <label>Full Name</label>
                                                <span class="text-muted"><?php echo $firstname . ' ' . $lastname; ?></span>
                                            </div>
                                        </div>
                                        <div class=" col-sm-4">
                                            <div class="form-group">
                                                <label>Date of Birth</label>
                                                <span class="text-muted"><?php echo $DOB; ?></span>
                                            </div>
                                        </div>
                                        <div class=" col-sm-4">
                                            <div class="form-group">
                                                <label>Gender</label>
                                                <span class="text-muted"><?php echo $gender; ?></span>
                                            </div>
                                        </div>
                                        <div class=" col-sm-4">
                                            <div class="form-group">
                                                <label>Phone Number</label>
                                                <span class="text-muted"><?php echo $PhoneNumber; ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <section>
                            <label>
                                <h6 class="fw-bold">Academic Qualifications</h6>
                            </label>
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">

                                        <div class=" col-sm-4">
                                            <div class="form-group">
                                                <label>Qualification Specification</label>
                                                <?php
                                                $sql = "SELECT * FROM qualifications WHERE EmployeeID='$EmployeeID'";
                                                $result = mysqli_query($db, $sql);
                                                if ($result->num_rows > 0) {
                                                    while ($row = $result->fetch_assoc()) {
                                                        echo '<ul>';
                                                        echo '<li> <span class="text-muted">' . $row['qTitle'] . '</span></li>';
                                                        echo ' <a href="assets/documents/' . $row['FilePath'] . '"><span>' . $row['FilePath'] . '</span></a>';
                                                        echo ' </ul>';
                                                    }
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <section>
                            <label>
                                <h6 class="fw-bold">Job Details</h6>
                            </label>
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">

                                        <div class=" col-sm-4">

                                            <div class=" col-sm-4">
                                                <div class="form-group">
                                                    <label>Employee ID</label>
                                                    <span class="text-muted"><?php echo $EmployeeID; ?></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class=" col-sm-4">
                                            <div class="form-group">
                                                <label>Post</label>
                                                <span class="text-muted"><?php echo $Position; ?></span>
                                            </div>
                                        </div>
                                        <div class=" col-sm-4">
                                            <div class="form-group">
                                                <label>Department</label>
                                                <span class="text-muted"><?php echo $deptName; ?></span>
                                            </div>
                                        </div>
                                        <div class=" col-sm-4">
                                            <div class="form-group">
                                                <label>Regional Office</label>
                                                <span class="text-muted"><?php echo $officeName; ?></span>
                                            </div>
                                        </div>
                                        <div class=" col-sm-4">
                                            <div class="form-group">
                                                <label>Grade</label>
                                                <span class="text-muted"><?php echo $grade ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include "assets/dependencies/footer.php"; ?>
    <?php include "assets/dependencies/scripts.php"; ?>
</body>

</html>