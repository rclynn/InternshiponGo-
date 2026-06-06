<?php include('../1connection.php'); ?>
<?php include('1session.php'); ?>
<?php 
 if(isset($_GET['workID']) ? $_GET['workID'] : ''){
    $workID = $_GET['workID'];
$work1=mysqli_query($con,"SELECT * from work where workID = '$workID'")or die(mysqli_error($con));
$rowwork1=mysqli_fetch_object($work1);
 }else{
         echo"<script type='text/javascript'>window.location.replace('agency.php');</script>";
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
              <li class="breadcrumb-item"><a href="workplace.php#!">My Job Posted</a></li>
              <li class="breadcrumb-item active"><?= $rowwork1->workNAME; ?></li>
            </ol>
          </nav>
          <div class="mb-9">
            <div class="row align-items-center justify-content-between g-3 mb-4">
              <div class="col-auto">
                <h2 class="mb-0"><?= $rowwork1->workNAME; ?></h2>
              </div>
              <div class="col-auto">
                <div class="row g-3">
                  <div class="col-auto">
                             <!--    <?php if($rowwork1->workSTATUS == 'Active'){?>
                                   <button class="btn btn-phoenix-primary" type="button" data-bs-toggle="modal" data-bs-target="#Disabled"><span class="fa-solid fa-trash-can"></span>Disabled</button>
                                <?php } ?>
                                <?php if($rowwork1->workSTATUS == 'Disabled'){?>
                                   <button class="btn btn-phoenix-primary" type="button" data-bs-toggle="modal" data-bs-target="#Active"><span class="fa-solid fa-trash-can"></span>Active</button>
                                <?php } ?> -->
                    <div class="modal fade" id="Active" tabindex="-1" data-bs-backdrop="static" aria-labelledby="Active" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header bg-success">
                            <h5 class="modal-title text-white" id="Active">Active <?= $rowwork1->workNAME; ?></h5><button class="btn p-1" type="button" data-bs-dismiss="modal" aria-label="Close"><span class="fas fa-times fs--1 text-white"></span></button>
                          </div>
                          <div class="modal-body">
                            <form method="post" action="query.php">
                              <input type="text" name="workID" value="<?= $rowwork1->workID;?>" hidden>
                              <input type="text" name="log" value="<?= $rowagency->agencyPERSONEL ?> of agency name <?= $rowagency->agencyNAME ?> Active the work name <?= $rowwork1->workNAME; ?>" hidden>
                            <p class="text-700 lh-lg mb-0">Are You Sure to Active This?</p>
                            <br>
                            
                          </div>
                          <div class="modal-footer"><button class="btn btn-success" type="submit" name="btnactivejob">Active</button><button class="btn btn-outline-primary" type="button" data-bs-dismiss="modal">Cancel</button></div>
                          </form>
                        </div>
                      </div>
                    </div>
                   
                    <div class="modal fade" id="Disabled" tabindex="-1" data-bs-backdrop="static" aria-labelledby="Disabled" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header bg-warning">
                            <h5 class="modal-title text-white" id="Disabled">Disabled <?= $rowwork1->workNAME; ?></h5><button class="btn p-1" type="button" data-bs-dismiss="modal" aria-label="Close"><span class="fas fa-times fs--1 text-white"></span></button>
                          </div>
                          <div class="modal-body">
                            <form method="post" action="query.php">
                              <input type="text" name="workID" value="<?= $rowwork1->workID;?>" hidden>
                              <input type="text" name="log" value="<?= $rowagency->agencyPERSONEL ?> of agency name <?= $rowagency->agencyNAME ?> disabled the work name <?= $rowwork1->workNAME; ?>" hidden>
                            <p class="text-700 lh-lg mb-0">Are You Sure to Disabled This?</p>
                            <br>
                            
                          </div>
                          <div class="modal-footer"><button class="btn btn-warning" type="submit" name="btndisabledjob">Disabled</button><button class="btn btn-outline-primary" type="button" data-bs-dismiss="modal">Cancel</button></div>
                          </form>
                        </div>
                      </div>
                    </div>

                  </div>
                 
                  <div class="col-auto">

                  <!--   <button class="btn btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#delete"><span class="fa-solid fa-trash-can"></span>Delete</button> -->
                    <div class="modal fade" id="delete" tabindex="-1" data-bs-backdrop="static" aria-labelledby="delete" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header bg-danger">
                            <h5 class="modal-title text-white" id="delete">Delete <?= $rowwork1->workNAME; ?></h5><button class="btn p-1" type="button" data-bs-dismiss="modal" aria-label="Close"><span class="fas fa-times fs--1 text-white"></span></button>
                          </div>
                          <div class="modal-body">
                            <form method="post" action="query.php">
                              <input type="text" name="workID" value="<?= $rowwork1->workID;?>" hidden>
                              <input type="text" name="log" value="<?= $rowagency->agencyPERSONEL ?> of agency name <?= $rowagency->agencyNAME ?> delete the work name <?= $rowwork1->workNAME; ?>" hidden>
                            <p class="text-700 lh-lg mb-0">Are You Sure to Delete This?</p>
                            <br>
                            <div class="form-check">
                              <input class="form-check-input" id="" type="checkbox" value="" required="" />
                              <label class="form-check-label" for="">I understand that deleting this work will remove all the info including interm applicant info, interm progress, etc.</label>
                            </div>
                            <div class="form-check">
                              <input class="form-check-input" id="" type="checkbox" value=""  equired=""/>
                              <label class="form-check-label" for="">I understand that i will not request for back up after i delete this!</label>
                            </div>
                          </div>
                          <div class="modal-footer"><button class="btn btn-danger" type="submit" name="btndeletejob">Delete</button><button class="btn btn-outline-primary" type="button" data-bs-dismiss="modal">Cancel</button></div>
                          </form>
                        </div>
                      </div>
                    </div>

                  </div>
                  
                  
                  <div class="col-auto">
                   <!--  <button class="btn btn-success" type="button" data-bs-toggle="modal" data-bs-target="#Edit">Edit</button> -->
                      <div class="modal fade" id="Edit" tabindex="-1" aria-labelledby="Edit" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="Edit">Update <?= $rowwork1->workNAME; ?></h5><button class="btn p-1" type="button" data-bs-dismiss="modal" aria-label="Close"><span class="fas fa-times fs--1"></span></button>
                            </div>
                            <div class="modal-body">
                              <form method="post" action="query.php">
                              <input type="text" name="workID" value="<?= $rowwork1->workID;?>" hidden>
                              <input type="text" name="log" value="<?= $rowagency->agencyPERSONEL ?> of agency name <?= $rowagency->agencyNAME ?> update the work name <?= $rowwork1->workNAME; ?>" hidden>
                              <div class="form-floating mb-3">
                                <input class="form-control" id="floating1" type="text" placeholder="Name" required="" name="name" value="<?= $rowwork1->workNAME; ?>">
                                <label for="floating1">Name</label>
                              </div>
                             
                             <br>
                            <div class="form-floating">
                              <textarea class="form-control" id="floatingTextarea2" placeholder="Leave a details here" style="height: 100px" required="" name="Details"><?= $rowwork1->workDETAILS; ?></textarea>
                              <label for="floatingTextarea2">Details</label>
                            </div>
                            <br>
                            <div class="alert alert-outline-warning d-flex align-items-center" role="alert">
                              <span class="fa-text-warning fs-3 me-3" data-feather="info"></span>
                              <p class="mb-0 flex-1">Add commas to separate the Qualification list and Duties list! </p>
                              <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            <div class="form-floating">
                              <textarea class="form-control" id="floatingTextarea3" placeholder="Qualifications" style="height: 100px" required="" name="Qualifications"><?= $rowwork1->workQUALIFICATIONS; ?></textarea>
                              <label for="floatingTextarea3">Qualifications</label>
                            </div>
                            <br>
                            <div class="form-floating">
                              <textarea class="form-control" id="floatingTextarea4" placeholder="Duties" style="height: 100px" required="" name="Duties"><?= $rowwork1->workDUTIES; ?></textarea>
                              <label for="floatingTextarea4">Duties</label>
                            </div>
                            <br>
                            <label for="floatingTextarea4">Status</label>
                            <select class="form-select" aria-label="Default select example" required="" name="Status">
                            <option><?= $rowwork1->workSTATUS; ?></option>
                            <option >Active</option>
                            <option >Disabled</option>
                            </select>
                            <br>
                             <div class="form-floating mb-3">
                                <input class="form-control" id="floating5" type="text" placeholder="Number of Traines Needed" required="" name="number" value="<?= $rowwork1->workNUMBER; ?>">
                                <label for="floating5">Number of Traines Needed</label>
                              </div>
                              <?php
                              $tag=mysqli_query($con,"SELECT *  from tag ")or die(mysqli_error($con));
                              while($rowtag=mysqli_fetch_object($tag))
                              {  
                              ?>
                              <div class="form-check form-check-inline">
                                <input class="form-check-input" id="" type="checkbox" name="option[]" value="<?= $rowtag->tagNAME; ?>" />
                                <label class="form-check-label" for=""><?= $rowtag->tagNAME; ?></label>
                              </div>
                             <?php } ?>
                            </div>
                            <div class="modal-footer"><button class="btn btn-primary" type="submit" name="btnupdatejob">Update</button><button class="btn btn-outline-primary" type="button" data-bs-dismiss="modal">Cancel</button></div>
                            </form>
                          </div>
                        </div>
                      </div>

                 </div>
                 

                </div>
              </div>
            </div>
            <div class="row g-5">
              <div class="col-12 col-xxl-4">
                <div class="row g-3">
                  
 <?php 
$i=0;
$agency=mysqli_query($con,"SELECT *  from work where workID ='$workID'")or die(mysqli_error($con));
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
                $usertags = explode(',', $rowagency->worktags);
?>                     
                     
                       <div class="col-12 col-md-7 col-lg-12 col-xl-7">
                        <div class="card h-100 border-success   success-boxshadow bg-success-soft">
                          <div class="bg-holder" style="background-image:url(../assets/img/bg/bg-10.png);background-position:left bottom;background-size:auto;"></div>
                          <!--/.bg-holder-->
                          <div class="card-body d-flex flex-column justify-content-between position-relative z-index-2">
                            <div class="d-flex justify-content-between">
                              <div class="mb-5 mb-md-0 mb-lg-5">
                                <div class="d-sm-flex align-items-center mb-3">
                                  <h3 class="mb-0 mb-"><?= $rowagency->workNAME; ?></h3>
                                </div>
                                <p class="fs--1"><?php echo $rowagency->workDETAILS ?></p>

                                  <?php  foreach($usertags as $keytags){ ?>
                                <span class="badge badge-phoenix badge-phoenix-secondary"><?= $keytags ?></span>
                                <?php } ?>
                                 <?php if($rowagency->workSTATUS == 'Active'){?>
                                  <span class='badge badge-phoenix badge-phoenix-success'><?= $rowagency->workSTATUS; ?></span>
                                <?php } ?>
                                <?php if($rowagency->workSTATUS == 'Disabled'){?>
                                  <span class='badge badge-phoenix badge-phoenix-warning'><?= $rowagency->workSTATUS; ?></span>
                                <?php } ?>
                              </div><img src="../assets/img/spot-illustrations/shield.png" width="54" height="54" alt="" />
                            </div>
                            <div class="row ">
                              <div class="col-5 mb-2 mb-sm-0 mb-md-2 mb-lg-0">
                                 <li class="d-flex align-items-center"><span class="check-circle text-primary me-2" data-feather="users"></span><span class="text-700 fw-semi-bold"><?= "Up to ".$total . " Members"; ?></span></li>
                                 <li class="d-flex align-items-center"><span class="check-circle text-warning me-2" data-feather="user-plus"></span><span class="text-700 fw-semi-bold"><?= "Applied: ". $rowapplicantall. " "; ?></span></li>
                                 <li class="d-flex align-items-center"><span class="check-circle text-success me-2" data-feather="user-check"></span><span class="text-700 fw-semi-bold"><?= "Accepted: ". $rowapplicantacceptedall. " "; ?></span></li>
                                 <hr>
                                 
                                 
                              </div>
                              <div class="col-sm-7 col-md-12 col-lg-7">
                                <div class="d-sm-flex d-md-block d-lg-flex justify-content-end align-items-end h-100">
                                  <ul class="list-unstyled mb-0 border-start-sm border-start-md-0 border-start-lg ps-sm-5 ps-md-0 ps-lg-5 border-200">
                                    <?php 
                                    $userArray = explode(',', $rowagency->workQUALIFICATIONS);

                                      foreach($userArray as $key){
                                      ?>
                                      <li class="d-flex align-items-center"><span class="check-circle text-success me-2" data-feather="check-circle"></span><span class="text-500 fw-semi-bold"><?= $key ?></span></li>

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


                      <div class="col-12 col-md-5 col-xxl-12">
                    <div class="card h-100">
                      <div class="card-body pb-3">
                        <div class="d-flex align-items-center mb-3">
                          <h3 class="me-1">Duties and Responsibility</h3>
                        </div>
                        
                                  <ul class="list-unstyled mb-0 border-start-sm border-start-md-0 border-start-lg ps-sm-5 ps-md-0 ps-lg-5 border-200">
                                    <?php 
                                    $userArray2 = explode(',', $rowagency->workDUTIES);

                                      foreach($userArray2 as $key2){
                                      ?>
                                      <li class="d-flex align-items-center"><span class="check-circle text-success me-2" data-feather="check-circle"></span><span class="text-500 fw-semi-bold"><?= $key2 ?></span></li>

                                    <?php 
                                      }
                                     ?>

                                  
                                  </ul>
                                

                      </div>
                    </div>
                  </div>
<?php } ?>   
                  
        
               
            </div>
          </div>
          
         <?php include('1footer.php'); ?>           
        </div>
      </div>
    </main><!-- ===============================================-->
    <!--    End of Main Content-->
    <!-- ===============================================-->

     <script language="javascript">
        function printdiv(printpage) {
            var headstr = "<html><head><title></title></head><body>";
            var footstr = "</body>";
            var newstr = document.all.item(printpage).innerHTML;
            var oldstr = document.body.innerHTML;
            document.body.innerHTML = headstr + newstr + footstr;
            window.print();
            document.body.innerHTML = oldstr;
            return false;
        }
    </script>

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