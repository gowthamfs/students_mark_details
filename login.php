<?php
session_start();



if (isset($_SESSION['auth'])) {

    $_SESSION['message'] = "You are Already Login";
    header('Location: ./users/index.php');
    exit();
}

include("includes/header.php");
include("./config/dbcon.php");
?>

<!DOCTYPE html>
<html lang="en">

<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="<link rel=" stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>




<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">

              

                <?php
                if(isset($_SESSION['message'])) {
                    echo "<script>alert('".$_SESSION['message']."')</script>";
                    unset($_SESSION['message']);
                }
                ?>

                <div class="card">
                    <div class="card-header">
                        <h2>Login Form</h2>
                    </div>
                    <div class="card-body">
                        <form action="./functions/authcode.php" method="POST" autocomplete="off">
                            <div class="form-group mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" placeholder="Enter email"
                                    name="email" Required>
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" placeholder="Enter password"
                                    name="password" Required>
                            </div>
                            <button type="submit" name="login-btn" class="btn btn-primary">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<?php include("includes/footer.php") ?>