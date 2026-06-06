<?php include('../1connection.php'); ?>
<?php 
if(isset($_SESSION['intershipgo_students']))
{
//unset($_SESSION['cid']);
unset($_SESSION['intershipgo_students']);
}

 ?>
<!DOCTYPE html>
<html lang="en-US" dir="ltr">

<?php include('1head.php'); ?>

  <body>
    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">
      <div class="container-fluid px-0" data-layout="container">
      
        
        <div class="content">
          <div class="d-flex flex-center content-min-h">
            <div class="py-9">
                      
                      <div class="card" style="width:400px;">
                        <div class="row g-0">
                         
                          

                          
                              
                            <div class="col-sm-12 col-md-12 col-lg-12">
                              <div class="card text-dark bg-light">
                                <div class="card-body">
                                  <h4 class="card-title text-dark">Enter a new password</h4>
                                  <?php 
                                        $adminID=$_GET['adminID'];
                                        $code=$_GET['code'];
                                        $student=mysqli_query($con,"SELECT * from admin where adminID = '$adminID' and code ='$code'")or die(mysqli_error($con));
                                        $rowstudent=mysqli_fetch_object($student);

                                        
                                if (!empty($rowstudent)) {
                                       
                            
                                  ?>
                                       
                                        <form method="post" action="query.php">
                                        <div class="mb-3">
                                          <label class="form-label" for="">New Password </label>
                                          <input type="text" name="adminID" value="<?= $rowstudent->adminID; ?>" hidden>
                                          <input type="text" name="code" value="<?= $code; ?>" hidden>
                                          <input class="form-control" id="" type="password" name="pass" required="" />
                                        </div>
                                        <button type="submit" class='btn btn-primary' name="resetme2">Reset</button>
                                        </form>
                                  <?php
                                  }else{

                                        echo "<div class='alert alert-outline-danger' role='alert'>Session Expired!</div>";
                                        echo "<a href='login.php' class='btn btn-primary'> Try Again!</a>";
                                  }
                                  ?>
                                </div>
                              </div>
                            </div>


                        </div>
                      </div>
                    
            </div>
          </div>
       
        </div>
      </div>
    </main><!-- ===============================================-->
    <!--    End of Main Content-->
    <!-- ===============================================-->



    <!-- ===============================================-->
    <!--    JavaScripts-->
    <!-- ===============================================-->
    <script src="../vendors/popper/popper.min.js"></script>
    <script src="../vendors/bootstrap/bootstrap.min.js"></script>
    <script src="../vendors/anchorjs/anchor.min.js"></script>
    <script src="../vendors/is/is.min.js"></script>
    <script src="../vendors/fontawesome/all.min.js"></script>
    <script src="../vendors/lodash/lodash.min.js"></script>
    <script src="../polyfill.io/v3/polyfill.min.js"></script>
    <script src="../vendors/list.js/list.min.js"></script>
    <script src="../vendors/feather-icons/feather.min.js"></script>
    <script src="../vendors/dayjs/dayjs.min.js"></script>
    <script src="../assets/js/phoenix.js"></script>
  </body>

</html>