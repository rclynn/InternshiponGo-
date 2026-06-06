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
                                  <h4 class="card-title text-dark">Security Questions</h4>
                                  <?php 
                                        $number=$_GET['number'];
                                        $admin=mysqli_query($con,"SELECT * from admin where adminNUMBER = '$number'")or die(mysqli_error($con));
                                        $rowadmin=mysqli_fetch_object($admin);

                                        
                                if (!empty($rowadmin)) {
                                        $securityQA=mysqli_query($con,"SELECT * from securityquestions where securityquestionsUSERID = '$rowadmin->adminID' and securityquestionsUSERTYPE = 'admin'")or die(mysqli_error($con));
                                        $rowsecurityQA=mysqli_fetch_object($securityQA);
                              

                                        if (empty($rowsecurityQA)) {
                                  ?>
                                        <div class="alert alert-outline-danger" role="alert">You didnt have security questions to reset your password please contact admin to reset your password!</div>
                                        <a href='login.php' class='btn btn-primary'> I understand!</a>
                                  <?php
                                        }else{
                                  ?>
                                        <div class="alert alert-outline-success" role="alert"><?=$rowsecurityQA->securityquestionsQ;?></div>
                                        <form method="post" action="query.php">
                                        <div class="mb-3">
                                          <label class="form-label" for="">Answer </label>
                                          <input type="text" name="number" value="<?= $number; ?>" hidden>
                                          <input type="text" name="adminID" value="<?= $rowadmin->adminID; ?>" hidden>
                                          <input class="form-control" id="" type="text" name="answer" required="" />
                                        </div>
                                        <button type="submit" class='btn btn-primary' name="resetme">Submit</button>
                                        </form>
                                  <?php
                                        }
                                  }else{

                                        echo "<div class='alert alert-outline-danger' role='alert'>You Account Didnt Exist!</div>";
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