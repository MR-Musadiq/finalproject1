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
    <div class="row justify-content-center" >

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div>
                <div>
                    <!-- Nested Row within Card Body -->
                    <div class="row" style="margin-top: 100px;">
                        <div class="col-lg-12 d-none d-lg-block "></div>
                        <div class="col-lg-12">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Add Hospital</h1>
                                </div>
                                <form method="post">
                                    <div class="form-group">
                                    <label for="">Hospital Name</label>
                                        <input type="text" class="form-control form-control-user"
                                            id="exampleInputtext" aria-describedby="text"
                                            placeholder="" name="hname">
                                           
                                    </div>

                                    <div class="form-group">
                                    <label for="">Hospital Address</label>
                                        <input type="text" class="form-control form-control-user"
                                            id="exampleInputtext" aria-describedby="text"
                                            placeholder=""  name="haddress">
                                           
                                    </div>

                                    <div class="form-group">
                                    <label for="">Contact</label>
                                        <input type="text" class="form-control form-control-user"
                                            id="exampleInputtext" aria-describedby="text"
                                            placeholder=""  name="hcontact">
                                           
                                    </div>
                                   
                                   
                                      
                                    </div>
                                   <input type="submit" name="add" id="" value="Add Hospital" class="btn btn-primary btn-user btn-block">
                                   
                               
                                </form>
                            
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>
                    <!-- Page Heading -->
                         
                <!-- /.container-fluid -->

          
            <!-- End of Main Content -->

          

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    
</body>
<?php
include('footer.php')?>
</html>
<?php
if (isset($_POST["add"])) {
    $hname=trim($_POST["hname"]);
    $haddress=trim($_POST["haddress"]);
    $hcontact=($_POST["hcontact"]);
    $qinsert="INSERT INTO `addht`(`hname`, `haddress`, `hcontact`) VALUES ('$hname','$haddress','$hcontact')";
    $result=mysqli_query($con, $qinsert);
 
    if ($result) {
        echo "<script>alert('Data inserted');
        window.location.href='hospitallist.php'</script>";
    }
    else {  
        echo "<script>alert('Data error')</script>";
    }
}
}
?>
