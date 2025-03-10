<?php
include "assets/dependencies/session.php";
include "assets/connection/condb.php";

// Check if employee ID is provided in the URL
if (isset($_GET['empID'])) {
    $empID = $_GET['empID'];

    // Fetch employee details from the database
    $sql = "SELECT * FROM employees WHERE EmployeeID = '$empID'";
    $result = mysqli_query($db, $sql);

    // Check if the query was successful and employee exists
    if ($result && mysqli_num_rows($result) > 0) {
        $employee = mysqli_fetch_assoc($result);

        // Populate form fields with employee data
        $fname = $employee['fName'];
        $lname = $employee['lName'];
        $dob = $employee['DOB'];
        $gender = $employee['gender'];
        $position = $employee['Position'];
        $grade = $employee['grade'];
        $phone = $employee['phone'];
        $department_id = $employee['DepartmentID'];
        $region_office_id = $employee['regionofficeID'];
    } else {
        // Employee not found
        $_SESSION['error'] = 'Employee not found';
        header('Location: employees.php');
        exit();
    }
} else {
    // Employee ID not provided in the URL
    $_SESSION['error'] = 'Employee ID not provided';
    header('Location: employees.php');
    exit();
}
?>

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
                                                                     <!-- Hidden input for employee ID -->
                                    <input type="hidden" id ="employee_id" name="employee_id" value="<?php echo $empID; ?>">
                                    <div class="form-group">
                                        <label>First Name</label>
                                        <input type="text" id="fname" name="fname" value="<?php echo $fname; ?>" />
                                    </div>
                                    <div class="form-group">
                                        <label>Last Name</label>
                                        <input type="text" id="lname" name="lname" value="<?php echo $lname; ?>" />
                                    </div>
                                    <div class="form-group">
                                        <label>Date of Birth</label>
                                        <input type="date" id="dob" name="dob" value="<?php echo $dob; ?>" />
                                    </div>
                                    <div class="form-group">
                                        <label>Gender</label>
                                        <select id="gender" name="gender">
                                            <option value="Male" <?php if ($gender == 'Male') echo 'selected'; ?>>Male</option>
                                            <option value="Female" <?php if ($gender == 'Female') echo 'selected'; ?>>Female</option>
                                            <option value="Other" <?php if ($gender == 'Other') echo 'selected'; ?>>Other</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Position</label>
                                        <input type="text" id="position" name="position" value="<?php echo $position; ?>" />
                                    </div>
                                    <div class="form-group">
                                        <label>Grade</label>
                                        <input type="text" id="grade" name="grade" value="<?php echo $grade; ?>" />
                                    </div>
                                    <div class="form-group">
                                        <label>Phone</label>
                                        <input type="text" id="phone" name="phone" value="<?php echo $phone; ?>" />
                                    </div>
                                    <div class="form-group">
                                        <label>Department ID</label>
                                        <select id="department_id" name="department_id">
                                            <?php
                                            $sql = "SELECT departmentId, departmentName FROM departments";
                                            $result = mysqli_query($db, $sql);
                                            if ($result && mysqli_num_rows($result) > 0) {
                                                while ($row = mysqli_fetch_assoc($result)) {
                                                    $selected = ($department_id == $row['departmentId']) ? 'selected' : '';
                                                    echo "<option value='" . $row['departmentId'] . "' $selected>" . $row['departmentName'] . "</option>";
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
                                                    $selected = ($region_office_id == $row['officeID']) ? 'selected' : '';
                                                    echo "<option value='" . $row['officeID'] . "' $selected>" . $row['officeName'] . "</option>";
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <button type="submit" name="editemployee" class="btn btn-submit me-2">Submit</button>
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
