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

$search_query = '';

if (isset($_GET['query'])) {
    // Sanitize the search query
    $search_query = $_GET['query'];
    $qselect = "SELECT `c_id`, `c_name`, `c_age`, `c_gender`, `c_dob`, `c_location`, `p_email`, `password` FROM `child` WHERE c_name LIKE '%$search_query%'";
} else {
    $qselect = "SELECT `c_id`, `c_name`, `c_age`, `c_gender`, `c_dob`, `c_location`, `p_email`, `password` FROM `child`";
}

$result = mysqli_query($con, $qselect);
if (!$result) {
    echo "Error: " . mysqli_error($con);
}


?>
   <div class="container">
    <div class="row">
        <div class="col-sm-12">
      
    <!-- Search Bar -->
    <form method="GET">
        <div class="input-group">
            <input type="text" name="query" value="<?php echo htmlspecialchars($search_query); ?>" class="form-control bg-light border-0 small" placeholder="Search for...">
            <div class="input-group-append">
                <button class="btn btn-primary" type="submit">
                    <i class="fas fa-search fa-sm"></i>
                </button>
            </div>
        </div>
        </div>
        </div>
    </form>
    <table class="table">
        <thead>
            <th>Name</th>
            <th>Age</th>
            <th>Gender</th>
            <th>DOB</th>
            <th>Location</th>
            <th>E_mail</th>
            <th>Operation</th>
        </thead>
        <?php
        while ($row = mysqli_fetch_array($result)) {
        ?>
            <tr>
                <td><?php echo $row[1] ?></td> <!-- c_name -->
                <td><?php echo $row[2] ?></td> <!-- c_age -->
                <td><?php echo $row[3] ?></td> <!-- c_gender -->
                <td><?php echo $row[4] ?></td> <!-- c_dob -->
                <td><?php echo $row[5] ?></td> <!-- c_location -->
                <td><?php echo $row[6] ?></td> <!-- p_email -->
                <td><a href="u_child_details.php?update=<?php echo $row[0] ?>" class="btn btn-primary">Update</a></td> <!-- c_id -->
                <td><a href="appointment.php?appointment=<?php echo $row[0] ?>" class="btn btn-primary">Book Appointment</a></td> <!-- c_id -->

            </tr>
        <?php
        }
        ?>
    </table>
   </div>
<?php
}
?>
