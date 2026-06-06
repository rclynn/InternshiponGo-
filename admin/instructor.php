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
              <li class="breadcrumb-item active"><a href="">Instructor</a></li>
              
            </ol>
          </nav>
          <h2 class="text-bold text-1100 mb-5">Instructor</h2>
          <div id="members" data-list='{"valueNames":["id","name","mobile_number","images","Coodinator","Course","Colleges","section"],"page":10,"pagination":true}'>
            <div class="row align-items-center justify-content-between g-3 mb-3">
              <div class="col col-auto">
                <div class="search-box">
                  <form class="position-relative" data-bs-toggle="search" data-bs-display="static"><input class="form-control search-input search" type="search" placeholder="Search Instructor" aria-label="Search" />
                    <span class="fas fa-search search-box-icon"></span>
                  </form>
                </div>
              </div>
              <div class="col-auto">
                <div class="d-flex align-items-center">
                  <form method="post" action="query.php">
                  <button class="btn btn-link text-900 me-4 px-0" type="submit" name="exportinstructor"><span class="fas fa-cloud-download-alt fs--1 me-2"></span>Export</button>
                  </form>
                  <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><span class="fas fa-plus me-2" disabled></span>Add Instructor</button></div>
                 
                      <div class="modal fade" id="staticBackdrop" tabindex="-1" data-bs-backdrop="static" aria-labelledby="staticBackdropLabel" aria-hidden="true" style="display: none;">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header bg-primary">
                              <h5 class="modal-title text-white" id="staticBackdropLabel">Add Instructor</h5><button class="btn p-1" type="button" data-bs-dismiss="modal" aria-label="Close"><svg class="svg-inline--fa fa-xmark fs--1 text-white" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="xmark" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M310.6 361.4c12.5 12.5 12.5 32.75 0 45.25C304.4 412.9 296.2 416 288 416s-16.38-3.125-22.62-9.375L160 301.3L54.63 406.6C48.38 412.9 40.19 416 32 416S15.63 412.9 9.375 406.6c-12.5-12.5-12.5-32.75 0-45.25l105.4-105.4L9.375 150.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0L160 210.8l105.4-105.4c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25l-105.4 105.4L310.6 361.4z"></path></svg><!-- <span class="fas fa-times fs--1 text-white"></span> Font Awesome fontawesome.com --></button>
                            </div> 
                            <form method="post" action="query.php" enctype="multipart/form-data">
                            <div class="modal-body">  
                                <div class="mb-3">
                                  <label class="form-label" for="customFile">Image</label>
                                  <input class="form-control" id="customFile" type="file" ccept="image/*" name="pic" />
                                </div>       
                                <div class="mb-3">
                                  <label class="form-label" for="exampleFormControlInput1">Name</label>
                                  <input class="form-control" id="exampleFormControlInput1" type="text" name="name">
                                </div>
                                <div class="mb-3">
                                  <label class="form-label" for="exampleFormControlInput3">Instructor Authentication</label>
                                  <input class="form-control" id="exampleFormControlInput3" type="text" name="auth">
                                </div>
                                 <div class="mb-3">
                                  <label class="form-label" for="exampleFormControlInput4">Contact Number</label>
                                  <input class="form-control" id="exampleFormControlInput4" type="text" name="contact">
                                </div>
                                <div class="mb-3">
                                  <label class="form-label" for="exampleFormControlInput2">Course</label>
                                  <input class="form-control" id="exampleFormControlInput2" type="text" name="course">
                                </div>
                                 <div class="mb-3">
                                  <label class="form-label" for="exampleFormControlInput5">School</label>
                                  <input class="form-control" id="exampleFormControlInput5" type="text" name="school">
                                </div>
                            </div>
                            <div class="modal-footer"><button class="btn btn-primary" type="submit" name="addinstructor">Add</button><a class="btn btn-outline-primary" type="button" data-bs-dismiss="modal">Cancel</a></div>
                          </form>                  
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
                      <th class="sort align-middle" scope="col" data-sort="name" >Instructor Name</th>
                      <th class="sort align-middle" scope="col" data-sort="images" >Images</th>
                      <th class="sort align-middle pe-3" scope="col" data-sort="mobile_number" >Contact Number</th>
                      <th class="sort align-middle  pe-0" scope="col" data-sort="Course" >Course</th>
                      <th class="sort align-middle  pe-0" scope="col" data-sort="Colleges" >School</th>
                      <th>View</th>
                     
                    </tr>
                  </thead>
                  <tbody class="list" id="table-latest-review-body">
<?php 

$instructor=mysqli_query($con,"SELECT *  from instructor ")or die(mysqli_error($con));
              while($rowinstructor=mysqli_fetch_object($instructor))
              {  
?>

                    <tr class="hover-actions-trigger btn-reveal-trigger position-static">
                       <td class="name align-middle white-space-nowrap"><a class="fw-semi-bold text-1100" href=""><?= $rowinstructor->instructorNAME;?></a></td>
                      <td class="images align-middle white-space-nowrap">
                          <div class="avatar avatar-m"><img class="rounded-circle" src="../assets/img/user/<?= $rowinstructor->instructorIMG;?>" alt="" /></div>
                        </td>
                      <td class="mobile_number align-middle white-space-nowrap"><a class="fw-semi-bold text-1100" href=""><?= $rowinstructor->instructorNUMBER;?></a></td>
                      <td class="Course align-middle white-space-nowrap text-900"><?= $rowinstructor->instructorCOURSE;?></td>
                      <td class="Colleges align-middle  white-space-nowrap text-700"><?= $rowinstructor->instructorSCHOOL;?></td>
                      <td><a href="viewinstructor.php?instructorID=<?= $rowinstructor->instructorID;?>" class="btn btn-primary">View</a></td>
                    </tr>
                   
<?php } ?>
                  </tbody>
                </table>
              </div>
              <div class="row align-items-center justify-content-between py-2 pe-0 fs--1">
                <div class="col-auto d-flex">
                  <p class="mb-0 d-none d-sm-block me-3 fw-semi-bold text-900" data-list-info="data-list-info"></p><a class="fw-semi-bold" href="instructor.php#!" data-list-view="*">View all<span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span></a><a class="fw-semi-bold d-none" href="instructor.php#!" data-list-view="less">View Less<span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span></a>
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