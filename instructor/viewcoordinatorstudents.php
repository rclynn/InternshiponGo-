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
                        <a href="viewcoordinator.php?coordinatorID=<?= $coordinatorID; ?>" class="btn btn-primary">Work Posted</a><a href="viewcoordinatorstudents.php?coordinatorID=<?= $coordinatorID; ?>" class="btn btn-secondary" style="margin-left: 10px;">Student Hired</a>
                      </div>
                    </div>
                  </div>
                  <div class="col-12 col-xxl-6">
            <div class="card ">
            <div class="card-body"> 
            <h2 class="text-bold text-1100 mb-5">Student Hired</h2>     
            <div id="members" data-list='{"valueNames":["id","name","mobile_number","images","Coodinator","Course","Colleges","classyear","rate"],"page":10,"pagination":true}'>
            <div class="row ">
              <div class="col-12 col-xxl-6">
                <div class="search-box">
                  <form class="position-relative" data-bs-toggle="search" data-bs-display="static"><input class="form-control search-input search" type="search" placeholder="Search Intern" aria-label="Search" />
                    <span class="fas fa-search search-box-icon"></span>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-12 col-xxl-6">
              <div class="table-responsive scrollbar ms-n1 ps-1">
                <table class="table table-sm fs--1 mb-0">
                  <thead>
                    <tr>
                      <th class="sort align-middle" scope="col" data-sort="name" >Intern Name</th>
                      <th class="sort align-middle" scope="col" data-sort="images" >Images</th>
                      <th class="sort align-middle  pe-0" scope="col" data-sort="Course" >Course</th>
                      <th class="sort align-middle  pe-0" scope="col" data-sort="Colleges" >School</th>
                      <th class="sort align-middle  pe-0" scope="col" data-sort="classyear" >Class Year</th>
                      <th data-sort="rate">Status</th>
                      <th>View</th>
                    </tr>
                  </thead>
                  <tbody class="list" id="table-latest-review-body">
<?php 

$student=mysqli_query($con,"SELECT *  from student where agency = '$rowsagency->agencyNAME' and status !='Deleted'")or die(mysqli_error($con));
              while($rowstudents=mysqli_fetch_object($student))
              {  
?>

                    <tr class="hover-actions-trigger btn-reveal-trigger position-static">
                       <td class="name align-middle white-space-nowrap"><a class="fw-semi-bold text-1100" href=""><?= $rowstudents->firstname." ".$rowstudents->middlename." ".$rowstudents->lastname?></a></td>
                      <td class="images align-middle white-space-nowrap">
                          <div class="avatar avatar-m"><img class="rounded-circle" src="../assets/img/user/<?= $rowstudents->picture?>" alt="" /></div>
                        </td>
                      <td class="Course align-middle white-space-nowrap text-900"><?= $rowstudents->department?></td>
                      <td class="Colleges align-middle  white-space-nowrap text-700"><?= $rowstudents->colleges?></td>
                      <td class="classyear align-middle white-space-nowrap text-700 "><?= $rowstudents->classyear?></td>
                      <?php $a1=mysqli_query($con,"SELECT * from personality where personalitySTUDENTID = '$rowstudents->StudentID'")or die(mysqli_error($con));
                        $rowa1=mysqli_fetch_object($a1);
                        $a2=mysqli_query($con,"SELECT * from professionalskills where ProfessionalSkillsSTUDENTID = '$rowstudents->StudentID'")or die(mysqli_error($con));
                        $rowa2=mysqli_fetch_object($a2);
                        $a3=mysqli_query($con,"SELECT * from technicalskills where TechnicalSkillsSTUDENTID = '$rowstudents->StudentID'")or die(mysqli_error($con));
                        $rowa3=mysqli_fetch_object($a3);
                        if (empty($rowa1)||empty($rowa2)||empty($rowa3)) {
                         
                        ?>
                      <td class="rate align-middle white-space-nowrap text-700  text-danger"><b>Rate Me</b></td>
                      <?php  }else{?>
                        <td class="rate align-middle white-space-nowrap text-700  text-success"><b>Rated</b></td>
                      <?php  }?>
                      <td class="classyear align-middle white-space-nowrap text-700 "><a href="viewstudents.php?studentID=<?= $rowstudents->StudentID?>" class="btn btn-primary">View</a></td>
                    </tr>
                   
<?php } ?>
                  </tbody>
                </table>
              </div>
              <div class="row align-items-center justify-content-between py-2 pe-0 fs--1">
                <div class="col-auto d-flex">
                  <p class="mb-0 d-none d-sm-block me-3 fw-semi-bold text-900" data-list-info="data-list-info"></p><a class="fw-semi-bold" href="viewcoordinatorstudents.php?coordinatorID=<?= $coordinatorID; ?>" data-list-view="*">View all<span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span></a><a class="fw-semi-bold d-none" href="viewcoordinatorstudents.php?coordinatorID=<?= $coordinatorID; ?>" data-list-view="less">View Less<span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span></a>
                </div>
                <div class="col-auto d-flex"><button class="page-link" data-list-pagination="prev"><span class="fas fa-chevron-left"></span></button>
                  <ul class="mb-0 pagination"></ul><button class="page-link pe-0" data-list-pagination="next"><span class="fas fa-chevron-right"></span></button>
                </div>
              </div>
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