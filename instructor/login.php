<?php include('../1connection.php'); ?>
<?php 
if(isset($_SESSION['intershipgo_adviser']))
{
//unset($_SESSION['cid']);
unset($_SESSION['intershipgo_adviser']);
}
if(isset($_POST['btnlogin']))
    {
       $user=$_POST['username'];
       $pass=$_POST['password'];
 
       $s = mysqli_query($con,"SELECT * FROM instructor where instructorPASSWORD  ='". $pass ."' and instructorUSERNAME   = '". $user ."'") or die(mysqli_errno($con));
       $r = mysqli_fetch_object($s);
       $count=mysqli_num_rows($s);
       if($count>0){
        $_SESSION['intershipgo_adviser']=$r->instructorID;

          //admin Link
        echo"<script type='text/javascript'>window.location.replace('index.php');alert('Login Successfully!')</script>";  
        }
      
       
       else
       {
        echo"<script type='text/javascript'>window.location.replace('login.php');alert('wrong password or username');</script>";
       }
       
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
        <div class="container">
          <div class="row flex-center min-vh-100 py-5" style="">
            <div class="col-sm-10 col-md-8 col-lg-5 col-xl-5 col-xxl-3"><a class="d-flex flex-center text-decoration-none mb-4" href="index.php">
                <div class="d-flex align-items-center fw-bolder fs-5 d-inline-block"><img src="../assets/img/icons/removebg-preview.png" alt="" width="58" /></div>
              </a>
              <div class="text-center mb-7">
                <h3>Sign in Instructor</h3>
                <p class="text-700">Get access to your account</p>
              <form method="post" action="login.php">
              <div class="mb-3 text-start"><label class="form-label" for="email">Username</label>
                <div class="form-icon-container"><input class="form-control form-icon-input" id="email" type="text" placeholder="Username" name="username" /><span class="fas fa-user text-900 fs--1 form-icon"></span></div>
              </div>
              <div class="mb-3 text-start"><label class="form-label" for="password">Password</label>
                <div class="form-icon-container"><input class="form-control form-icon-input" type="password" placeholder="Password" name="password" /><span class="fas fa-key text-900 fs--1 form-icon"></span></div>
              </div>
              <div class="row flex-between-center mb-7">
                <div class="col-auto">
                  
                </div>
                <div class="col-auto"><a class="fs--1 fw-semi-bold" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Forgot Password?</a></div>
              </div><button class="btn btn-primary w-100 mb-3" type="submit" name="btnlogin">Sign In</button>
             </form>
            </div>
          </div>
        </div>
      </div>
    </main>
    <!-- ===============================================-->
    <!--    End of Main Content-->
    <!-- ===============================================-->



    <!-- ===============================================-->
    <!--    JavaScripts-->
    <!-- ===============================================-->
     <script src="vendors/tinymce/tinymce.min.js"></script>
    <script src="../vendors/popper/popper.min.js"></script>
    <script src="../vendors/bootstrap/bootstrap.min.js"></script>
    <script src="../vendors/anchorjs/anchor.min.js"></script>
    <script src="../vendors/is/is.min.js"></script>
    <script src="../vendors/fontawesome-free-5.3.1-web/css/all.min.js"></script>
    <script src="../vendors/lodash/lodash.min.js"></script>
    <script src="../polyfill.io/v3/polyfill.min.js"></script>
    <script src="../vendors/list.js/list.min.js"></script>
    <script src="../vendors/feather-icons/feather.min.js"></script>
    <script src="../vendors/dayjs/dayjs.min.js"></script>
    <script src="../assets/js/phoenix.js"></script>
  </body>

</html>

<div class="modal fade" id="staticBackdrop" tabindex="-1" data-bs-backdrop="static" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header bg-primary">
                                <h5 class="modal-title text-white" id="staticBackdropLabel">Reset Password?</h5><button class="btn p-1" type="button" data-bs-dismiss="modal" aria-label="Close"><span class="fas fa-times fs--1 text-white"></span></button>
                              </div>
                              <div class="modal-body">
                              <form method="post" action="query.php">
                                <div class="mb-3">
                                  <label class="form-label" for="exampleFormControlInput1">Phone Number</label>
                                  <input class="form-control" type="tel" id="phone" name="number" pattern="[0]{1}[9]{1}[0-9]{9}" maxlength="11" required  />
                                  <small>Format: 09123456789</small>
                                </div>
                              </div>
                              <div class="modal-footer"><button class="btn btn-primary" type="submit" name="forgotpass">Submit</button><button class="btn btn-outline-primary" type="button" data-bs-dismiss="modal">Cancel</button></div>
                              </form>
                            </div>
                          </div>