<?php
include('../includes/header.php');
include('../config/dbcon.php');
include('../functions/authcode.php');
include('../functions/myfunctions.php');
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../users//style.css">
    
</head>

<style>
    .form-group {
        margin: 10px;
    }

    label {
        margin: 5px 0 0 0;
    }

    .card-body {
        padding: 5px;
    }
</style>

<body>

    <?php
    if (isset($_SESSION['message'])) {
        echo "<script>alert('" . $_SESSION['message'] . "')</script>";
        unset($_SESSION['message']);
    }
    ?>

    <?php

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $users = getById("add_marks", $id);
        if (mysqli_num_rows($users) > 0) {
            $data = mysqli_fetch_array($users);
            ?>
            <div class="container my-4">
                <div class="row justify-content-center">
                    <div class="col-md-5">
                        <div class="card">
                            <div class="card-header">
                                <h3>Edit Students Marks</h3>
                            </div>
                            <div class="card-body">
                                <div class="form-container">
                                    <form action="code.php" method="POST">
                                        <input type="hidden" name="data_id" value="<?= $data['id']; ?>">
                                        <div class="form-group">
                                            <label>Name:</label>
                                            <input type="text" name="name" class="form-control" value="<?= $data['name']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Roll No:</label>
                                            <input type="number" name="rollno" class="form-control" value="<?= $data['rollno']; ?>">
                                        </div>

                                        <div class="form-group">
                                            <label for="marks1">Subject 1 Marks:</label>
                                            <input type="number" name="sub1" class="form-control" value="<?= $data['sub1']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="marks2">Subject 2 Marks:</label>
                                            <input type="number" name="sub2" class="form-control" value="<?= $data['sub2']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="marks3">Subject 3 Marks:</label>
                                            <input type="number" name="sub3" class="form-control" value="<?= $data['sub3']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="marks4">Subject 4 Marks:</label>
                                            <input type="number" name="sub4" class="form-control" value="<?= $data['sub4']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="marks5">Subject 5 Marks:</label>
                                            <input type="number" name="sub5" class="form-control" value="<?= $data['sub5']; ?>">
                                        </div>
                                        <div class="d-flex justify-content-between mt-5 mb-2 mx-3">
                                            <button type="save-details" class="btn btn-success px-4"
                                                name="save-details">Save</button>
                                            <button type="button" class="btn btn-danger px-4" id="close-btn"
                                                onclick="goBack()">close</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }
    }
    ?>


    <script>
        function goBack() {
            window.history.back();
        }
    </script>

</body>

</html>


<?php include("../includes/footer.php"); ?>