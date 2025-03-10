<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "assets/dependencies/session.php"; ?>
    <?php include "assets/dependencies/header.php"; ?>
    <?php include "assets/connection/condb.php"; ?>
    <?php include "assets/dependencies/endpoints.php"; ?>
    <title>Employees</title>
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
                        <h6>View/edit/Search Employees</h6>
                    </div>
                    <div class="page-btn">
                        <a href="addemployee.php" class="btn btn-added"><img src="assets/img/icons/plus.svg" alt="img">Add Employee</a>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="table-top">
                            <div class="search-set">
                                <div class="search-path">
                                    <a class="btn btn-filter" id="filter_search">
                                        <img src="assets/img/icons/filter.svg" alt="img">
                                        <span><img src="assets/img/icons/closes.svg" alt="img"></span>
                                    </a>
                                </div>
                                <div class="search-input">
                                    <a class="btn btn-searchset"><img src="assets/img/icons/search-white.svg" alt="img"></a>
                                </div>
                            </div>
                            <div class="wordset">
                                <ul>
                                    <li>
                                        <a data-bs-toggle="tooltip" data-bs-placement="top" title="pdf"><img src="assets/img/icons/pdf.svg" alt="img"></a>
                                    </li>
                                    <li>
                                        <a data-bs-toggle="tooltip" data-bs-placement="top" title="excel"><img src="assets/img/icons/excel.svg" alt="img"></a>
                                    </li>
                                    <li>
                                        <a data-bs-toggle="tooltip" data-bs-placement="top" title="print"><img src="assets/img/icons/printer.svg" alt="img"></a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <section>
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
                            <div class="table-responsive">
                                <table class="table datanew">
                                    <thead>
                                        <tr><th>ID</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Department</th>
                                            <th>Position</th>
                                            <th>Regional Office</th>
                                            <th>Gender</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $employees = getEmployees($db);
                                        // Check if $employees is not null
                                        if ($employees !== null && !empty($employees)) {
                                            foreach ($employees as $employee) {
                                                echo '<tr>
                                                     <td>' .$employee['EmployeeID'] . '</td>
                                                    <td>' . $employee['fName'] . '</td>
                                                    <td>' . $employee['lName'] . '</td>
                                                    <td>' . $employee['departmentName'] . '</td>
                                                    <td>' . $employee['Position'] . '</td>
                                                    <td>' . $employee['officeName'] . '</td>
                                                    <td>' . $employee['gender'] . '</td>
                                                    <td>
                                                    <a class="me-3" href="viewemployee.php?empID=' . $employee['EmployeeID'] . '">
                                                    <img src="assets/img/icons/eye.svg" alt="img">
                                                    </a>
                                                    <a class="me-3" href="editemployee.php?empID=' . $employee['EmployeeID'] . '">
                                                    <img src="assets/img/icons/edit.svg" alt="img">
                                                    </a>
                                                    </td>
                                                </tr>';
                                            }
                                        } else {
                                            echo 'No employees available';
                                        }

                                        ?>
                                    </tbody>
                                </table>
                            </div>

                        </section>


                    </div>
                </div>

            </div>
        </div>
    </div>
</body>

<?php include "assets/dependencies/footer.php"; ?>
<?php include "assets/dependencies/scripts.php"; ?>
<script>
    $(function() {
        $(document).on('click', '.view', function(event) {
            event.preventDefault();

            var row = $(this).closest('tr');
            var id = $(this).data('id');
            var subjectName = row.find('.subject-name').data('name');
            var form = row.find('.form').data('form');
            var academicYear = row.find('.academic-year').data('academic-year');
            var term = row.find('.term').data('term');

            // Construct the URL with query parameters
            var url = 'viewSubjectResults.php?' +
                'id=' + encodeURIComponent(id) +
                '&subjectName=' + encodeURIComponent(subjectName) +
                '&form=' + encodeURIComponent(form) +
                '&academicYear=' + encodeURIComponent(academicYear) +
                '&term=' + encodeURIComponent(term);
            // Redirect to another page with the constructed URL
            window.location.href = url;
        });
    });
</script>

</html>