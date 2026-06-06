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
           <div class="row mb-3 gy-6">
            <div class="col-12 col-xxl-2">
              <div class="row align-items-center g-3 g-xxl-0 h-100 align-content-between">
                 <?php $countwork=mysqli_query($con,"SELECT * FROM work")or die(mysqli_error($con)); 
                $rowcountwork= mysqli_num_rows( $countwork ); ?>
                <div class="card bg-info col-12 col-sm-6 col-md-3 col-lg-6 col-xl-3 col-xxl-12" style="padding-bottom: 30px; padding-top: 30px;">
                  <div class="d-flex align-items-center"><span class="text-primary-500" data-feather="shopping-cart"></span>
                    <div class="ms-2">
                      <h2 class="mb-0"><?= $rowcountwork;?><span class="fs-1 fw-semi-bold text-900 ms-2">Work</span></h2>
                      <p class="text-800 fs--1 mb-0">Awating processing</p>
                    </div>
                  </div>
                </div>
                <?php $countnew=mysqli_query($con,"SELECT * FROM student where department ='$rowadviser->instructorCOURSE' and colleges ='$rowadviser->instructorSCHOOL'")or die(mysqli_error($con)); 
                $rowcountnew= mysqli_num_rows( $countnew ); ?>
                <div class="card bg-success col-12 col-sm-6 col-md-3 col-lg-6 col-xl-3 col-xxl-12" style="padding-bottom: 30px; padding-top: 30px;">
                  <div class="d-flex align-items-center"><span class="ftext-success-500" data-feather="users"></span>
                    <div class="ms-2">
                      <h2 class="mb-0"><?= $rowcountnew;?><span class="fs-1 fw-semi-bold text-900 ms-2">Students</span></h2>
                      <p class="text-800 fs--1 mb-0">Working hard</p>
                    </div>
                  </div>
                </div>
                 <?php $countjournal=mysqli_query($con,"SELECT * FROM studentjournal where department ='$rowadviser->instructorCOURSE' and school ='$rowadviser->instructorSCHOOL'")or die(mysqli_error($con)); 
                $rowcountjournal= mysqli_num_rows( $countjournal ); ?>
                <div class="card bg-warning col-12 col-sm-6 col-md-3 col-lg-6 col-xl-3 col-xxl-12" style="padding-bottom: 30px; padding-top: 30px;">
                  <div class="d-flex align-items-center"><span class="text-warning-500" data-feather="book-open"></span>
                    <div class="ms-2">
                      <h2 class="mb-0"><?= $rowcountjournal;?><span class="fs-1 fw-semi-bold text-900 ms-2">Journal</span></h2>
                      <p class="text-800 fs--1 mb-0">Soon to be upload</p>
                    </div>
                  </div>
                </div>
                <?php $agency=mysqli_query($con,"SELECT * FROM agency")or die(mysqli_error($con)); 
                $rowagency= mysqli_num_rows( $agency ); ?>
                <div class="card bg-primary col-12 col-sm-6 col-md-3 col-lg-6 col-xl-3 col-xxl-12" style="padding-bottom: 30px; padding-top: 30px;">
                  <div class="d-flex align-items-center"><span class=" text-danger-500" data-feather="map"></span>
                    <div class="ms-2">
                      <h2 class="mb-0"><?= $rowagency;?><span class="fs-1 fw-semi-bold text-900 ms-2">Agency</span></h2>
                      <p class="text-800 fs--1 mb-0">Fresh start</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
              <div class="col-12 col-xl-6 col-xxl-5">
                <div class="card h-100">
                  <div class="card-body">
                    <div class="card-title mb-1">
                      <h3 class="text-1100">Time-In Log</h3>
                    </div>
                    <p class="text-700 mb-4">Recent 20 time in show here</p>

                    <div class="timeline-vertical timeline-with-details">
                      <div class="timeline-item position-relative">
 <?php $dtr=mysqli_query($con,"SELECT * from dtr")or die(mysqli_error($con));
    while($rowdtr=mysqli_fetch_object($dtr)){
      $student=mysqli_query($con,"SELECT * from student where StudentID = '$rowdtr->dtrSTUDENTID'")or die(mysqli_error($con));
        $rowstudent=mysqli_fetch_object($student);
      if (!empty($rowdtr->dtrTIMEINAM)) {
?>
      
                        <div class="row g-md-3">
                          <div class="col-12 col-md-auto d-flex">
                            <div class="timeline-item-date order-1 order-md-0 me-md-4">
                              <p class="fs--2 fw-semi-bold text-600 text-end"><?=$rowdtr->dtrFULLDATE; ?><br class="d-none d-md-block" /><?= $rowdtr->dtrTIMEINAM; ?></p>
                            </div>
                            <div class="timeline-item-bar position-md-relative me-3 me-md-0 border-400">
                              <div class="icon-item icon-item-sm border rounded-7 shadow-none bg-primary-100"><span class="text-primary-600 fs--2" data-feather="log-in"></span></div><span class="timeline-bar border-end border-dashed border-400">  </span>
                            </div>
                          </div>
                          <div class="col">
                            <div class="timeline-item-content ps-6 ps-md-3">
                              <h5 class="fs--1 lh-sm">Time In AM</h5>
                              <p class="fs--1">by <span class="fw-semi-bold text-primary"><?= $rowstudent->firstname." ".$rowstudent->middlename." ".$rowstudent->lastname;?></span></p>
                              <p class="fs--1 text-800 mb-5"></p>
                            </div>
                          </div>                       
                        </div>
<?php } if (!empty($rowdtr->dtrTIMEINPM)) {?>

                        <div class="row g-md-3">
                          <div class="col-12 col-md-auto d-flex">
                            <div class="timeline-item-date order-1 order-md-0 me-md-4">
                              <p class="fs--2 fw-semi-bold text-600 text-end"><?=$rowdtr->dtrFULLDATE; ?><br class="d-none d-md-block" /><?= $rowdtr->dtrTIMEINPM; ?></p>
                            </div>
                            <div class="timeline-item-bar position-md-relative me-3 me-md-0 border-400">
                              <div class="icon-item icon-item-sm border rounded-7 shadow-none bg-primary-100"><span class="text-primary-600 fs--2" data-feather="log-in"></span></div><span class="timeline-bar border-end border-dashed border-400">  </span>
                            </div>
                          </div>
                          <div class="col">
                            <div class="timeline-item-content ps-6 ps-md-3">
                              <h5 class="fs--1 lh-sm">Time In PM</h5>
                              <p class="fs--1">by <span class="fw-semi-bold text-primary"><?= $rowstudent->firstname." ".$rowstudent->middlename." ".$rowstudent->lastname;?></span></p>
                              <p class="fs--1 text-800 mb-5"></p>
                            </div>
                          </div>                       
                        </div>
 <?php }} ?>    
                      </div>

                    </div>
                  </div>
                </div>
              </div>
              <div class="col-12 col-xl-6 col-xxl-5">
                <div class="card h-100">
                  <div class="card-body">
                    <div class="card-title mb-1">
                      <h3 class="text-1100">Time-Out Log</h3>
                    </div>
                    <p class="text-700 mb-4">Recent 20 time out show here</p>

                    <div class="timeline-vertical timeline-with-details">
                      <div class="timeline-item position-relative">
                        <?php $dtr=mysqli_query($con,"SELECT * from dtr")or die(mysqli_error($con));
    while($rowdtr=mysqli_fetch_object($dtr)){
      $student=mysqli_query($con,"SELECT * from student where StudentID = '$rowdtr->dtrSTUDENTID'")or die(mysqli_error($con));
        $rowstudent=mysqli_fetch_object($student);
      if (!empty($rowdtr->dtrTIMEOUTAM)) {
?>
      
                        <div class="row g-md-3">
                          <div class="col-12 col-md-auto d-flex">
                            <div class="timeline-item-date order-1 order-md-0 me-md-4">
                              <p class="fs--2 fw-semi-bold text-600 text-end"><?=$rowdtr->dtrFULLDATE; ?><br class="d-none d-md-block" /><?= $rowdtr->dtrTIMEOUTAM; ?></p>
                            </div>
                            <div class="timeline-item-bar position-md-relative me-3 me-md-0 border-400">
                              <div class="icon-item icon-item-sm border rounded-7 shadow-none bg-primary-100"><span class="text-primary-600 fs--2" data-feather="log-out"></span></div><span class="timeline-bar border-end border-dashed border-400">  </span>
                            </div>
                          </div>
                          <div class="col">
                            <div class="timeline-item-content ps-6 ps-md-3">
                              <h5 class="fs--1 lh-sm">Time Out AM</h5>
                              <p class="fs--1">by <span class="fw-semi-bold text-primary"><?= $rowstudent->firstname." ".$rowstudent->middlename." ".$rowstudent->lastname;?></span></p>
                              <p class="fs--1 text-800 mb-5"></p>
                            </div>
                          </div>                       
                        </div>
<?php } if (!empty($rowdtr->dtrTIMEOUTPM)) {?>

                        <div class="row g-md-3">
                          <div class="col-12 col-md-auto d-flex">
                            <div class="timeline-item-date order-1 order-md-0 me-md-4">
                              <p class="fs--2 fw-semi-bold text-600 text-end"><?=$rowdtr->dtrFULLDATE; ?><br class="d-none d-md-block" /><?= $rowdtr->dtrTIMEOUTPM; ?></p>
                            </div>
                            <div class="timeline-item-bar position-md-relative me-3 me-md-0 border-400">
                              <div class="icon-item icon-item-sm border rounded-7 shadow-none bg-primary-100"><span class="text-primary-600 fs--2" data-feather="log-out"></span></div><span class="timeline-bar border-end border-dashed border-400">  </span>
                            </div>
                          </div>
                          <div class="col">
                            <div class="timeline-item-content ps-6 ps-md-3">
                              <h5 class="fs--1 lh-sm">Time Out PM</h5>
                              <p class="fs--1">by <span class="fw-semi-bold text-primary"><?= $rowstudent->firstname." ".$rowstudent->middlename." ".$rowstudent->lastname;?></span></p>
                              <p class="fs--1 text-800 mb-5"></p>
                            </div>
                          </div>                       
                        </div>
 <?php }} ?> 
                      </div>
        
                    </div>
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