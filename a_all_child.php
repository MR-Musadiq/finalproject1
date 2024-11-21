<?php
include('connection.php');
include('sidebar.php');
// if (!isset($_SESSION['userrole'])=='admin')
// {
   

// }

if($_SESSION['userrole'] != "admin"){
    
    echo "<script>
    alert('You Have Not Access For This Page')
    location.assign('logout_admin.php');
    </script>";
}

else{






$search_query = '';
$results = [];

if (isset($_GET['query'])) {
    // Sanitize the search query
    $search_query =  $_GET['query'];
    $qselect = "SELECT `c_id`, `c_name`, `c_age`, `c_gender`, `c_dob`, `c_location`, `p_email`, `password` FROM `child` WHERE c_name LIKE '%$search_query%'";
} else {
    $qselect = "SELECT `c_id`, `c_name`, `c_age`, `c_gender`, `c_dob`, `c_location`, `p_email`, `password` FROM `child`";
}

$result = mysqli_query(
    $con, $qselect);
if (!$result) {
    echo "Error: " . mysqli_error($con);
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>List of Children</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-sm-12">

      
    <!-- Search Bar -->
    <form method="GET" >
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

    <!-- Children List Table -->
    <h1 class="h4 text-black-900 mb-4">List of Children</h1>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Child Name</th>
                <th scope="col">Age</th>
                <th scope="col">Gender</th>
                <th scope="col">Date of Birth</th>
                <th scope="col">Location</th>
                <th scope="col">Parent's Email</th>
                <th scope="col"> Operation</th>
              
            </tr>
        </thead>
        <tbody>
            <?php
            while ($row = mysqli_fetch_array($result)) {
                ?>
                <tr>
                    <td><?php echo $row[0]; ?></td>
                    <td><?php echo $row[1]; ?></td>
                    <td><?php echo $row[2]; ?></td>
                    <td><?php echo $row[3]; ?></td>
                    <td><?php echo $row[4]; ?></td>
                    <td><?php echo $row[5]; ?></td>
                    <td><?php echo $row[6]; ?></td>
                    <td><a href="add_vaccinations.php?add_vaccine=<?php echo $row[0]?>" class="btn btn-primary"> Add_vaccine</a></td>
                 
                    
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
</div>

<?php include('footer.php'); ?>
</body>
</html>
<?php 
}
?>