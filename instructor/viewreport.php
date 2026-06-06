<?php include('../1connection.php'); ?>
<?php include('1session.php'); ?>
<!DOCTYPE html>
<html lang="en-US" dir="ltr">

<?php include('1head.php'); ?>

  <body>
    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">
      <div class="container-fluid px-0" data-layout="container">
       <?php include('1navbarleft.php'); ?>
        <?php include('1navbartop.php'); ?> 
        
       <div class="content">
          <nav class="mb-2" aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
              <li class="breadcrumb-item "><a href="">Electronic Generated Forms</a></li>
               <li class="breadcrumb-item "></li>
              
            </ol>
          </nav>
          <h2 class="text-bold text-1100 mb-5">Forms</h2>

            <div class="row g-3 flex-between-end mb-5">
              
              <div class="col-auto"><!-- <button class="btn btn-phoenix-primary me-2 mb-2 mb-sm-0">Save draft</button> --></div>
            </div>
            <?php
    $cformid = $_GET['cformid'];
$cform=mysqli_query($con,"SELECT * from cform where CformID = '$cformid'")or die(mysqli_error($con));
$rowcform=mysqli_fetch_object($cform);
 ?>
            <div class="row g-5">
              <div class="col-8 col-xl-8">
                <div class="card mb-3">
                  <div class="card-body">
                    <input class="btn btn-success" type="button" onclick="printDiv('h')" value="Print" />
                    <!--  <a href="viewprofile.php" class="btn btn-primary"> Edit</a>    --> 
                    <?php include('../Cformsadmin/'.$rowcform->Clink);  ?>
                  </div>
                </div>
              </div>
              
         
         
          
         <?php include('1footer.php'); ?>           
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