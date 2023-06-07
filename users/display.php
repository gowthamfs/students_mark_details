<?php
session_start();
include('../includes/header.php');
include('../config/dbcon.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>

  <?php
  if (isset($_SESSION['message'])) {
    echo "<script>alert('" . $_SESSION['message'] . "')</script>";
    unset($_SESSION['message']);
  }
  ?>
  <div class="container my-5">
    <div class="row justify-content-center">
      <div class="col-md-5 text-center">
        <?php
        $con = mysqli_connect('localhost', 'root', '', 'students') or die("Connection failed:" . mysqli_connect_error());
        $sql = "Select * from register";
        $resut = mysqli_query($con, $sql);
        ?>

        <table class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>#</th>
              <th>Name</th>
              <th>Roll No</th>
              <th>High Score</th>
              <th>Action</th>
            </tr>
          </thead>

          <tbody>
            <?php
            $sql = "SELECT * FROM add_marks ORDER BY (sub1 + sub2 + sub3 + sub4 + sub5) DESC";
            $result = mysqli_query($con, $sql);
            // $query = "SELECT * FROM add_marks";
            // $result = mysqli_query($con, $query);
            
            if ($result->num_rows > 0) {
              // Display the student details
              while ($data = $result->fetch_assoc()) {
                ?>
                <tr>
                  <td>
                    <?= $data['id']; ?>
                  </td>
                  <td>
                    <?= $data['name']; ?>
                  </td>
                  <td>
                    <?= $data['rollno']; ?>
                  </td>
                  <td>
                    <?php
                    echo ($data['sub1'] + $data['sub2'] + $data['sub3'] + $data['sub4'] +
                      $data['sub5']) . "<br><br>";
                    ?>
                  </td>

                  </td>
                  <td>
                    <div class="dropdown">
                      <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Actions
                      </button>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="edit_marks.php?id=<?= $data['id']; ?>">Edit</a></li>
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
  </div>


  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNSBp0w"
    crossorigin="anonymous"></script>



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js
"></script>

  <script>

  </script>
</body>

</html>

<?php include('../includes/footer.php'); ?>