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
?>

<div class="container">
    <!-- Outer Row -->
    <div class="row ">
        <div class="col-xl-8 col-lg-12 col-md-6">
            <div>
                <div>
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-12"></div>
                        <div class="col-lg-12">
                            <div>
                                <h1 class="h4 text-gray-900 mb-4" style="text-align: center;">List Of Appointment </h1>
                            </div>

                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Name</th>
                                        <th scope="col">Age</th>
                                        <th scope="col">Gender</th>
                                        <th scope="col">DOB</th>
                                        <th scope="col">Appointment Date</th>
                                        <th scope="col">Appointment Time</th>
                                        <th scope="col">Hospital</th>
                                       
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // Updated SELECT query to retrieve c_id
                                    $select = "SELECT c_name, c_age, c_gender, c_dob, a_date, a_time, h_name, statusp, operation  
                                               FROM `appointments` AS a 
                                               INNER JOIN child AS c ON a.c_id = c.c_id 
                                               INNER JOIN hospital AS h ON a.h_id = h.h_id";
                                    $result = mysqli_query($con, $select);

                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "<tr>
                                            <td>$row[c_name]</td>                        
                                            <td>$row[c_age]</td>
                                            <td>$row[c_gender]</td>                     
                                            <td>$row[c_dob]</td>
                                            <td>$row[a_date]</td>
                                            <td>$row[a_time]</td>
                                            <td>$row[h_name]</td>
                                           
                                            <!-- Link with query string to update appointment -->
                                        </tr>";
                                    }
                                    ?>                            
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('footer.php'); ?>
</body>
</html>
<?php
}
?>