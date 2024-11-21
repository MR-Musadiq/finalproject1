<?php
include("connection.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Register</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <style>
        .form-check-label {
            display: flex;
            align-items: center;
            padding: 10px;
            font-size: 16px;
            margin-bottom: 10px;
        }

        .form-check-input {
            margin-right: 10px;
        }

        .col-sm-3 {
            margin-bottom: 15px;
        }
    </style>
</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            <form class="user" method="post">
                                <div class="form-group row">
                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                        <input type="text" name="c_name" class="form-control form-control-user" id="exampleFirstName"
                                            placeholder="Child Name" required>
                                    </div>

                                </div>
                                <div class="form-group">
                                    <input type="text" name="c_age" class="form-control form-control-user" id="exampleInputEmail"
                                        placeholder="Child Age" required>
                                </div>
                                <div class="row ml-5">
                                    <div class="col-sm-6">
                                        <label class="form-check-label">
                                            <input type="radio" name="gender" value="Male" class="form-check-input" required> Male
                                        </label>
                                    </div>

                                    <div class="col-sm-6">
                                        <label class="form-check-label">
                                            <input type="radio" name="gender" value="Female" class="form-check-input"> Female
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="date" name="c_date" class="form-control form-control-user" id="exampleInputEmail"
                                        placeholder="Date of birth" required>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <input type="text" name="c_location" class="form-control form-control-user" id="age"
                                            placeholder="Hospital Location" required>
                                    </div>
                                    </div>
                                    <div class="form-group">
                                    <input type="email" name="useremail" class="form-control form-control-user" id="exampleInputEmail"
                                        placeholder="Parent Email Address" required>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" name="userpassword" class="form-control form-control-user"
                                            id="exampleInputPassword" placeholder="Password" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" name="confirm_password" class="form-control form-control-user"
                                            id="exampleRepeatPassword" placeholder="Repeat Password" required>
                                    </div>
                                </div>

                                <input type="submit" value="Create Account" name="register" class="btn btn-primary btn-user btn-block">
                            </form>
                            <hr>
                           
                            <div class="text-center">
                                <a class="small" href="login.php">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <?php
    if (isset($_POST['register'])) {
        $name=$_POST['c_name'];
        $age=$_POST['c_age'];
        $gender=$_POST['gender'];
        $date=$_POST['c_date'];
        $location=$_POST['c_location'];
        $email = $_POST['useremail'];
        $password = $_POST['userpassword'];
        $confirm_password = $_POST['confirm_password'];
        if ($password !== $confirm_password) {

            echo "<script>alert('Passwords do not match');</script>";
        } else {

            // Check if email already exists
            $email_check_query = "SELECT * FROM `child` WHERE  `p_email` = '$email'";
            $email_check_result = mysqli_query($con, $email_check_query);
    
            if (mysqli_num_rows($email_check_result) > 0) {
                // If email exists, show an alert
                echo "<script>alert('This email is already registered');
                 window.location.href='child_details.php';</script>";
            } else {
                // If email does not exist, insert the record
                $sql = "INSERT INTO `child`( `c_name`, `c_age`, `c_gender`, `c_dob`, `c_location`, `p_email`, `password`) 
                VALUES ('$name','$age','$gender','$date','$location','$email','$password')";
    
                $result = mysqli_query($con, $sql);
    
                if ($result) {
                    echo "<script>alert('You are registered successfully');
                     window.location.href='login.php';</script>";
                } else {
                    echo "<script>alert('Error: Registration failed');</script>";
                }
            }
        }
    }
       