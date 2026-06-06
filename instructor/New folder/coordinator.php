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
              <li class="breadcrumb-item active"><a href="members.html#!">Coordinator</a></li>
              
            </ol>
          </nav>
          <h2 class="text-bold text-1100 mb-5">Coordinator</h2>
          <div id="members" data-list='{"valueNames":["customer","email","mobile_number","city","last_active","joined"],"page":10,"pagination":true}'>
            <div class="row align-items-center justify-content-between g-3 mb-3">
              <div class="col col-auto">
                <div class="search-box">
                  <form class="position-relative" data-bs-toggle="search" data-bs-display="static"><input class="form-control search-input search" type="search" placeholder="Search Coordinator" aria-label="Search" />
                    <span class="fas fa-search search-box-icon"></span>
                  </form>
                </div>
              </div>
              <div class="col-auto">
                <div class="d-flex align-items-center"><button class="btn btn-link text-900 me-4 px-0"><span class="fas fa-cloud-download-alt fs--1 me-2"></span>Export</button><button class="btn btn-primary"><span class="fas fa-plus me-2" disabled></span>Add Agency</button></div>
              </div>
            </div>
            <div class="mx-n4 mx-lg-n6 px-4 px-lg-6 mb-9 bg-white border-y border-300 mt-2 position-relative top-1">
              <div class="table-responsive scrollbar ms-n1 ps-1">
                <table class="table table-sm fs--1 mb-0">
                  <thead>
                    <tr>
                      <th class="white-space-nowrap fs--1 align-middle ps-0">
                        <div class="form-check mb-0 fs-0"><input class="form-check-input" type="checkbox" /></div>
                      </th>
                      <th class="sort align-middle" scope="col" data-sort="id" >Agency Name</th>
                     
                      <th class="sort align-middle" scope="col" data-sort="images" >Images</th>
                       <th class="sort align-middle" scope="col" data-sort="name" >Coordinator Name</th>
                      <th class="sort align-middle pe-3" scope="col" data-sort="mobile_number" >Contact Number</th>
                      <th class="sort align-middle " scope="col" data-sort="Coodinator" >Location</th>
                      <th class="sort align-middle  pe-0" scope="col" data-sort="Course" >Number of Work Availability</th>
                    
                    </tr>
                  </thead>
                  <tbody class="list" id="table-latest-review-body">
<?php 

$agency=mysqli_query($con,"SELECT *  from agency ")or die(mysqli_error($con));
              while($rowagency=mysqli_fetch_object($agency))
              {  
?>

                    <tr class="hover-actions-trigger btn-reveal-trigger position-static">
                      <td class="fs--1 align-middle ps-0 py-3">
                        <div class="form-check mb-0 fs-0"><input class="form-check-input" type="checkbox" /></div>
                      </td>
                       <td class="id align-middle white-space-nowrap"><a class="fw-semi-bold text-1100" href=""><?= $rowagency->agencyNAME;?></a></td>
                       
                      <td class="images align-middle white-space-nowrap">
                          <div class="avatar avatar-m"><img class="rounded-circle" src="../assets/img/user/<?= $rowagency->agencyIMG?>" alt="" /></div>
                        </td>
                        <td class="name align-middle white-space-nowrap"><a class="fw-semi-bold text-1100" href=""><?= $rowagency->agencyPERSONEL;?></a></td>
                      <td class="mobile_number align-middle white-space-nowrap"><a class="fw-semi-bold text-1100" href=""><?= $rowagency->agencyCONTACT?></a></td>
                      <td class="Coodinator align-middle white-space-nowrap"><a class="fw-bold text-1100" href="tel:+912346578"><?= $rowagency->agencyLOCATION?></a></td>
                      <td class="Course align-middle white-space-nowrap"><a class="fw-bold text-1100" href="tel:+912346578">3</a></td>
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