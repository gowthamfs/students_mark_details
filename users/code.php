<?php
session_start();
include('../config/dbcon.php');

if (isset($_POST['add-marks'])) {
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $rollno = mysqli_real_escape_string($con, $_POST['rollno']);
    $sub1 = mysqli_real_escape_string($con, $_POST['sub1']);
    $sub2 = mysqli_real_escape_string($con, $_POST['sub2']);
    $sub3 = mysqli_real_escape_string($con, $_POST['sub3']);
    $sub4 = mysqli_real_escape_string($con, $_POST['sub4']);
    $sub5 = mysqli_real_escape_string($con, $_POST['sub5']);

    $sql = "INSERT INTO add_marks (name, rollno, sub1, sub2, sub3, sub4, sub5) VALUES ('$name', '$rollno', '$sub1', '$sub2', '$sub3', '$sub4', '$sub5' )";
    $sql_run = mysqli_query($con, $sql);
    if ($sql_run) {
        $_SESSION['message'] = "Add user succesfully";
        header('Location: ./index.php');
    } else {
        $_SESSION['message'] = "something went wrong";
        header('Location: ./index.php');
    }
} else if (isset($_POST['save-details'])) {
    $data_id = $_POST['data_id'];
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $rollno = mysqli_real_escape_string($con, $_POST['rollno']);
    $sub1 = mysqli_real_escape_string($con, $_POST['sub1']);
    $sub2 = mysqli_real_escape_string($con, $_POST['sub2']);
    $sub3 = mysqli_real_escape_string($con, $_POST['sub3']);
    $sub4 = mysqli_real_escape_string($con, $_POST['sub4']);
    $sub5 = mysqli_real_escape_string($con, $_POST['sub5']);

    $update_query = "UPDATE add_marks SET name = '$name', rollno = '$rollno', sub1 = '$sub1' , sub2 = '$sub2' , sub3 = '$sub3' , sub4 = '$sub4' , sub5 = '$sub5' WHERE id='$data_id'";
    $update_query_run = mysqli_query($con, $update_query);

    if (isset($update_query_run)) {
        $_SESSION['message'] = 'Updated succesfully';
        header("Location: ./display.php");
    }

    if ($result->num_rows > 0) {
        // Display the student details
        while ($row = $result->fetch_assoc()) {
            echo "Name: " . $row['name'] . "<br>";
            echo "Roll Number: " . $row['rollno'] . "<br>";
            echo "Total Score: " . ($row['sub1'] + $row['sub2'] + $row['sub3'] + $row['sub4'] + $row['sub5']) . "<br><br>";
        }
    } else {
        echo "No student details found.";
    }
}



?>