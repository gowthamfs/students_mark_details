<?php
session_start();
include('../config/dbcon.php');
// session_destroy();



if(isset($_POST['submit-btn'])){
    $firstname = mysqli_real_escape_string($con, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($con, $_POST['lastname']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);

    $email_check = "SELECT * from register WHERE email = '$email' ";
    $email_check_run = mysqli_query($con, $email_check);

    if(mysqli_num_rows($email_check_run) > 0){
        $_SESSION['message'] = "Email Already Register";
        header('Location: ../register.php');
    } else {  
            if($password == $cpassword){
                $sql = "INSERT INTO register (firstname, lastname, email,phone, password) VALUES ('$firstname', '$lastname', '$email', '$phone','$password' )";
                $sql_run = mysqli_query($con, $sql);
        
                if($sql_run){
                    $_SESSION['message'] = "Registered succesfully";
                    header('Location: ../login.php');
                } else{
                    $_SESSION['message'] = "Something went wrong";
                    header('Location: ../register.php');
                }
            }
            else{
                $_SESSION['message'] = "Error: password do not match";
                header('Location: ../register.php');
            } 
    }

}
else if (isset($_POST['login-btn'])){
   $email = mysqli_real_escape_string($con, $_POST['email']);
//    $firstname = mysqli_real_escape_string($con, $_POST['firstname']);
   $password = mysqli_real_escape_string($con, $_POST['password']);

   $login_query = "SELECT * from register WHERE email = '$email' and password = '$password'";
   $login_query_run = mysqli_query($con, $login_query);

   if(mysqli_num_rows($login_query_run) > 0){
        $_SESSION['auth'] = true;

        $userdata = mysqli_fetch_array($login_query_run);
        $userfirstname = $userdata['firstname'];
        $useremail = $userdata['email'];
        

        $_SESSION['auth_user'] = [
            'firstname' => $userfirstname,
            'email' => $useremail   
        ];
        if($_SESSION['auth']){
            $_SESSION['message'] = 'Logged in succesfully';
            header('Location: ../users/index.php');
        }
                    
    }  
   else {
        $_SESSION['message'] = 'Invalid creadentails';
        header('Location: ../login.php');
   }  
}


?>