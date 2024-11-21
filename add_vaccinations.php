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
if(isset($_GET['add_vaccine'])){
    $id=$_GET['add_vaccine'];
  $query=" SELECT * FROM `child` WHERE c_id=$id";
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
                                    <h1 class="text-gray-900 mb-4">Add Vaccine</h1>
                                </div>
                                <form action="" method="POST">
                                    <div class="form-group">
                                        <label for="vname">Child id</label>
                                        <input type="text" name="c_id" value="<?php echo $row[0]?>"  class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="vname">Vaccine Name</label>
                                        <input type="text" name="vname" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="vname">Vaccine Date</label>
                                        <input type="date" name="vdate" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="vname">Next Vaccine Date</label>
                                        <input type="date" name="nextvaccine" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="status">Vaccine Status</label>
                                        <select name="v_stat" class="form-control" required>
                                            <option value="Pending">Pending</option>
                                            <option value="Completed">Completed</option>
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
if (isset($_POST['add'])) {
    $name = $_POST['vname'];
    $vdate = $_POST['vdate'];
    $nextvaccine = $_POST['nextvaccine'];
    $status = $_POST['v_stat'];
    $c_id = $_POST['c_id'];


    // Correcting the extra space issue in the query
    $query = "INSERT INTO `vaccinations` (`v_name`, `v_date`, `next_v_date`, `status`, `c_id`)
    VALUES ('$name', '$vdate', '$nextvaccine', '$status', $c_id)";


    // Execute the query
    $result = mysqli_query($con, $query);

    // Check if the query was successful
    if ($result) {
        echo "<script>alert('Vaccine inserted successfully');
         window.location.href='upcomingvaccination (1).php'
        </script>";
    } else {
        echo "<script>alert('Error inserting vaccine');</script>";
    }
}
?>
</body>
<?php
include('footer.php') ?>

</html>
<?php
}
?>