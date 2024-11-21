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
$search_query = '';
$results = [];

if (isset($_GET['query'])) {
    $search_query =  $_GET['query'];
    // Use the search query if provided
    $qselect = "SELECT `hid`, `hname`, `haddress`, `hcontact` FROM `addht` WHERE `hname` LIKE '%$search_query%'";
} else {
    // Default query if no search term is provided
    $qselect = "SELECT `hid`, `hname`, `haddress`, `hcontact` FROM `addht`";
}

$result = mysqli_query($con, $qselect);
if (!$result) {
    echo "Error: " . mysqli_error($con);
}

if (isset($_GET['deletehid'])) {
    $d_id = $_GET['deletehid'];
    $delete_query = "DELETE FROM `addht` WHERE `hid` = $d_id";
    $delete_result = mysqli_query($con, $delete_query);

    if ($delete_result) {
        echo "<script>alert('Record deleted'); window.location.href='hospitallist.php';</script>";
    } else {
        echo "Error deleting record: " . mysqli_error($con);
    }
}


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>List of Hospitals</title>
</head>
<body>
<div class="container">
    <div class="row">
    <div class="col-sm-12">
                        <!-- Search Bar -->
                        <form  method="GET" >
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

                        <br><br><br><br>

    <!-- Hospital List Table -->
    <h1 class="h4 text-black-900 mb-4">List of Hospitals</h1>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Hospital Name</th>
                <th scope="col">Hospital Address</th>
                <th scope="col">Contact</th>
                <th scope="col">Operation</th>
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
                    <td>
                        <a href='updatehospital.php?updatehid=<?php echo $row[0]; ?>' class='btn btn-primary btn-sm'>Update</a>
                        <a href='?deletehid=<?php echo $row[0]; ?>' class='btn btn-danger btn-sm' onclick="return confirm('Are you sure you want to delete this record?');">Delete</a>
                    </td>
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
