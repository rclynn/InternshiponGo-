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
              <li class="breadcrumb-item active"><a href="">Students</a></li>
              <li class="breadcrumb-item "><?= $rowadviser->instructorCOURSE;?></li>
              <li class="breadcrumb-item "><?= $rowadviser->instructorSCHOOL;?></li>
            </ol>                    

          </nav>
          <h2 class="text-bold text-1100 mb-5">New Students <?= $year = date('Y'); ?></h2>
          <div id="members" data-list='{"valueNames":["id","name","mobile_number","images","Coodinator","Course","Colleges","classyear"],"page":10,"pagination":true}'>
            <div class="row align-items-center justify-content-between g-3 mb-3">
              <div class="col col-auto">
                <div class="search-box">
                  <form class="position-relative" data-bs-toggle="search" data-bs-display="static"><input class="form-control search-input search" type="search" placeholder="Search Students" aria-label="Search" />
                    <span class="fas fa-search search-box-icon"></span>
                  </form>
                </div>
              </div>
              <div class="col-auto">
                <div class="d-flex align-items-center">
                   <a href="studentnew.php" class="btn btn-secondary" type="button" style="margin-left: 5px;">All</a>
                    <?php $sectionthis=mysqli_query($con,"SELECT * from section")or die(mysqli_error($con));
              while($rowsectionthis=mysqli_fetch_object($sectionthis))
              { ?>
                    <a href="studentsection.php?section=<?= $rowsectionthis->sectionID;?>" class="btn btn-warning" type="button" style="margin-left: 5px;">Section <?= $rowsectionthis->sectionDes;?></a>
              <?php } ?>  
                <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><span class="fas fa-plus me-2" disabled></span>Add Students</button> 
                      <div class="modal fade" id="staticBackdrop" tabindex="-1" data-bs-backdrop="static" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header bg-primary">
                              <h5 class="modal-title text-white" id="staticBackdropLabel">Add Students</h5><button class="btn p-1" type="button" data-bs-dismiss="modal" aria-label="Close"><svg class="svg-inline--fa fa-xmark fs--1 text-white" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="xmark" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M310.6 361.4c12.5 12.5 12.5 32.75 0 45.25C304.4 412.9 296.2 416 288 416s-16.38-3.125-22.62-9.375L160 301.3L54.63 406.6C48.38 412.9 40.19 416 32 416S15.63 412.9 9.375 406.6c-12.5-12.5-12.5-32.75 0-45.25l105.4-105.4L9.375 150.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0L160 210.8l105.4-105.4c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25l-105.4 105.4L310.6 361.4z"></path></svg><!-- <span class="fas fa-times fs--1 text-white"></span> Font Awesome fontawesome.com --></button>
                            </div>
                            <form method="post" action="query.php">
                            <div class="modal-body"> 
                              <div class="mb-3">
                                <label class="form-label" for="exampleFormControlInput1">Student ID</label>
                                <input class="form-control" id="exampleFormControlInput1" type="text" name="studentID">
                              </div>
                              <div class="mb-3">
                                <label class="form-label" for="exampleFormControlInput1">Caourse</label>
                                <input class="form-control" id="exampleFormControlInput1" type="text" name="course" value="<?= $rowadviser->instructorCOURSE;?>" readonly>
                              </div>
                              <div class="mb-3">
                                <label class="form-label" for="exampleFormControlInput1">School</label>
                                <input class="form-control" id="exampleFormControlInput1" type="text" name="school" value="<?= $rowadviser->instructorSCHOOL; ?>" readonly>
                              </div>
                              
                            </div>
                            <div class="modal-footer"><button class="btn btn-primary" type="submit" name="addstudent">Save</button><button class="btn btn-outline-primary" type="button" data-bs-dismiss="modal">Cancel</button></div>
                            </form>
                          </div>
                        </div>
                      </div>
                    
                </div>
              </div>
            </div>
            <div class="mx-n4 mx-lg-n6 px-4 px-lg-6 mb-9 bg-white border-y border-300 mt-2 position-relative top-1">
              <div class="table-responsive scrollbar ms-n1 ps-1">
                <table class="table table-sm fs--1 mb-0">
                  <thead>
                    <tr>
                     
                      <th class="sort align-middle" scope="col" data-sort="id" >Students ID</th>
                      <th class="sort align-middle" scope="col" data-sort="name" >Students Name</th>
                      <th class="sort align-middle" scope="col" data-sort="images" >Images</th>
                      <th class="sort align-middle pe-3" scope="col" data-sort="mobile_number" >Contact Number</th>
                      <th class="sort align-middle " scope="col" data-sort="Coodinator" >Agency</th>
                      <th class="sort align-middle  pe-0" scope="col" data-sort="classyear" >Class Year</th>
                      <th>View</th>
                    </tr>
                  </thead>
                  <tbody class="list" id="table-latest-review-body">
<?php 
date_default_timezone_set('Asia/Manila');
         // $time = strtotime("-1 year", time());
        // $year = date('Y',$time );
$year = date('Y');
$student=mysqli_query($con,"SELECT *  from student where colleges ='$rowadviser->instructorSCHOOL' and department='$rowadviser->instructorCOURSE' and classyear ='$year' and status !='Deleted'")or die(mysqli_error($con));
              while($rowstudents=mysqli_fetch_object($student)){
?>

                    <tr class="hover-actions-trigger btn-reveal-trigger position-static">
                      
                       <td class="id align-middle white-space-nowrap"><a class="fw-semi-bold text-1100" href=""><?= $rowstudents->studentnumber;?></a></td>
                       <td class="name align-middle white-space-nowrap"><a class="fw-semi-bold text-1100" href=""><?= $rowstudents->firstname." ".$rowstudents->middlename." ".$rowstudents->lastname;?></a></td>
                      <td class="images align-middle white-space-nowrap">
                          <div class="avatar avatar-m"><img class="rounded-circle" src="../assets/img/user/<?= $rowstudents->picture?>" alt="" /></div>
                        </td>
                      <td class="mobile_number align-middle white-space-nowrap"><a class="fw-semi-bold text-1100" href=""><?= $rowstudents->contactnumber;?></a></td>
                      <td class="Coodinator align-middle white-space-nowrap"><a class="fw-bold text-1100" href="tel:+912346578"><?= $rowstudents->agency;?></a></td>
                      <td class="classyear align-middle white-space-nowrap text-700 "><?= $rowstudents->classyear;?></td>
                      <td><a href="viewstudents.php?studentID=<?= $rowstudents->StudentID;?>" class="btn btn-primary">View</a></td>
                    </tr>
                   
<?php } ?>
                  </tbody>
                </table>
              </div>
              <div class="row align-items-center justify-content-between py-2 pe-0 fs--1">
                <div class="col-auto d-flex">
                  <p class="mb-0 d-none d-sm-block me-3 fw-semi-bold text-900" data-list-info="data-list-info"></p><a class="fw-semi-bold" href="students.php#!" data-list-view="*">View all<span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span></a><a class="fw-semi-bold d-none" href="students.php#!" data-list-view="less">View Less<span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span></a>
                </div>
                <div class="col-auto d-flex"><button class="page-link" data-list-pagination="prev"><span class="fas fa-chevron-left"></span></button>
                  <ul class="mb-0 pagination"></ul><button class="page-link pe-0" data-list-pagination="next"><span class="fas fa-chevron-right"></span></button>
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