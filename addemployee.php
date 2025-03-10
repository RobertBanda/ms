<head>
    <?php include "assets/dependencies/session.php"; ?>
    <?php include "assets/dependencies/header.php"; ?>
    <?php include "assets/connection/condb.php"; ?>
    <?php include "assets/dependencies/endpoints.php"; ?>
    <title>Employee Management</title>
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
                <div class="page-header">
                    <div class="page-title">
                        <h4>Employee Management</h4>
                        <h6>Add/Update Employee</h6>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <form action="employeemanage.php" method="post">
                                    <div class="form-group">
                                        <label>First Name</label>
                                        <input type="text" id="fname" name="fname" />
                                    </div>
                                    <div class="form-group">
                                        <label>Last Name</label>
                                        <input type="text" id="lname" name="lname" />
                                    </div>
                                    <div class="form-group">
                                        <label>Date of Birth</label>
                                        <input type="date" id="dob" name="dob" />
                                    </div>
                                    <div class="form-group">
                                        <label>Gender</label>
                                        <select id="gender" name="gender">
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                            <option value="Other">Other</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Position</label>
                                        <input type="text" id="position" name="position" />
                                    </div>
                                    <div class="form-group">
                                        <label>Grade</label>
                                        <input type="text" id="grade" name="grade" />
                                    </div>
                                    <div class="form-group">
                                        <label>Phone</label>
                                        <input type="text" id="phone" name="phone" />
                                    </div>
                                    <div class="form-group">
                                        <label>Department ID</label>
                                        <select id="department_id" name="department_id">
                                            <?php
                                            $sql = "SELECT departmentId, departmentName FROM departments";
                                            $result = mysqli_query($db, $sql);
                                            if ($result && mysqli_num_rows($result) > 0) {
                                                while ($row = mysqli_fetch_assoc($result)) {
                                                    echo "<option value='" . $row['departmentId'] . "'>" . $row['departmentName'] . "</option>";
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Region Office ID</label>
                                        <select id="region_office_id" name="region_office_id">
                                            <?php
                                            $sql = "SELECT officeID, officeName FROM regionaloffices";
                                            $result = mysqli_query($db, $sql);
                                            if ($result && mysqli_num_rows($result) > 0) {
                                                while ($row = mysqli_fetch_assoc($result)) {
                                                    echo "<option value='" . $row['officeID'] . "'>" . $row['officeName'] . "</option>";
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <button type="submit" name="addemployee" class="btn btn-submit me-2">Submit</button>
                                    <a href="javascript:void(0);" class="btn btn-cancel">Cancel</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<?php include "assets/dependencies/footer.php"; ?>
<?php include "assets/dependencies/scripts.php"; ?>
