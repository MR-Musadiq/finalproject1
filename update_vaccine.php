<?php
include('connection.php');
include('sidebar.php');
if($_SESSION['userrole'] != "admin"){
    
    echo "<script>
    alert('You Have Not Access For This Page')
    location.assign('logout_admin.php');
    </script>";
}
else{
if(isset($_GET['updateid'])){
    $up_id=$_GET['updateid'];
    $query="SELECT * FROM `vaccines` ";
    $result=mysqli_query($con,$query);
    $row=mysqli_fetch_array($result);
}


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
                            <h1 class="text-gray-900 mb-4">Update Vaccine</h1>
                        </div>
                        <form action="" method="POST">
    <div class="form-group">
        <label for="vname">Vaccine Name</label>
        <input type="text" value="<?php echo $row[1]?>"  name="vname" class="form-control" required>
    </div>
    
    <div class="form-group">
        <label for="status">Vaccine Status</label>
        <select name="status"  value="<?php echo $row[2]?>"   class="form-control" required>
            <option value="Available">Available</option>
            <option value="Not Available">Not Available</option>
        </select>
    </div>
    
    <div class="form-group">
        <button type="submit" class="btn btn-primary" name="update">Submit</button>
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
if(isset($_POST['update'])){
    $name = $_POST['vname'];
    $status = $_POST['status'];

    // Correcting the extra space issue in the query
    $query = "UPDATE `vaccines` SET `vaccine_name`=' $name',`status`='$status'  WHERE id = $up_id";
    
    // Execute the query
    $result = mysqli_query($con, $query);

    // Check if the query was successful
    if($result){
        echo "<script>alert('Vaccine update successfully');
         window.location.href='view_vaccine.php'
        </script>";
    } else {
        echo "<script>alert('Error updating vaccine');</script>";
    }
}
?>
</body>
<?php
include('footer.php')?>
</html>
<?php
}?>