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

<table class="table">

<thead>
    <th>ID</th>
    <th>Name</th>
    <th>Status</th>
    <th>Opreations</th>

</thead>
<?php
$query= "SELECT * FROM `vaccines`";
$result=mysqli_query($con,$query);
while($row=mysqli_fetch_array($result)){
    ?>
<tr>
    <td><?php echo $row[0] ?></td>
    <td><?php echo $row[1] ?></td>
    <td><?php echo $row[2] ?></td>
    <td><a href="?deleteid=<?php echo $row[0] ?>" class="btn btn-danger">Delete</a></td>
    <td><a href="update_vaccine.php?updateid=<?php echo $row[0]?>" class="btn btn-primary">Update</a></td>

</tr>

    <?php
}
?>
</table>
</body>
<?php
include('footer.php');
?>
<?php

if(isset($_GET['deleteid'])){
    $delid=$_GET['deleteid'];
    $query="DELETE FROM `vaccines` WHERE  id=$delid";
    $result=mysqli_query($con,$query);
   if($result){
    echo"<script>
    alert('dou you want to delete this record');
    window.location.herf='view_vaccine.php'</script>";
   }
   else{
    echo"<script>
    alert('error')</script>";

   }
}
}
?>
</html>