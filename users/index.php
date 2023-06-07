<!DOCTYPE html>
<html lang="en">

<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="./style.css">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css
">

</head>

<body>


  <?php
  // session_start();
  include("../includes/header.php");
  include('../config/dbcon.php');
  include('../functions/authcode.php');
  
  if (isset($_SESSION['message'])) {
    echo "<script>alert('" . $_SESSION['message'] . "')</script>";
    unset($_SESSION['message']);
  }

  if (isset($_SESSION['auth']) == false) {
      $_SESSION['message'] = "You have to login 1st";
      header('Location: index.php');
      exit();
    
  }




  ?>


  <div class="row justify-content-center">
    <div class="col-md-7">
      <div class="card my-3">
        <div class="card-header d-flex justify-content-between">
          <h3>Add Students Marks</h3>
          <button class="border-0 bg-dark text-white rounded" id="add-new-btn">Add New</button>
        </div>

        <div id="add-new-form" style="width:550px; margin: 10px;">
          <div class="container">
            <h2>Student Details Form</h2>
            <form action="code.php" method="POST">
              <div class="form-group d-flex">
                <input type="text" class="form-control w-50" id="name" name="name" placeholder="Enter name">
                <input type="text" class="form-control w-50" id="rollno" name="rollno" placeholder="Enter roll number">
              </div>

              <div class="form-group">
                <label for="marks1">Subject 1 Marks:</label>
                <input type="text" class="form-control" id="marks1" name="sub1" placeholder="Enter marks">
              </div>
              <div class="form-group">
                <label for="marks2">Subject 2 Marks:</label>
                <input type="text" class="form-control" id="marks2" name="sub2" placeholder="Enter marks">
              </div>
              <div class="form-group">
                <label for="marks3">Subject 3 Marks:</label>
                <input type="text" class="form-control" id="marks3" name="sub3" placeholder="Enter marks">
              </div>
              <div class="form-group">
                <label for="marks4">Subject 4 Marks:</label>
                <input type="text" class="form-control" id="marks4" name="sub4" placeholder="Enter marks">
              </div>
              <div class="form-group">
                <label for="marks5">Subject 5 Marks:</label>
                <input type="text" class="form-control" id="marks5" name="sub5" placeholder="Enter marks">
              </div>
              <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-success px-4" name="add-marks">Save</button>
                <button type="button" class="btn btn-danger px-4" id="close-btn">close</button>
              </div>
            </form>
          </div>
        </div>
      </div>

      <div class="card-body">
        <table class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>#</th>
              <th>Name</th>
              <th>Roll No</th>
              <th>Sub 1</th>
              <th>Sub 2</th>
              <th>Sub 3</th>
              <th>Sub 4</th>
              <th>Sub 5</th>
              <th>Action</th>
            </tr>
          </thead>

          <tbody>
            <?php
            $query = "SELECT * FROM add_marks";
            $result = mysqli_query($con, $query);

            if (mysqli_num_rows($result) > 0) {
              while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <tr>
                  <td>
                    <?= $row['id']; ?>
                  </td>
                  <td>
                    <?= $row['name']; ?>
                  </td>
                  <td>
                    <?= $row['rollno']; ?>
                  </td>
                  <td>
                    <?= $row['sub1']; ?>
                  </td>
                  <td>
                    <?= $row['sub2']; ?>
                  </td>
                  <td>
                    <?= $row['sub3']; ?>
                  </td>
                  <td>
                    <?= $row['sub4']; ?>
                  </td>
                  <td>
                    <?= $row['sub5']; ?>
                  </td>
                  <td>
                    <div class="dropdown">
                      <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Actions
                      </button>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="edit_marks.php?id=<?= $row['id']; ?>">Edit</a></li>
                        <li><a class="dropdown-item" href="#">Delete</a></li>
                      </ul>
                    </div>
                  </td>
                </tr>
                <?php
              }
            }

            ?>
          </tbody>
        </table>
      </div>

    </div>

    <div id="overlay"></div>


    <script src="./script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js
"></script>
</body>

</html>


<?php include("../includes/footer.php"); ?>