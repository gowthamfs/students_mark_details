<?php
session_start();


if (isset($_SESSION['auth'])) {

    $_SESSION['message'] = "You are Already Register";
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

</head>

<style>
    label{
        margin:0;
    }
    input{
        margin-bottom: 10px;
    }
</style>


<body>

 
        <div class="container mt-2">
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
                            <h2>Registration Form</h2>
                        </div>
                        <div class="card-body">
                            <form action="./functions/authcode.php" id="register-form" method="POST">
                                <label for="firstname">First name:</label>
                                <input type="text" class="form-control" id="firstname" name="firstname"
                                    placeholder="Enter your first name" required>
                                    <label for="lastname">Last name:</label>
                                <input type="text" class="form-control" id="lastname" name="lastname"
                                    placeholder="Enter your last name" required>
                                    <label for="email">Email:</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="Enter your email" required>
                                    <label for="phone">Phone:</label>
                                <input type="tel" class="form-control" id="phone" name="phone"
                                    placeholder="Enter your phone number" required>
                                    <label for="password">Password:</label>
                                <input type="password" class="form-control" id="password" name="password"
                                    placeholder="Enter your password" required>
                                    <label for="confirmpassword">Confirm password:</label>
                                <input type="password" class="form-control" id="confirmpassword" name="cpassword"
                                    placeholder="Confirm your password" required>
                                <button type="submit" class="btn btn-primary w-100" name="submit-btn">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>



    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNSBp0w"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>

</body>

</html>


<?php include("includes/footer.php") ?>