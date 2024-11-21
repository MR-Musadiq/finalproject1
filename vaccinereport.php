<?php
include('connection.php');
include('sidebar.php');
if ($_SESSION['userrole'] != "parent") {

    echo "<script>
    alert('You Have Not Access For This Page')
    location.assign('logout_admin.php');
    </script>";
} else {


?>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-12 col-lg-12 col-md-12">
                <div>
                    <div class="row" style="margin-top: 100px;">
                        <div class="col-lg-12 d-none d-lg-block"></div>
                        <div class="col-lg-12">
                            <div class="p-5">
                                <div>
                                    <h1 class="h4 text-gray-900 mb-4" style="text-align: center;">Report Of Vaccination Taken</h1>
                                </div>

                                <table class="table">
                                    <tr>
                                    <th scope="col">Child Id</th>
                                        <th scope="col">Child Name</th>
                                        <th scope="col">Date of Birth</th>
                                        <th scope="col">Child Age</th>
                                        <th scope="col">Gender</th>
                                        <th scope="col">Location</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Operation</th>
                                        <th scope="col">Vaccine Name</th>
                                        <th scope="col">vaccine Date</th>
                                        
                                    </tr>
                                    <tbody>
                                        <?php
                                        $select = "SELECT `child`.`c_id`, `child`. `c_name`,child.c_dob,child.c_age,child.c_gender,child.c_location, `appointments`.`statusp`,appointments.operation, `vaccinations`.`v_name`,vaccinations.v_date
FROM `vaccinations` 
	JOIN `child` ON `vaccinations`.`c_id` = `child`.`c_id` 
	JOIN `appointments` ON `appointments`.`v_id` = `vaccinations`.`v_id`;";
                                        $result = mysqli_query($con, $select);
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo "<tr>
                                             <td>{$row['c_id']}</td>
                                            <td>{$row['c_name']}</td>
                                              <td>{$row['c_dob']}</td>
                                              <td>{$row['c_age']}</td>
                                              <td>{$row['c_gender']}</td>
                                              <td>{$row['c_location']}</td>
                                                <td>{$row['statusp']}</td>
                                                  <td>{$row['operation']}</td>
                                              <td>{$row['v_name']}</td>
                                              <td>{$row['v_date']}</td>
                                            
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

        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-primary" href="login.html">Logout</a>
                    </div>
                </div>
            </div>
        </div>

        <?php include('footer.php');
        ?>
    </div>
    </body>

    </html>
<?php
}
?>