<?php include('../1connection.php'); ?>
<?php include('1session.php'); ?>
<?php 
 if(isset($_GET['coordinatorID']) ? $_GET['coordinatorID'] : ''){
    $coordinatorID = $_GET['coordinatorID'];
$agency=mysqli_query($con,"SELECT * from agency where agencyID = '$coordinatorID'")or die(mysqli_error($con));
      $rowsagency=mysqli_fetch_object($agency);
 }else{
         echo"<script type='text/javascript'>window.location.replace('errors-404.php');</script>";
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
       <?php include('1navbarleft.php'); ?>
        <?php include('1navbartop.php'); ?> 
        
       <div class="content">
          <nav class="mb-2" aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
              <li class="breadcrumb-item active"><a href="">Coordinator</a></li>
              <li class="breadcrumb-item ">View Coordinator</li>
              
            </ol>
          </nav>
          <h2 class="text-bold text-1100 mb-5">View Coordinator</h2>
          <div id="members" data-list='{"valueNames":["customer","email","mobile_number","city","last_active","joined"],"page":10,"pagination":true}'>
            <div class="row align-items-center justify-content-between g-3 mb-3">
              
              <div class="row g-5">
              <div class="col-12 col-xxl-4">
                <div class="row g-3">
                  <div class="col-12 col-md-7 col-xxl-12">
                    <div class="card h-100">
                      <div class="card-body d-flex flex-column justify-content-between pb-3">
                        <div class="row align-items-center g-5 mb-3 text-center text-sm-start">
                          <div class="col-12 col-sm-auto mb-sm-2">
                            <div class="avatar avatar-5xl"><img class="rounded-circle" src="../assets/img/user/<?= $rowsagency->agencyIMG?>" alt="" /></div>
                          </div>
                          <div class="col-12 col-sm-auto flex-1">
                            <h3><?= $rowsagency->agencyPERSONEL?></h3>
                            
                            <p class="" style="margin-bottom: 0px;"><b> Agency: <?= $rowsagency->agencyNAME?> </b></p>
                           
                            <div><a class="me-2" href=""><span class="fab fa-linkedin-in text-400 hover-primary"></span></a><a class="me-2" href=""><span class="fab fa-facebook text-400 hover-primary"></span></a><a href=""><span class="fab fa-twitter text-400 hover-primary"></span></a></div>
                          </div>
                        </div>
                        <div class="d-flex flex-between-center border-top border-dashed border-300 pt-4">
                          <div>
                            <?php
                            $dtr=mysqli_query($con,"SELECT * from work where workAGENCYID = '$coordinatorID'")or die(mysqli_error($con));
                            $rowdtr= mysqli_num_rows( $dtr );
                            ?>
                            <h6>Work Post</h6>
                            <p class="fs-1 text-800 mb-0"><?= $rowdtr; ?></p>
                          </div>
                          <!-- <div>
                            <h6>Projects</h6>
                            <p class="fs-1 text-800 mb-0">56</p>
                          </div>
                          <div>
                            <h6>Completion</h6>
                            <p class="fs-1 text-800 mb-0">97</p>
                          </div> -->
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-12 col-md-5 col-xxl-12">
                    <div class="card h-100">
                      <div class="card-body pb-3">
                        <div class="d-flex align-items-center mb-3">
                          <h3 class="me-1">Basic Info</h3>
                         <!--  <button class="btn btn-link p-0" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><span class="fas fa-pen fs-0 ms-3 text-500"></span></button> -->

                          <div class="modal fade" id="staticBackdrop" tabindex="-1" data-bs-backdrop="static" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header bg-primary">
                                <h5 class="modal-title text-white" id="staticBackdropLabel">Edit Basic Info</h5><button class="btn p-1" type="button" data-bs-dismiss="modal" aria-label="Close"><span class="fas fa-times fs--1 text-white"></span></button>
                              </div>
                              <form method="post" action="query.php">
                              <div class="modal-body">
                                  <input type="text" name="coordinatorID" value="<?= $coordinatorID; ?>" hidden>
                                  <div class="mb-0">
                                    <label class="form-label" for="exampleFormControlInput1">Address</label>
                                    <input class="form-control" id="exampleFormControlInput1" type="text" name="address" value="<?= $rowsagency->agencyLOCATION?>">  
                                  </div>
                                  <div class="mb-0" style="margin-top: 0px;">
                                    <label class="form-label" for="exampleFormControlInput3">Contact Number</label>
                                    <input class="form-control" id="exampleFormControlInput3" type="text" value="<?= $rowsagency->agencyCONTACT?>" name="number">  
                                  </div>
                               
                              </div>
                              <div class="modal-footer"><button class="btn btn-primary" type="submit" name="btnupdateinfo" >Update</button><a class="btn btn-outline-primary" type="button" data-bs-dismiss="modal">Cancel</a></div>
                            </div>
                            </form>
                          </div>
                        </div>
                        </div>
                        <h5 class="text-800">Address</h5>
                        <p class="text-800"><?= $rowsagency->agencyLOCATION?></p>
                         <h5 class="text-800">Contact number</h5>
                        <p class="text-800"><?= $rowsagency->agencyCONTACT?></p>

                      </div>
                    </div>
                  </div>
                  <div class="col-12 col-xxl-6">
                    <div class="card ">
                      <div class="card-body">
                        <a href="viewcoordinator.php?coordinatorID=<?= $coordinatorID; ?>" class="btn btn-secondary">Work Posted</a><a href="viewcoordinatorstudents.php?coordinatorID=<?= $coordinatorID; ?>" class="btn btn-primary" style="margin-left: 10px;">Student Hired</a>
                      </div>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="card">
                      <div class="card-body">
                        <h2 class="text-bold text-1100 mb-5">Work Posted</h2>
                        <div class="row">
                                <?php 

                        $agency=mysqli_query($con,"SELECT *  from work where workAGENCYID='$coordinatorID'")or die(mysqli_error($con));
                        while($rowagency=mysqli_fetch_object($agency))
                        {  

                          $applicantall=mysqli_query($con,"SELECT * from applicant where applicantWORK = '$rowagency->workID'")or die(mysqli_error($con));
                          $rowapplicantall= mysqli_num_rows($applicantall);
                         
                           $applicantacceptedall=mysqli_query($con,"SELECT * from applicant where applicantWORK = '$rowagency->workID' and applicantSTATUS='Accepted'")or die(mysqli_error($con));
                          $rowapplicantacceptedall= mysqli_num_rows($applicantacceptedall);
                          if (!empty($rowapplicantaccepted)) {
                            $i=1;
                          }
                          $total=$rowagency->workNUMBER-$rowapplicantacceptedall;
          ?>                     
                               
                                 <div class="col-12 col-md-6 col-lg-12 col-xl-6">
                                  <div class="card h-100 border-success success-boxshadow bg-success-soft">
                                    <div class="bg-holder" style="background-image:url(../assets/img/bg/bg-10.png);background-position:left bottom;background-size:auto;"></div>
                                    <!--/.bg-holder-->
                                    <div class="card-body d-flex flex-column justify-content-between position-relative z-index-2">
                                      <div class="d-flex justify-content-between">
                                        <div class="mb-5 mb-md-0 mb-lg-5">
                                          <div class="d-sm-flex align-items-center mb-3">
                                            <h3 class="mb-0 mb-"><?= $rowagency->workNAME; ?></h3>
                                          </div>
                                          <p class="fs--1"><?= $rowagency->workDETAILS; ?></p>
                                        </div><img src="../assets/img/spot-illustrations/shield.png" width="54" height="54" alt="" />
                                      </div>
                                      <div class="row ">
                                        <div class="col-5 mb-2 mb-sm-0 mb-md-2 mb-lg-0">
                                           
                                            <li class="d-flex align-items-center"><span class="check-circle text-primary me-2" data-feather="users"></span><span class="text-700 fw-semi-bold"><?= "Up to ".$total . " Members"; ?></span></li>
                                           <li class="d-flex align-items-center"><span class="check-circle text-warning me-2" data-feather="user-plus"></span><span class="text-700 fw-semi-bold"><?= "Applied: ". $rowapplicantall. " "; ?></span></li>
                                           <li class="d-flex align-items-center"><span class="check-circle text-success me-2" data-feather="user-check"></span><span class="text-700 fw-semi-bold"><?= "Accepted: ". $rowapplicantacceptedall. " "; ?></span></li>
                                          
                                        </div>
                                        <div class="col-sm-7 col-md-12 col-lg-7">
                                          <div class="d-sm-flex d-md-block d-lg-flex justify-content-end align-items-end h-100">
                                            <ul class="list-unstyled mb-0 border-start-sm border-start-md-0 border-start-lg ps-sm-5 ps-md-0 ps-lg-5 border-200">
                                              <?php 
                                              $userArray = explode(',', $rowagency->workQUALIFICATIONS);

                                                foreach($userArray as $key){
                                                ?>
                                                <li class="d-flex align-items-center"><span class="check-circle text-success me-2" data-feather="check-circle"></span><span class="text-700 fw-semi-bold"><?= $key; ?></span></li>

                                              <?php 
                                                }
                                               ?>

                                            
                                            </ul>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
          <?php } ?>            
                        </div>
                      </div>
                    </div>
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