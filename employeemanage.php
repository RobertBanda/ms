<?php
include "assets/dependencies/session.php";
include "assets/connection/condb.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['addemployee'])) {
            // Add new employee
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $dob = $_POST['dob'];
            $gender = $_POST['gender'];
            $position = $_POST['position'];
            $grade = $_POST['grade'];
            $phone = $_POST['phone'];
            $department_id = $_POST['department_id'];
            $region_office_id = $_POST['region_office_id'];

            $sql = "INSERT INTO employees (fName, lName, DOB, gender, Position, grade, phone, DepartmentID, regionofficeID) 
                    VALUES ('$fname', '$lname', '$dob', '$gender', '$position', '$grade', '$phone', '$department_id', '$region_office_id')";

            if (mysqli_query($db, $sql)) {
                $_SESSION['success'] = 'Employee Added Successfully';
                header('Location: employees.php');
                exit();
            } else {
                $_SESSION['error'] = 'Error adding employee: ' . mysqli_error($db);
                header('Location: employees.php');
                exit();
            }
        } elseif (isset($_POST['editemployee'])) {
            // Edit employee
            $employee_id = $_POST['employee_id'];
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $dob = $_POST['dob'];
            $gender = $_POST['gender'];
            $position = $_POST['position'];
            $grade = $_POST['grade'];
            $phone = $_POST['phone'];
            $department_id = $_POST['department_id'];
            $region_office_id = $_POST['region_office_id'];

            $sql = "UPDATE employees SET 
                    fName='$fname', 
                    lName='$lname', 
                    DOB='$dob', 
                    gender='$gender', 
                    Position='$position', 
                    grade='$grade', 
                    phone='$phone', 
                    DepartmentID='$department_id', 
                    regionofficeID='$region_office_id' 
                    WHERE EmployeeID='$employee_id'";

            if (mysqli_query($db, $sql)) {
                $_SESSION['success'] = 'Employee Updated Successfully';
                header('Location: employees.php');
                exit();
            } else {
                $_SESSION['error'] = 'Error updating employee: ' . mysqli_error($db);
                header('Location: employees.php');
                exit();
            }
        } else {
            $_SESSION['error'] = 'Invalid action specified';
            header('Location: employees.php');
            exit();
        }
    } else {
        $_SESSION['error'] = 'Action not specified';
        header('Location: employees.php');
        exit();
    }
?>
