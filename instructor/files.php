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
              <li class="breadcrumb-item active"><a href="">Downloadable Forms</a></li>
              
            </ol>
          </nav>
          <h2 class="text-bold text-1100 mb-5">Downloadable Forms</h2>
          <div id="members" data-list='{"valueNames":["id","name","mobile_number","images","Coodinator","Course","Colleges","classyear"],"page":10,"pagination":true}'>
            <div class="row align-items-center justify-content-between g-3 mb-3">
              <div class="col col-auto">
                <div class="search-box">
                  <form class="position-relative" data-bs-toggle="search" data-bs-display="static"><input class="form-control search-input search" type="search" placeholder="Search" aria-label="Search" />
                    <span class="fas fa-search search-box-icon"></span>
                  </form>
                </div>
              </div>
              <div class="col-auto">
               
              </div>
                    
                    
            </div>
            <div class="mx-n4 mx-lg-n6 px-4 px-lg-6 mb-9 bg-white border-y border-300 mt-2 position-relative top-1">
              <div class="table-responsive scrollbar ms-n1 ps-1">
              <table class="table table-sm fs--1 mb-0">
                  <thead>
                    <tr>
                     
                      
                      <th class="sort align-middle" scope="col" data-sort="name" >Forms Name</th>
                      <th class="sort align-middle" scope="col" data-sort="images" >Details</th>
                      <th class="sort align-middle pe-3" scope="col" data-sort="mobile_number" >Number of Downloads</th>
                      <th class="sort align-middle" scope="col" data-sort="id" >Download</th>
                
                    </tr>
                  </thead>
                  <tbody class="list" id="table-latest-review-body">
 <?php 
              $name= $rowstudent->firstname." ".$rowstudent->middlename. " ".$rowstudent->lastname;
              $form=mysqli_query($con,"SELECT * from formupload")or die(mysqli_error($con));
              while($row=mysqli_fetch_object($form))
              {
                 $download = mysqli_query($con,"SELECT studentdownload.* from studentdownload where StudentID = '$rowstudent->StudentID' and formID = '$row->formID'")or die(mysqli_error($con));
                 $row2 = mysqli_fetch_object($download);
                 $downloadcount = mysqli_num_rows($download);


?>

                    <tr class="hover-actions-trigger btn-reveal-trigger position-static">
                      
                       <td class="name align-middle white-space-nowrap"><a class="fw-semi-bold text-1100" href=""><?=$row->details;?></a></td>
                      <td class="images align-middle white-space-nowrap"><a class="fw-semi-bold text-1100" href=""><?=$row->status;?></a></td>
                      <td class="mobile_number align-middle white-space-nowrap"><a class="fw-semi-bold text-1100" href=""><?php echo $downloadcount;?></a></td>
                       <td class="id align-middle white-space-nowrap">
                       <?php if($downloadcount >= 1 && $row2->disabled == "YES" || $row->disabled == "YES"){ ?>
                        <button type="submit"  value="<?=$row->formID;?>" name="btndownload" <?php if($downloadcount >= 1 && $row2->disabled == "YES" || $row->disabled == "YES"){echo "disabled";} ?> class="btn btn-danger btn-sm">Disabled&nbsp;&nbsp;</button>
                       <?php }else{ ?>
                          <form action="query.php" method="post">
                            <input type="" name="txtname" value="<?=$name;?>" hidden="">
                          <button type="submit"  value="<?=$row->formID;?>" name="btndownload" <?php if($downloadcount >= 1 && $row2->disabled == "YES" || $row->disabled == "YES"){echo "disabled";} ?> class="btn btn-primary btn-sm">Download</button>
                          </form>
                        <?php }?>
                        </td>
                    </tr>
                   
<?php } ?>
                  </tbody>
                </table>
              </div>
              <div class="row align-items-center justify-content-between py-2 pe-0 fs--1">
                <div class="col-auto d-flex">
                  <p class="mb-0 d-none d-sm-block me-3 fw-semi-bold text-900" data-list-info="data-list-info"></p><a class="fw-semi-bold" href="download.php#!" data-list-view="*">View all<span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span></a><a class="fw-semi-bold d-none" href="download.php#!" data-list-view="less">View Less<span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span></a>
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