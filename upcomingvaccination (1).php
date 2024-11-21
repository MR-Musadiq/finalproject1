<?php 
include ("connection.php");
include('sidebar.php');
if (isset($_SESSION['username'])==null )
{
   
echo"<script>
location.assign('login.php')</script>";
}
if(isset($_SESSION['username'])==null){
    echo"<script>location.assign('login.php')</script>";
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

<!-- Search Bar -->

                 
<div class="container">

<!-- Outer Row -->
<div class="row justify-content-center" >

    <div class="col-xl-12 col-lg-12 col-md-12">
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


        <div>
            <div>
                <!-- Nested Row within Card Body -->
                <div class="row" style="margin-top: 100px;">
                    <div class="col-lg-12 d-none d-lg-block "></div>
                    <div class="col-lg-12">
                        <div class="p-5">
                            <div>
                                <h1 class="h4 text-gray-900 mb-4 text-center">Upcoming Date Of Vaccine</h1>
                            </div>
                          <br>
                            <table class="table" >
                         
                         <tr>
                       
                             <th scope="col">child Name</th>
                             <th scope="col">Vaccine Name</th>
                             <th scope="col">Date of Birth</th>
                             <th scope="col">Upcoming Vaccine Date</th>
                         </tr>
                     <tbody>
                         <?php
$select="SELECT `c_name`,`v_name`,`c_dob`,next_v_date FROM `vaccinations` as v 
INNER join 
child as c on
v.v_id = c.c_id";
$result=mysqli_query($con,$select);
while($row=mysqli_fetch_assoc($result))
{

echo "<tr>

 
<td>$row[c_name]</td>                        
<td>$row[v_name]</td>
<td>$row[c_dob]</td>                     
<td>$row[next_v_date]</td>
     </tr>";
             
                   
};

?>                            
                        
                     </tbody>
                 </table>
                        </div>
                    </div>
                    
                    <!-- Page Heading -->
                          </div>
                <!-- /.container-fluid -->

            </div>
           
        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>


</body>

</html>

<div>
    <script>
        
    </script>
</div>
<?php
include('footer.php');

}
?>








 





