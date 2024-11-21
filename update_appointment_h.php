<?php
include('connection.php');
include('sidebar.php');

if($_SESSION['userrole'] != "hospital"){
    
    echo "<script>
    alert('You Have Not Access For This Page')
    location.assign('logout_admin.php');
    </script>";
}
else{
// Fetch the appointment details if the update_id is passed
if (isset($_GET['update_id'])) {
    $id = $_GET['update_id'];
    $query = "SELECT * FROM `appointments` WHERE c_id = $id"; // Fetch appointment using c_id
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_array($result);
}

?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-10 col-lg-12 col-md-9">
            <div>
                <div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-xl-10 col-lg-12 col-md-9">
                                <div>
                                    <div>
                                        <div class="row" style="margin-top:100px;">
                                            <div class="col-lg-12 d-none d-lg-block"></div>
                                            <div class="col-lg-12">
                                                <div class="p-5">
                                                    <div class="text-center">
                                                        <h1 class="text-gray-900 mb-4">Update Appointment Status</h1>
                                                    </div>
                                                    <form action="" method="post">
                                                        <!-- Status dropdown for updating the status -->
                                                        <div class="mb-3">
                                                            <label for="status">Status</label>
                                                            <select name="status" class="form-control" required> 
                                                                <option value="Pending">Pending</option>
                                                                <option value="Vaccinated ">Vaccinated</option>
                                                                <option value="Not Vaccinated ">Not Vaccinated</option>
                                                            </select>
                                                        </div>

                                                        <div class="form-group">
                                                            <button type="submit" class="btn btn-primary" name="Update">Submit</button>
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
            </div>
        </div>
    </div>
</div>

<?php
// Handle the update when form is submitted
if (isset($_POST["Update"])) {
    $h_status = $_POST["status"]; // Get the selected status value

    // Update the appointment status in the database using c_id
    $update_query = "UPDATE `appointments` SET `statusp` = '$h_status' WHERE c_id = $id"; // Update the status using c_id
    $result = mysqli_query($con, $update_query);

    if ($result) {
        echo "<script>alert('Status Updated'); window.location.href = 'appoin_details_h.php ';</script>"; // Redirect after update
    } else {  
        echo "<script>alert('Status Not Updated');</script>"; // Show error if update fails
    }
}

include('footer.php');
?>
</body>
</html>
<?php
}
?>