<?php
include('sidebar.php');
include('connection.php');
if($_SESSION['userrole'] != "admin"){
    
    echo "<script>
    alert('You Have Not Access For This Page')
    location.assign('logout_admin.php');
    </script>";
}
else{
?>

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
                            <h1 class="text-gray-900 mb-4">Add Vaccine Stock</h1>
                        </div>
                        <form action="" method="POST">
    <div class="form-group">
        <label for="vname">Vaccine Name</label>
        <input type="text" name="vname" class="form-control" required>
    </div>
    
    <div class="form-group">
        <label for="status">Vaccine Status</label>
        <select name="status" class="form-control" required>
            <option value="Available">Available</option>
            <option value="Not Available">Not Available</option>
        </select>
    </div>
    
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
<?php
if(isset($_POST['add'])){
    $name = $_POST['vname'];
    $status = $_POST['status'];

    // Correcting the extra space issue in the query
    $query = "INSERT INTO `vaccines`(`vaccine_name`, `status`) VALUES ('$name', '$status')";
    
    // Execute the query
    $result = mysqli_query($con, $query);

    // Check if the query was successful
    if($result){
        echo "<script>alert('Vaccine inserted successfully');
         window.location.href='view_vaccine.php'
        </script>";
    } else {
        echo "<script>alert('Error inserting vaccine');</script>";
    }
}
?>
</body>
<?php
include('footer.php')?>
</html>
<?php
}
?>
