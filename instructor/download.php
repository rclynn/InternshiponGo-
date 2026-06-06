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
          <div class="row">
            <div class="col-12">
              
                  <button class="btn btn-primary btn-lg" type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Add Forms</button>
                  <div class="modal fade" id="staticBackdrop" tabindex="-1" data-bs-backdrop="static" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header bg-primary">
                          <h5 class="modal-title text-white" id="staticBackdropLabel">Add Forms</h5><button class="btn p-1" type="button" data-bs-dismiss="modal" aria-label="Close"><span class="fas fa-times fs--1 text-white"></span></button>
                        </div>
                       
                        <div class="modal-body">
                        <form action="query.php" method="post" enctype="multipart/form-data" >
                           <div class="mb-3">
                          <label class="form-label" for="exampleFormControlInput1">File Name</label>
                          <input class="form-control" id="exampleFormControlInput1" type="text" name="name2" required="" />
                        </div>
                         <div class="mb-3">
                            <label class="form-label" for="customFile">File input</label>
                            <input class="form-control" id="customFile" type="file" name="myfile" required="" />
                        </div>
                        <br>
                        <div class="form-floating">
                        <select class="form-select" id="floatingSelect" name="status" aria-label="Status" >
                          <option >before enrollment</option>
                          <option >during training</option>
                          <option >after training</option>
                        </select>
                        <label for="floatingSelect">Works with selects</label>
                      </div>
                        </div>
                        <div class="modal-footer"><button class="btn btn-primary" type="submit" name="btnupload">Upload</button><button class="btn btn-outline-primary" type="button" data-bs-dismiss="modal">Cancel</button></div>
                      </div>
                    </form>
                    </div>
                  </div>
                
            </div>
          </div>
          <br>
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
                      <!-- <th class="sort align-middle pe-3" scope="col" data-sort="mobile_number" >Number of Downloads</th> -->
                     <!--  <th class="sort align-middle pe-3" scope="col" data-sort="" >View</th> -->
                      <th class="sort align-middle" scope="col" data-sort="id" >Download</th>
                      <th class="sort align-middle" scope="col" data-sort="" >Delete</th>
                    </tr>
                  </thead>
                  <tbody class="list" id="table-latest-review-body">
 <?php 
           
              $form=mysqli_query($con,"SELECT * from formupload")or die(mysqli_error($con));
              while($row=mysqli_fetch_object($form))
              {
                 

?>

                    <tr class="hover-actions-trigger btn-reveal-trigger position-static">
                      
                       <td class="name align-middle white-space-nowrap"><a class="fw-semi-bold text-1100" href=""><?=$row->details;?></a></td>
                      <td class="images align-middle white-space-nowrap"><a class="fw-semi-bold text-1100" href=""><?=$row->status;?></a></td>
                     
                      <!-- <td class=" align-middle white-space-nowrap"><a href="downloadview.php?formID=<?= $row->formID?>" class="btn btn-primary btn-sm" type="button" >View</a></td> -->

                       <td class="id align-middle white-space-nowrap">
                      
                          <form action="query.php" method="post">
                            
                          <button type="submit"  value="<?=$row->formID;?>" name="btndownload"  class="btn btn-primary btn-sm">Download</button>
                          </form>
                       
                        </td>
                        <td class="id align-middle white-space-nowrap">

                          <button class="btn btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop<?=$row->formID;?>">Delete</button>
                          <div class="modal fade" id="staticBackdrop<?=$row->formID;?>" tabindex="-1" data-bs-backdrop="static" aria-labelledby="staticBackdropLabel<?=$row->formID;?>" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header bg-primary">
                                  <h5 class="modal-title text-white" id="staticBackdropLabel<?=$row->formID;?>">Delete <?=$row->details;?></h5><button class="btn p-1" type="button" data-bs-dismiss="modal" aria-label="Close"><span class="fas fa-times fs--1 text-white"></span></button>
                                </div>
                                <form action="query.php" method="post">
                                <div class="modal-body">
                                  <p class="text-700 lh-lg mb-0">Are You Sure to Delete This?</p>

                           <input type="text" name="delete" value="<?=$row->formID;?>" hidden> 
                         
                          
                                </div>
                                <div class="modal-footer"><button class="btn btn-danger" type="submit" name="btndelete" >Delete</button><button class="btn btn-outline-primary" type="button" data-bs-dismiss="modal">Cancel</button></div>
                              </div>
                              </form>
                            </div>
                          </div>
                      
                          
                       
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