<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "assets/dependencies/header.php"; ?>
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
        <?php include "assets/dependencies/sidebar.php"; ?>

        <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-lg-3 col-sm-6 col-12 d-flex">
                        <div class="dash-count">
                            <div class="dash-counts">
                                <?Php
                                $sql = "SELECT COUNT(*) as totalemployees FROM employees";
                                $result = mysqli_query($db, $sql);
                                $row = mysqli_fetch_assoc($result);
                                ?>
                                <a href="employees.php">
                                    <h4 class="text-white">Total Employees</h4>
                                    <h4 class="text-white"><?php echo $row['totalemployees'] ?></h4>
                                    <h5 class="text-white">Employees</h5>
                                </a>
                            </div>
                            <div class="dash-imgs">
                                <i data-feather="user"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12 d-flex">
                        <div class="dash-count">
                            <div class="dash-counts">
                                <?Php
                                $sql = "SELECT COUNT(*) as totalregional FROM regionaloffices";
                                $result = mysqli_query($db, $sql);
                                $row = mysqli_fetch_assoc($result);
                                ?>
                                <a href="region.php">
                                    <h4 class="text-white">Total</h4>
                                    <h4 class="text-white"><?php echo $row['totalregional'] ?></h4>
                                    <h5 class="text-white">Regional</h5>
                                </a>
                            </div>
                            <div class="dash-imgs">
                                <i data-feather="file-text"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12 d-flex">
                        <div class="dash-count">
                            <div class="dash-counts">
                                <?Php
                                $sql = "SELECT COUNT(*) as totadepartments FROM departments";
                                $result = mysqli_query($db, $sql);
                                $row = mysqli_fetch_assoc($result);
                                ?>
                                <a href="departments.php">
                                    <h4 class="text-white">Total</h4>
                                    <h4 class="text-white"><?php echo $row['totadepartments'] ?></h4>
                                    <h5 class="text-white">Departments</h5>
                                </a>
                            </div>
                            <div class="dash-imgs">
                                <i data-feather="file-text"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include "assets/dependencies/footer.php"; ?>
    <?php include "assets/dependencies/scripts.php"; ?>
</body>

</html>