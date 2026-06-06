<?php include('../1connection.php'); ?>
<?php include('1session.php'); ?>
<?php 
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
          <h2 class="text-bold text-1100 mb-5">View Profile</h2>
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
                              <img class="rounded-circle" src="../assets/img/user/<?= $rowadviser->instructorIMG?>" alt="" />
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
                                            <img class="rounded-circle" src="../assets/img/user/<?= $rowadviser->instructorIMG?>" alt="" style="height: 200px;width: 200px;"/>
                                             <input type="text" name="picturea" value="<?= $rowadviser->instructorIMG?>" hidden>
                                            </center>
                                              <input type="text" name="instructorID" value="<?= $rowadviser->instructorID;?>" hidden>
                                              <div class="mb-0">
                                                <label class="form-label" for="">Image</label>
                                                <input class="form-control" id="" type="file" accept="image/*" name="pic" value="">  
                                              </div>
                                          </div>
                                          <div class="modal-footer"><button class="btn btn-primary" type="submit" name="btnupdateimage" >Update</button><a class="btn btn-outline-primary" type="button" data-bs-dismiss="modal">Cancel</a></div>
                                        </div>
                                        </form>
                                      </div>
                                    </div>

                            </div>
                            </div>
                          </div>
                          <div class="col-12 col-sm-auto flex-1" style="margin-left: 10px;">
                            <h3><?= $rowadviser->instructorNAME;?><button class="btn btn-link p-0" data-bs-toggle="modal" data-bs-target="#editname"><span class="fas fa-pen fs-0 ms-3 text-500"></span></button></h3>
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
                                            <input class="form-control" id="" type="text" value="<?= $rowadviser->instructorNAME?>" name="name">  
                                          </div>
                                          
                                           <input type="text" name="instructorID" value="<?= $rowadviser->instructorID;?>" hidden>
                                          </div>
                                          <div class="modal-footer"><button class="btn btn-primary" type="submit" name="btnupdatename" >Update</button><a class="btn btn-outline-primary" type="button" data-bs-dismiss="modal">Cancel</a></div>
                                        </div>
                                        </form>
                                      </div>
                                    </div>
                            <p class="" style="margin-bottom: 0px;"><b> Account Type: </b>Adviser </p>
                            <p class="" style="margin-bottom: 0px;"><b> Course: </b><?= $rowadviser->instructorCOURSE;?> </p>
                            <p class="" style="margin-bottom: 0px;"><b> School: </b><?= $rowadviser->instructorSCHOOL;?> </p>
                            <p class="" style="margin-bottom: 0px;"><b> Date Account Created: </b><?= $rowadviser->instructorDATEADDED?> </p>
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
                                            <textarea class="form-control" id="" rows="3" name="answer"> </textarea>
                                          </div>
                                          <div class="mb-0" style="margin-top: 0px;">
                                            <label class="form-label" for="exampleFormControlInput3">Old Password</label>
                                            <input class="password11 form-control" id="exampleFormControlInput3" type="password" value="" name="" required="">  
                                          </div>
                                          <p class="" id="demopassword1" style=""></p>
                                          </div>
                                          <input type="text" name="instructorID" value="<?= $instructorID;?>" hidden>
                                          <div class="modal-footer"><button class="password21 btn btn-primary" type="submit" name="btnsecurityquestions" >Submit</button><a class="btn btn-outline-primary" type="button" data-bs-dismiss="modal">Cancel</a></div>
                                        </div>
                                        </form>
                                      </div>
                                    </div>

                        <?php 
                              $securityQA=mysqli_query($con,"SELECT * from securityquestions where securityquestionsUSERID = '$instructorID' and securityquestionsUSERTYPE = 'instructor'")or die(mysqli_error($con));
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
                         
                          </div>
                         
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
                                  <input type="text" name="instructorID" value="<?= $instructorID; ?>" hidden>
                                  <div class="mb-0">
                                    <label class="form-label" for="exampleFormControlInput1">Section Handle</label>
                                    <select class="form-select" aria-label="Default select example" name="section">
                                      <option ><?= $rowadviser->instructorSECTIONHANDLE;?></option>
                                      <option value="Section A">A</option>
                                      <option value="Section B">B</option>
                                      <option value="Section C">C</option>
                                      <option value="Section D">D</option>
                                      <option value="Section E">E</option>
                                      <option value="Section F">F</option>
                                    </select> 
                                  </div>

                                  <div class="mb-0" style="margin-top: 0px;">
                                    <label class="form-label" for="">Contact Number</label>
                                    <input class="form-control" id="" type="text" value="<?= $rowadviser->instructorNUMBER?>" name="number">  
                                  </div>
                               
                              </div>
                              <div class="modal-footer"><button class="btn btn-primary" type="submit" name="updateinstructor" >Update</button><a class="btn btn-outline-primary" type="button" data-bs-dismiss="modal">Cancel</a></div>
                            </div>
                            </form>
                          </div>
                        </div>
                        </div>
                        <h5 class="text-800">Section Handle</h5>
                        <p class="text-800"><?= $rowadviser->instructorSECTIONHANDLE?></p>
                        <h5 class="text-800">Contact Number</h5>
                        <p class="text-800"><?= $rowadviser->instructorNUMBER?></p>
                        <!--  <h5 class="text-800">Contact number</h5>
                        <p class="text-800"><?= $rowadviser->agencyCONTACT?></p> -->
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
                                    <input class="form-control" id="exampleFormControlInput1" type="text" name="username" value="<?= $rowadviser->instructorUSERNAME; ?>" required >  
                                  </div>
                                    <div class="mb-0" style="margin-top: 0px;">
                                    <label class="form-label" for="exampleFormControlInput3">Old Password</label>
                                    <input class="password1 form-control" id="exampleFormControlInput3" type="password" value="" name="" required="">  
                                  </div>
                                  <div class="mb-0" style="margin-top: 0px;">
                                    <label class="form-label" for="exampleFormControlInput3">Password</label>
                                    <input class="form-control" id="exampleFormControlInput3" type="password" value="<?= $rowadviser->instructorPASSWORD; ?>" name="password" required="">  
                                  </div>
                                    <p class="demopass" id="demopassword" style=""></p>
                               <input type="text" name="instructorID" value="<?= $rowadviser->instructorID;?>" hidden>
                              </div>
                              <div class="modal-footer"><button class="password2 btn btn-primary" type="submit" name="btnupdatesecurity" >Update</button><a class="btn btn-outline-primary" type="button" data-bs-dismiss="modal">Cancel</a></div>
                            </div>
                            </form>
                            <?php
                               $oldpass=$rowadviser->instructorPASSWORD;
                            ?> 
                            <script>
                            let input1 = document.querySelector(".password1");
                            let button1 = document.querySelector(".password2");
                            button1.disabled = true;
                            input1.addEventListener("change", stateHandle);

                            function stateHandle() {
                                if(document.querySelector(".password1").value != "<?= $oldpass; ?>") {
                                    button1.disabled = true;
                                    document.getElementById("demopassword").innerHTML = "<b style='color:red;'>Old Password Doesn't Match!</b>";
                                 
                                } else {
                                    button1.disabled = false;
                                    document.getElementById("demopassword").innerHTML = "<b style='color:green;</b>'>Good!";
                                   
                                   }
                            }
                            </script>
                            <script>
                            let input11 = document.querySelector(".password11");
                            let button11 = document.querySelector(".password21");
                            button11.disabled = true;
                            input11.addEventListener("change", stateHandle);

                            function stateHandle() {
                                if(document.querySelector(".password11").value != "<?= $oldpass; ?>") {
                                    button11.disabled = true;
                                    document.getElementById("demopassword1").innerHTML = "<b style='color:red;'>Old Password Doesn't Match!</b>";
                                 
                                } else {
                                    button11.disabled = false;
                                    document.getElementById("demopassword1").innerHTML = "<b style='color:green;</b>'>Good!";
                                   
                                }
                            }
                            </script>
                          </div>
                        </div>
                         <h5 class="text-800">Username</h5>
                          <p class="text-800"><?= $rowadviser->instructorUSERNAME; ?></p>
                          <h5 class="text-800">Password</h5>
                          <p class="text-800">**********</p>
                      </div>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="card">
                      <div class="card-body">
                               
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