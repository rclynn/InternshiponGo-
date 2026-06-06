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
                <?php $countnew=mysqli_query($con,"SELECT * FROM student")or die(mysqli_error($con)); 
                $rowcountnew= mysqli_num_rows( $countnew ); ?>
                <div class="card bg-success col-12 col-sm-6 col-md-3 col-lg-6 col-xl-3 col-xxl-12" style="padding-bottom: 30px; padding-top: 30px;">
                  <div class="d-flex align-items-center"><span class="ftext-success-500" data-feather="users"></span>
                    <div class="ms-2">
                      <h2 class="mb-0"><?= $rowcountnew;?><span class="fs-1 fw-semi-bold text-900 ms-2">Students</span></h2>
                      <p class="text-800 fs--1 mb-0">Working hard</p>
                    </div>
                  </div>
                </div>
                 <?php $countjournal=mysqli_query($con,"SELECT * FROM studentjournal ")or die(mysqli_error($con)); 
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

              <div class="col-12 col-xl-12 col-xxl-12">
                <div class="card h-100">
                  <div class="card-body">
                    <div class="card-title mb-1">
                      <h3 class="text-1100">History Log</h3>
                    </div>
                    
<?php  
$historylog=mysqli_query($con,"SELECT *  from historylog order by historylogID Desc ")or die(mysqli_error($con));
              while($rowhistorylog=mysqli_fetch_object($historylog))
              {  
?>

          <div class="d-flex align-items-center justify-content-between py-3 border-300 px-lg-6 px-4 notification-card border-top read">
            <div class="d-flex">
<?php if($rowhistorylog->loghistoryCOLOR=='text-danger') { ?>
              <div class="avatar avatar-xl me-3"><img class="rounded-circle" src="../assets/img/delete.webp" alt=""></div>
<?php } else if($rowhistorylog->loghistoryCOLOR=='text-success') { ?>
              <div class="avatar avatar-xl me-3"><img class="rounded-circle" src="../assets/img/Accept.webp" alt=""></div>
<?php } else if($rowhistorylog->loghistoryCOLOR=='text-warning') { ?>
              <div class="avatar avatar-xl me-3"><img class="rounded-circle" src="../assets/img/Disabled.webp" alt=""></div>
<?php } else { ?>
              <div class="avatar avatar-xl me-3"><img class="rounded-circle" src="../assets/img/empty.webp" alt=""></div>
<?php } ?>


              <div class="me-3 flex-1 mt-2">
<?php if($rowhistorylog->loghistoryCOLOR=='text-danger') { ?>
                <h4 class="fs--1 text-black">Deleted</h4>
<?php }  else if($rowhistorylog->loghistoryCOLOR=='text-success') { ?>
                <h4 class="fs--1 text-black">Activited</h4>
<?php }  else if($rowhistorylog->loghistoryCOLOR=='text-warning') { ?>
                <h4 class="fs--1 text-black">Disabled</h4>
<?php } else { ?>
              <h4 class="fs--1 text-black">Undifined</h4>
<?php } ?>

                <p class="fs--1 text-1000"><?= $rowhistorylog->historylogINFO; ?></p>
                <p class="text-800 fs--1 mb-0"><svg class="svg-inline--fa fa-clock me-1" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="clock" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M256 512C114.6 512 0 397.4 0 256C0 114.6 114.6 0 256 0C397.4 0 512 114.6 512 256C512 397.4 397.4 512 256 512zM232 256C232 264 236 271.5 242.7 275.1L338.7 339.1C349.7 347.3 364.6 344.3 371.1 333.3C379.3 322.3 376.3 307.4 365.3 300L280 243.2V120C280 106.7 269.3 96 255.1 96C242.7 96 231.1 106.7 231.1 120L232 256z"></path></svg><!-- <span class="me-1 fas fa-clock"></span> Font Awesome fontawesome.com --><span class="fw-bold"><?= $rowhistorylog->historylogDATE; ?></span></p>
              </div>
            </div>
            
          </div>
<?php 
}
?>          
                      
        
                   
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