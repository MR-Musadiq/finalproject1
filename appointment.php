<?php
include('connection.php');
include('sidebar.php');
if($_SESSION['userrole'] != "parent"){
    
    echo "<script>
    alert('You Have Not Access For This Page')
    location.assign('logout_admin.php');
    </script>";
}
else{
if(isset($_GET["appointment"])){
    $id=$_GET['appointment'];
    $query="SELECT * FROM `child` WHERE c_id=$id";
    $result=mysqli_query($con,$query);
    $row=mysqli_fetch_array($result);
}



?>

                

<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center" >

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div>
                <div>
                    <!-- Nested Row within Card Body -->
                    <div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-10 col-lg-12 col-md-9">
            <div>
                <div>
                    <!-- //Nested row within card body// -->
                    <div class="row " style="margin-top:100px;">
                        <div class="col-lg-12 d-none d-lg-block"></div>
                        <div class="col-lg-12">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="text-gray-900 mb-4" style="text-align: center;">Book Appointment</h1>
                                </div>
                                <form action="" method="post">
                                    <div class="form-group">
                                        <label for="a_date">Appoinyment Date</label>
                                        <input type="date" name="a_date" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="a_time">Appoinyment Time</label>
                                        <input type="time" name="a_time" class="form-control" required>
                                    </div>

                                    <div class=" mb-3">
                                     
                                        <label for="">Select Hospital</label>
                                        <select class="form-control" name="h_name" aria-label="Default select example"> 
                            <?php
                            $query="SELECT * FROM `hospital` ";
                            $result=mysqli_query($con,$query);

                            while($row=mysqli_fetch_array($result))
                            {
                            //  print_r($row['cname']);
                            echo "<option value='$row[0]''>$row[1]</option>";
                            }

                            ?>
                            </select>
                       
                                    </div>
                                  

                                  <input type="hidden" name="c_id" value="<?php echo  $id ?>">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary" name="add">Submit</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>                    
                

        </div>
        <!-- End of Content Wrapper -->

    </div>
    

    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

   <?php
   include('footer.php')?>

</body>

</html>
<?php
if (isset($_POST["add"])) {
   
    $a_date=$_POST["a_date"];
    $a_time=$_POST["a_time"];
    $h_name=$_POST["h_name"];
    $c_id=$_POST['c_id'];
   $query="INSERT INTO `appointments`( `a_date`, `a_time`, `c_id`, `h_id` ) VALUES ('$a_date',' $a_time','$c_id','$h_name')";

       $result=mysqli_query($con, $query);
 
    if ($result) {
      
        echo "<script>alert(' Appointment Booked');
        window.location.href='appointment.php';
        </script>";
    }
    else {  
        echo "<script>alert('Appointment error')</script>";
    }
}
}
?>
