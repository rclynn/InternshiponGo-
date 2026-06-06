<?php include('../1connection.php'); ?>
<?php include('1session.php'); ?>
<?php 
 if(isset($_GET['coordinatorID']) ? $_GET['coordinatorID'] : ''){
    $agencyID = $_GET['coordinatorID'];
$agency=mysqli_query($con,"SELECT * from agency where agencyID = '$agencyID'")or die(mysqli_error($con));
      $rowagency=mysqli_fetch_object($agency);
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
              <li class="breadcrumb-item active"><a href="">View Profile</a></li>
              
              
            </ol>
          </nav>
          <div class="row align-items-center justify-content-between g-3 mb-4">
              <div class="col-auto">
                <h2 class="mb-0">View Profile of <i><?= $rowagency->agencyPERSONEL?></i></h2>
              </div>
              <div class="col-auto">
                <div class="row g-3">
                  <div class="col-auto">
                                <?php if($rowagency->agencySTATUS == 'Active'){?>
                                   <button class="btn btn-phoenix-primary" type="button" data-bs-toggle="modal" data-bs-target="#Disabled"><span class="fa-solid fa-trash-can"></span>Disabled</button>
                                <?php } ?>
                                <?php if($rowagency->agencySTATUS == 'Disabled'){?>
                                   <button class="btn btn-phoenix-primary" type="button" data-bs-toggle="modal" data-bs-target="#Active"><span class="fa-solid fa-trash-can"></span>Active</button>
                                <?php } ?>
                    <div class="modal fade" id="Active" tabindex="-1" data-bs-backdrop="static" aria-labelledby="Active" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header bg-success">
                            <h5 class="modal-title text-white" id="Active">Active <?= $rowagency->agencyPERSONEL?></h5><button class="btn p-1" type="button" data-bs-dismiss="modal" aria-label="Close"><span class="fas fa-times fs--1 text-white"></span></button>
                          </div>
                          <div class="modal-body">
                            <form method="post" action="query.php">
                               <input type="text" name="agencyID" value="<?= $rowagency->agencyID;?>" hidden>
                              <input type="text" name="log" value="Admin  Active the account of <?= $rowagency->agencyPERSONEL?>" hidden>
                            <p class="text-700 lh-lg mb-0">Are You Sure to Active This?</p>
                            <br>
                            <div class="form-check">
                              <input class="form-check-input" id="" type="checkbox" value="" required="" />
                              <label class="form-check-label" for="">I understand that Activiting this account will continue interm applicant progress.</label>
                            </div>
                          </div>
                          <div class="modal-footer"><button class="btn btn-success" type="submit" name="btnactiveagency">Active</button><button class="btn btn-outline-primary" type="button" data-bs-dismiss="modal">Cancel</button></div>
                          </form>
                        </div>
                      </div>
                    </div>
                   
                    <div class="modal fade" id="Disabled" tabindex="-1" data-bs-backdrop="static" aria-labelledby="Disabled" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header bg-warning">
                            <h5 class="modal-title text-white" id="Disabled">Disabled <?= $rowagency->agencyPERSONEL?></h5><button class="btn p-1" type="button" data-bs-dismiss="modal" aria-label="Close"><span class="fas fa-times fs--1 text-white"></span></button>
                          </div>
                          <div class="modal-body">
                            <form method="post" action="query.php">
                              <input type="text" name="agencyID" value="<?= $rowagency->agencyID;?>" hidden>
                              <input type="text" name="log" value="Admin  disabled the account of <?= $rowagency->agencyPERSONEL?>" hidden>
                            <p class="text-700 lh-lg mb-0">Are You Sure to Disabled This?</p>
                            <br>
                            <div class="form-check">
                              <input class="form-check-input" id="" type="checkbox" value="" required="" />
                              <label class="form-check-label" for="">I understand that Disabling this account will stop interm applicant  progress.</label>
                            </div>
                            
                          </div>
                          <div class="modal-footer"><button class="btn btn-warning" type="submit" name="btndisabledagency">Disabled</button><button class="btn btn-outline-primary" type="button" data-bs-dismiss="modal">Cancel</button></div>
                          </form>
                        </div>
                      </div>
                    </div>

                  </div>
                 
                  <div class="col-auto">

                    <button class="btn btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#delete"><span class="fa-solid fa-trash-can"></span>Delete</button>
                    <div class="modal fade" id="delete" tabindex="-1" data-bs-backdrop="static" aria-labelledby="delete" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header bg-danger">
                            <h5 class="modal-title text-white" id="delete">Delete <?= $rowagency->agencyPERSONEL?></h5><button class="btn p-1" type="button" data-bs-dismiss="modal" aria-label="Close"><span class="fas fa-times fs--1 text-white"></span></button>
                          </div>
                          <div class="modal-body">
                            <form method="post" action="query.php">
                              <input type="text" name="agencyID" value="<?= $rowagency->agencyID;?>" hidden>
                              <input type="text" name="log" value="Admin  delete the account of <?= $rowagency->agencyPERSONEL?>" hidden>
                            <p class="text-700 lh-lg mb-0">Are You Sure to Delete This?</p>
                            <br>
                            <div class="form-check">
                              <input class="form-check-input" id="" type="checkbox" value="" required="" />
                              <label class="form-check-label" for="">I understand that deleting this account will remove all the info including interm applicant  progress, etc.</label>
                            </div>
                            <div class="form-check">
                              <input class="form-check-input" id="" type="checkbox" value=""  equired=""/>
                              <label class="form-check-label" for="">I understand that i will not request for back up after i delete this!</label>
                            </div>
                          </div>
                          <div class="modal-footer"><button class="btn btn-danger" type="submit" name="btndeleteagency">Delete</button><button class="btn btn-outline-primary" type="button" data-bs-dismiss="modal">Cancel</button></div>
                          </form>
                        </div>
                      </div>
                    </div>

                  </div>
                  
                  
                 
                 

                </div>
              </div>
            </div>
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
                            <div class="avatar avatar-5xl">
                               <div class="d-flex align-items-center mb-3">
                              <img class="rounded-circle" src="../assets/img/user/<?= $rowagency->agencyIMG?>" alt="" />
                              <button class="btn btn-link p-0" data-bs-toggle="modal" data-bs-target="#editimage"><span class="fas fa-pen fs-0 ms-3 text-500"></span></button>

                                     <div class="modal fade" id="editimage" tabindex="-1" data-bs-backdrop="static" aria-labelledby="editimage" aria-hidden="true">
                                      <div class="modal-dialog">
                                        <div class="modal-content">
                                          <div class="modal-header bg-primary">
                                            <h5 class="modal-title text-white" id="editimage">Edit Image</h5><button class="btn p-1" type="button" data-bs-dismiss="modal" aria-label="Close"><span class="fas fa-times fs--1 text-white"></span></button>
                                          </div>
                                          <form method="post" action="query.php" enctype="multipart/form-data">
                                          <div class="modal-body">
                                            <center>
                                            <img class="rounded-circle" src="../assets/img/user/<?= $rowagency->agencyIMG?>" alt="" style="height: 200px;width: 200px;"/>
                                             <input type="text" name="picturea" value="<?= $rowagency->agencyIMG?>" hidden>
                                            </center>
                                              <input type="text" name="agencyID" value="<?= $rowagency->agencyID;?>" hidden>
                                              <div class="mb-0">
                                                <label class="form-label" for="exampleFormControlInput1">Image</label>
                                                <input class="form-control" id="exampleFormControlInput1" type="file" accept="image/*" name="pic" value="">  
                                              </div>
                                          </div>
                                          <div class="modal-footer"><button class="btn btn-primary" type="submit" name="btnupdateimagecoor" >Update</button><a class="btn btn-outline-primary" type="button" data-bs-dismiss="modal">Cancel</a></div>
                                        </div>
                                        </form>
                                      </div>
                                    </div>

                            </div>
                          </div>
                          </div>
                          <div class="col-12 col-sm-auto flex-1">
                            <h3><?= $rowagency->agencyPERSONEL?> <button class="btn btn-link p-0" data-bs-toggle="modal" data-bs-target="#editname"><span class="fas fa-pen fs-0 ms-3 text-500"></span></button></h3>
                            <div class="modal fade" id="editname" tabindex="-1" data-bs-backdrop="static" aria-labelledby="editname" aria-hidden="true">
                                      <div class="modal-dialog">
                                        <div class="modal-content">
                                          <div class="modal-header bg-primary">
                                            <h5 class="modal-title text-white" id="editname">Edit Name</h5><button class="btn p-1" type="button" data-bs-dismiss="modal" aria-label="Close"><span class="fas fa-times fs--1 text-white"></span></button>
                                          </div>
                                          <form method="post" action="query.php" >
                                          <div class="modal-body">
                                           <div class="mb-0" style="margin-top: 0px;">
                                            <label class="form-label" for="">Full Name</label>
                                            <input class="form-control" id="" type="text" value="<?= $rowagency->agencyPERSONEL?>" name="name">  
                                          </div>
                                          
                                           <input type="text" name="agencyID" value="<?= $rowagency->agencyID;?>" hidden>
                                          </div>
                                          <div class="modal-footer"><button class="btn btn-primary" type="submit" name="btnupdatenamecoor" >Update</button><a class="btn btn-outline-primary" type="button" data-bs-dismiss="modal">Cancel</a></div>
                                        </div>
                                        </form>
                                      </div>
                                    </div>
                            
                            <p class="" style="margin-bottom: 0px;"><b> Agency: <?= $rowagency->agencyNAME?> </b><?php if($rowagency->agencySTATUS=='Active'){ ?>
                            <span class="badge badge-phoenix badge-phoenix-success">Active</span>
                            <?php } ?>
                            <?php if($rowagency->agencySTATUS=='Disabled'){ ?>
                            <span class="badge badge-phoenix badge-phoenix-warning">Disabled</span>
                            <?php } ?></p>
                           
                            <div><a class="me-2" href=""><span class="fab fa-linkedin-in text-400 hover-primary"></span></a><a class="me-2" href=""><span class="fab fa-facebook text-400 hover-primary"></span></a><a href=""><span class="fab fa-twitter text-400 hover-primary"></span></a></div>
                          </div>
                        </div>
                        <div class=" border-top border-dashed border-300 pt-4">
                            <div class="d-flex align-items-center mb-3">
                               <h3 class="me-1">Security Questions</h3>
                                <button class="btn btn-link p-0" data-bs-toggle="modal" data-bs-target="#securityquestions"><span class="fas fa-pen fs-0 ms-3 text-500"></span></button>
                            </div>

                                     <div class="modal fade" id="securityquestions" tabindex="-1" data-bs-backdrop="static" aria-labelledby="securityquestions" aria-hidden="true">
                                      <div class="modal-dialog">
                                        <div class="modal-content">
                                          <div class="modal-header bg-primary">
                                            <h5 class="modal-title text-white" id="securityquestions">Security Info</h5><button class="btn p-1" type="button" data-bs-dismiss="modal" aria-label="Close"><span class="fas fa-times fs--1 text-white"></span></button>
                                          </div>
                                          <form method="post" action="query.php" enctype="multipart/form-data">
                                          <div class="modal-body">
                                          <div class="mb-0">
                                            <label class="form-label" for="">Security Questions</label>
                                             <select class="form-select" aria-label="" name="questions">
                                                <option>In what city were you born?</option>
                                                <option>What is the name of your favorite pet?</option>
                                                <option>What is your mother's maiden name?</option>
                                                <option>What high school did you attend?</option>
                                                <option>What was the name of your elementary school?</option>
                                                <option>What was the make of your first car?</option>
                                                <option>What was your favorite food as a child?</option>
                                              </select>
                                          </div>
                                           <div class="mb-0">
                                            <label class="form-label" for="">Answer</label>
                                            <textarea class="form-control" id="" rows="3" name="answer"></textarea>
                                          </div>
                                          </div>
                                          <input type="text" name="agencyID" value="<?= $agencyID;?>" hidden>
                                          <div class="modal-footer"><button class="btn btn-primary" type="submit" name="btnsecurityquestionscoor" >Submit</button><a class="btn btn-outline-primary" type="button" data-bs-dismiss="modal">Cancel</a></div>
                                        </div>
                                        </form>
                                      </div>
                                    </div>

                        <?php 
                              $securityQA=mysqli_query($con,"SELECT * from securityquestions where securityquestionsUSERID = '$agencyID' and securityquestionsUSERTYPE = 'agency'")or die(mysqli_error($con));
                              $rowsecurityQA=mysqli_fetch_object($securityQA);

                              if (empty($rowsecurityQA)) {
                        ?>
                              <div class="alert alert-outline-danger" role="alert">Please Add Security Question For Reseting Your Password!</div>
                        <?php
                              }else{
                        ?>
                              <div class="alert alert-outline-success" role="alert"><?=$rowsecurityQA->securityquestionsQ;?></div>
                        <?php
                              }
                        ?>
                        </div>
                        <div class="d-flex flex-between-center border-top border-dashed border-300 pt-4">
                          <div>
                            <?php
                            $dtr=mysqli_query($con,"SELECT * from work where workAGENCYID = '$rowagency->agencyID'")or die(mysqli_error($con));
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
                          <button class="btn btn-link p-0" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><span class="fas fa-pen fs-0 ms-3 text-500"></span></button>

                          <div class="modal fade" id="staticBackdrop" tabindex="-1" data-bs-backdrop="static" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header bg-primary">
                                <h5 class="modal-title text-white" id="staticBackdropLabel">Edit Basic Info</h5><button class="btn p-1" type="button" data-bs-dismiss="modal" aria-label="Close"><span class="fas fa-times fs--1 text-white"></span></button>
                              </div>
                              <form method="post" action="query.php">
                              <div class="modal-body">
                                  <input type="text" name="coordinatorID" value="<?= $rowagency->agencyID; ?>" hidden>
                                  <div class="mb-0">
                                    <label class="form-label" for="exampleFormControlInput1">Address</label>
                                    <input class="form-control" id="exampleFormControlInput1" type="text" name="address" value="<?= $rowagency->agencyLOCATION?>">  
                                  </div>
                                  <div class="mb-0" style="margin-top: 0px;">
                                    <label class="form-label" for="exampleFormControlInput3">Contact Number</label>
                                    <input class="form-control" id="exampleFormControlInput3" type="text" value="<?= $rowagency->agencyCONTACT?>" name="number">  
                                  </div>
                               
                              </div>
                              <div class="modal-footer"><button class="btn btn-primary" type="submit" name="btnupdateinfocoor" >Update</button><a class="btn btn-outline-primary" type="button" data-bs-dismiss="modal">Cancel</a></div>
                            </div>
                            </form>
                          </div>
                        </div>
                        </div>
                        <h5 class="text-800">Address</h5>
                        <p class="text-800"><?= $rowagency->agencyLOCATION?></p>
                         <h5 class="text-800">Contact number</h5>
                        <p class="text-800"><?= $rowagency->agencyCONTACT?></p>
                        <div class="d-flex align-items-center mb-3">

                          <h3 class="me-1">Security Info</h3>
                          <button class="btn btn-link p-0" data-bs-toggle="modal" data-bs-target="#staticBackdrop2"><span class="fas fa-pen fs-0 ms-3 text-500"></span></button>
                        </div>
                        <div class="modal fade" id="staticBackdrop2" tabindex="-1" data-bs-backdrop="static" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header bg-primary">
                                <h5 class="modal-title text-white" id="staticBackdropLabel">Edit Security Info</h5><button class="btn p-1" type="button" data-bs-dismiss="modal" aria-label="Close"><span class="fas fa-times fs--1 text-white"></span></button>
                              </div>
                              <form method="post" action="query.php">
                              <div class="modal-body">
                                 
                                  <div class="mb-0">
                                    <label class="form-label" for="exampleFormControlInput1">Username</label>
                                    <input class="form-control" id="exampleFormControlInput1" type="text" name="username" value="<?= $rowagency->agencyUSERNAME; ?>" required >  
                                  </div>
                                  <div class="mb-0" style="margin-top: 0px;">
                                    <label class="form-label" for="exampleFormControlInput3">Password</label>
                                    <input class="form-control" id="exampleFormControlInput3" type="password" value="<?= $rowagency->agencyPASSWORD; ?>" name="password" required="">  
                                  </div>
                               <input type="text" name="agencyID" value="<?= $rowagency->agencyID;?>" hidden>
                              </div>
                              <div class="modal-footer"><button class="btn btn-primary" type="submit" name="btnupdatesecuritycoor" >Update</button><a class="btn btn-outline-primary" type="button" data-bs-dismiss="modal">Cancel</a></div>
                            </div>
                            </form>
                          </div>
                        </div>
                         <h5 class="text-800">Username</h5>
                          <p class="text-800"><?= $rowagency->agencyUSERNAME; ?></p>
                          <h5 class="text-800">Password</h5>
                          <p class="text-800">**********</p>
                      </div>
                    </div>
                  </div>
                  <div class="col-12">
            
                        <h2 class="text-bold text-1100 mb-5">Work Posted</h2>
                        <div class="row">
                                <?php 

                        $agency=mysqli_query($con,"SELECT *  from work where workAGENCYID='$rowagency->agencyID'")or die(mysqli_error($con));
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
                               
                                 <div class="col-12 col-md-6 col-lg-12 col-xl-6" style="margin-top: 30px;">
                                  <div class="card h-100 border-success success-boxshadow bg-success-soft">
                                    <div class="bg-holder" style="background-image:url(../assets/img/bg/bg-10.png);background-position:left bottom;background-size:auto;"></div>
                                    <!--/.bg-holder-->
                                    <div class="card-body d-flex flex-column justify-content-between position-relative z-index-2">
                                      <div class="d-flex justify-content-between">
                                        <div class="mb-5 mb-md-0 mb-lg-5">
                                          <div class="d-sm-flex align-items-center mb-3">
                                            <h3 class="mb-0 mb-"><?= $rowagency->workNAME?></h3>
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