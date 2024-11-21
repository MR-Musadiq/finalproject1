<?php
include('connection.php');
include('sidebar.php');
if(isset($_SESSION['username'])==null){
    
    echo"<script>
    location.assign('login.php')</script>";
    
}
else{
if(isset($_GET['updatehid'])) {
    $u_id = $_GET['updatehid'];
    $query = "SELECT * FROM `addht`";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_array($result);
}


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
                                        <input type="text" value="<?php echo $row[1]?>" class="form-control form-control-user"
                                            id="exampleInputtext" aria-describedby="text"
                                            placeholder="" name="hname">
                                           
                                    </div>

                                    <div class="form-group">
                                    <label for="">Hospital Address</label>
                                        <input type="text"  value="<?php echo $row[2]?>" class="form-control form-control-user"
                                            id="exampleInputtext" aria-describedby="text"
                                            placeholder=""  name="haddress">
                                           
                                    </div>

                                    <div class="form-group">
                                    <label for="">Contact</label>
                                        <input type="text" class="form-control form-control-user"
                                            id="exampleInputtext" aria-describedby="text"
                                            placeholder=""  name="hcontact"  value="<?php echo $row[3]?>">
                                           
                                    </div>
                                   
                                   
                                      
                                    </div>
                                   <input type="submit" name="update" id="" value="Update Hospital" class="btn btn-primary btn-user btn-block">
                                   
                               
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
        <!-- End of Content Wrapper -->

    </div>
    

</body>
<?php
include('footer.php')?>
</html>
<?php
if (isset($_POST["update"])) {
    $hname=trim($_POST["hname"]);
    $haddress=trim($_POST["haddress"]);
    $hcontact=($_POST["hcontact"]);
    $query="UPDATE `addht` SET `hname`='$hname',`haddress`='$haddress',`hcontact`='   $hcontact' WHERE hid=$u_id";
    $result=mysqli_query($con, $query);
 
    if ($result) {
        echo "<script>alert('Data updated');
        window.location.href='hospitallist.php'</script>";
    }
    else {  
        echo "<script>alert('Data update error')</script>";
    }
}
}
?>