<?php
session_start();
include("includes/header.php");
include('./functions/authcode.php');



?>

<!DOCTYPE html>
<html lang="en">

<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="./users/style.css">

</head>
<style>
  label {
    margin: 0;
  }

  input {
    margin-bottom: 10px;
  }
</style>
<div class="container mt-2">
  <div class="row justify-content-center">
    <div class="col-md-5">
      <?php
      if (isset($_SESSION['message'])) {
        echo "<script>alert('" . $_SESSION['message'] . "')</script>";
        unset($_SESSION['message']);
      }
      ?>

      <div class="container mt-3">
        <h1>
          <marquee>You must first register in order to login</marquee>
        </h1>
      </div>


      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

      </body>

</html>

<?php include("includes/footer.php") ?>