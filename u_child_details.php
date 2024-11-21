<?php
include("connection.php");
session_start();

if($_SESSION['userrole'] != "parent"){
    
    echo "<script>
    alert('You Have Not Access For This Page')
    location.assign('logout_admin.php');
    </script>";
}
else{
if(isset($_GET['update']))
{
    $id=$_GET['update'];
    $query="SELECT * FROM `child` WHERE c_id=$id";
    $result=mysqli_query( $con,$query);
    $row=mysqli_fetch_array($result);

}


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
                                <h1 class="h4 text-gray-900 mb-4">Update Child Details</h1>
                            </div>
                            <form class="user" method="post">
                                <div class="form-group row">
                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                        <input type="text" name="c_name" value="<?php echo $row[1]?>" class="form-control form-control-user" id="exampleFirstName"
                                            placeholder="Child Name" required>
                                    </div>

                                </div>
                                <div class="form-group">
                                    <input type="text" name="c_age" value="<?php echo $row[2]?>"  class="form-control form-control-user" id="exampleInputEmail"
                                        placeholder="Child Age" required>
                                </div>
                                

                                    
                               
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <input type="text" name="c_location" value="<?php echo $row[5]?>"  class="form-control form-control-user" id="age"
                                            placeholder="Hospital Location" required>
                                    </div>
                                    </div>
                                    <div class="form-group">
                                    <input type="email" name="useremail" value="<?php echo $row[7]?>"  class="form-control form-control-user" id="exampleInputEmail"
                                        placeholder="Parent Email Address" required>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" value="<?php echo $row[6]?>"  name="userpassword" class="form-control form-control-user"
                                            id="exampleInputPassword" placeholder="Password" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" name="confirm_password" class="form-control form-control-user"
                                            id="exampleRepeatPassword" placeholder="Repeat Password" required>
                                    </div>
                                </div>

                                <input type="submit" value="Update Account" name="register" class="btn btn-primary btn-user btn-block">
                            </form>
                            <hr>
                           
                            
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
        
        
        $location=$_POST['c_location'];
        $password = $_POST['userpassword'];
        $confirm_password = $_POST['confirm_password'];
        $email = $_POST['useremail'];

        if ($password !== $confirm_password) {

            echo "<script>alert('Passwords do not match');</script>";
        } 

            // Check if email already exists
          
    
          else {
                // If email does not exist, insert the record
                $sql = "UPDATE `child` SET `c_name`=' $name',`c_age`='$age',`c_location`='$location',`password`='  $password',`p_email`='$email', WHERE c_id=$id";
                $result = mysqli_query($con, $sql);
    
                if ($result) {
                    echo "<script>alert('Record update  successfully');
                     window.location.href='p_all_child.php';</script>";
                } else {
                    echo "<script>alert('Error: update failed');</script>";
                }
            }
        
    }
}
       ?>