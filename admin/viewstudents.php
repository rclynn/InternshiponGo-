<?php include('../1connection.php'); ?>
<?php include('1session.php'); ?>
<?php 
 if(isset($_GET['studentID']) ? $_GET['studentID'] : ''){
    $studentID = $_GET['studentID'];
$agency=mysqli_query($con,"SELECT * from student where StudentID = '$studentID'")or die(mysqli_error($con));
      $rowstudent=mysqli_fetch_object($agency);
 }else{
         echo"<script type='text/javascript'>window.location.replace('students.php');</script>";
      }
?>
<!DOCTYPE html>
<html lang="en-US" dir="ltr">

<?php include('1head.php'); ?>
<link href="../vendors/flatpickr/flatpickr.min.css" rel="stylesheet" />
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
              <li class="breadcrumb-item "><a href="">View Profile</a></li>
               
              
            </ol>
          </nav>
          <div class="mb-9">
            <div class="row align-items-center justify-content-between g-3 mb-4">
              <div class="col-auto">
                <h2 class="mb-0">View Profile of <i><?= $rowstudent->firstname." ".$rowstudent->middlename." ".$rowstudent->lastname?></i></h2>
              </div>
              <div class="col-auto">
                <div class="row g-3">
                  <div class="col-auto">
                                <?php if($rowstudent->status == 'Active'){?>
                                   <button class="btn btn-phoenix-primary" type="button" data-bs-toggle="modal" data-bs-target="#Disabled"><span class="fa-solid fa-trash-can"></span>Disabled</button>
                                <?php } ?>
                                <?php if($rowstudent->status == 'Disabled'){?>
                                   <button class="btn btn-phoenix-primary" type="button" data-bs-toggle="modal" data-bs-target="#Active"><span class="fa-solid fa-trash-can"></span>Active</button>
                                <?php } ?>
                    <div class="modal fade" id="Active" tabindex="-1" data-bs-backdrop="static" aria-labelledby="Active" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header bg-success">
                            <h5 class="modal-title text-white" id="Active">Active <?= $rowstudent->firstname." ".$rowstudent->middlename." ".$rowstudent->lastname?></h5><button class="btn p-1" type="button" data-bs-dismiss="modal" aria-label="Close"><span class="fas fa-times fs--1 text-white"></span></button>
                          </div>
                          <div class="modal-body">
                            <form method="post" action="query.php">
                               <input type="text" name="StudentID" value="<?= $rowstudent->StudentID;?>" hidden>
                              <input type="text" name="log" value="Admin  Active the account of <?= $rowstudent->firstname." ".$rowstudent->middlename." ".$rowstudent->lastname?>" hidden>
                            <p class="text-700 lh-lg mb-0">Are You Sure to Active This?</p>
                            <br>
                            <div class="form-check">
                              <input class="form-check-input" id="" type="checkbox" value="" required="" />
                              <label class="form-check-label" for="">I understand that Activiting this account will continue interm applicant progress.</label>
                            </div>
                          </div>
                          <div class="modal-footer"><button class="btn btn-success" type="submit" name="btnactivestudent">Active</button><button class="btn btn-outline-primary" type="button" data-bs-dismiss="modal">Cancel</button></div>
                          </form>
                        </div>
                      </div>
                    </div>
                   
                    <div class="modal fade" id="Disabled" tabindex="-1" data-bs-backdrop="static" aria-labelledby="Disabled" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header bg-warning">
                            <h5 class="modal-title text-white" id="Disabled">Disabled <?= $rowstudent->firstname." ".$rowstudent->middlename." ".$rowstudent->lastname?></h5><button class="btn p-1" type="button" data-bs-dismiss="modal" aria-label="Close"><span class="fas fa-times fs--1 text-white"></span></button>
                          </div>
                          <div class="modal-body">
                            <form method="post" action="query.php">
                              <input type="text" name="StudentID" value="<?= $rowstudent->StudentID;?>" hidden>
                              <input type="text" name="log" value="Admin  disabled the account of <?= $rowstudent->firstname." ".$rowstudent->middlename." ".$rowstudent->lastname?>" hidden>
                            <p class="text-700 lh-lg mb-0">Are You Sure to Disabled This?</p>
                            <br>
                            <div class="form-check">
                              <input class="form-check-input" id="" type="checkbox" value="" required="" />
                              <label class="form-check-label" for="">I understand that Disabling this account will stop interm applicant  progress.</label>
                            </div>
                            
                          </div>
                          <div class="modal-footer"><button class="btn btn-warning" type="submit" name="btndisabledstudent">Disabled</button><button class="btn btn-outline-primary" type="button" data-bs-dismiss="modal">Cancel</button></div>
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
                            <h5 class="modal-title text-white" id="delete">Delete <?= $rowstudent->firstname." ".$rowstudent->middlename." ".$rowstudent->lastname?></h5><button class="btn p-1" type="button" data-bs-dismiss="modal" aria-label="Close"><span class="fas fa-times fs--1 text-white"></span></button>
                          </div>
                          <div class="modal-body">
                            <form method="post" action="query.php">
                              <input type="text" name="StudentID" value="<?= $rowstudent->StudentID;?>" hidden>
                              <input type="text" name="log" value="Admin  delete the account of <?= $rowstudent->firstname." ".$rowstudent->middlename." ".$rowstudent->lastname?>" hidden>
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
                          <div class="modal-footer"><button class="btn btn-danger" type="submit" name="btndeletestudent">Delete</button><button class="btn btn-outline-primary" type="button" data-bs-dismiss="modal">Cancel</button></div>
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
                  <div class="col-12 col-md-7 col-xxl-12">
                    <div class="card h-100">
                      <div class="card-body d-flex flex-column justify-content-between pb-3">
                        <div class="row align-items-center g-5 mb-3 text-center text-sm-start">
                          <div class="col-12 col-sm-auto mb-sm-2">
                            <div class="avatar avatar-5xl">
                               <div class="d-flex align-items-center mb-3">
                              <img class="rounded-circle" src="../assets/img/user/<?= $rowstudent->picture?>" alt="" />
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
                                            <img class="rounded-circle" src="../assets/img/user/<?= $rowstudent->picture?>" alt="" style="height: 200px;width: 200px;"/>
                                             <input type="text" name="picturea" value="<?= $rowstudent->picture;?>" hidden>
                                            </center>
                                              <input type="text" name="studentID" value="<?= $rowstudent->StudentID;?>" hidden>
                                              <div class="mb-0">
                                                <label class="form-label" for="exampleFormControlInput1">Image</label>
                                                <input class="form-control" id="exampleFormControlInput1" type="file" accept="image/*" name="pic" value="">  
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
                          <div class="col-12 col-sm-auto flex-1">
                            <div class="d-flex align-items-center mb-3">
                              <h3><?= $rowstudent->firstname." ".$rowstudent->middlename." ".$rowstudent->lastname?><?php if($rowstudent->status=='Active'){ ?>
                            <span class="badge badge-phoenix badge-phoenix-success">Active</span>
                            <?php } ?>
                            <?php if($rowstudent->status=='Disabled'){ ?>
                            <span class="badge badge-phoenix badge-phoenix-warning">Disabled</span>
                            <?php } ?></h3>  <button class="btn btn-link p-0" data-bs-toggle="modal" data-bs-target="#editname"><span class="fas fa-pen fs-0 ms-3 text-500"></span></button>
                            </div>
                                  <div class="modal fade" id="editname" tabindex="-1" data-bs-backdrop="static" aria-labelledby="editname" aria-hidden="true">
                                      <div class="modal-dialog">
                                        <div class="modal-content">
                                          <div class="modal-header bg-primary">
                                            <h5 class="modal-title text-white" id="editname">Edit Name</h5><button class="btn p-1" type="button" data-bs-dismiss="modal" aria-label="Close"><span class="fas fa-times fs--1 text-white"></span></button>
                                          </div>
                                          <form method="post" action="query.php" >
                                          <div class="modal-body">
                                           <div class="mb-0" style="margin-top: 0px;">
                                            <label class="form-label" for="">First Name</label>
                                            <input class="form-control" id="" type="text" value="<?= $rowstudent->firstname; ?>" name="fname">  
                                          </div>
                                           <div class="mb-0" style="margin-top: 0px;">
                                            <label class="form-label" for="">Middle Name</label>
                                            <input class="form-control" id="" type="text" value="<?= $rowstudent->middlename; ?>" name="mname">  
                                          </div>
                                           <div class="mb-0" style="margin-top: 0px;">
                                            <label class="form-label" for="">Last Name</label>
                                            <input class="form-control" id="" type="text" value="<?= $rowstudent->lastname; ?>" name="lname">  
                                          </div>
                                           <input type="text" name="studentID" value="<?= $rowstudent->StudentID;?>" hidden>
                                          </div>
                                          <div class="modal-footer"><button class="btn btn-primary" type="submit" name="btnupdatename" >Update</button><a class="btn btn-outline-primary" type="button" data-bs-dismiss="modal">Cancel</a></div>
                                        </div>
                                        </form>
                                      </div>
                                    </div>
                            
                            <?php
                              // to get info of single row 
                              $xxx=mysqli_query($con,"SELECT * from agency where agencyNAME = '$rowstudent->agency'")or die(mysqli_error($con));
                              $rowxxx=mysqli_fetch_object($xxx);
                               ?>
                            <p class="" style="margin-bottom: 0px;"><b>Agency: </b><?= $rowstudent->agency; ?>
                            <?php if (!empty($rowstudent->agency)) {
                           
                            if($rowxxx->agencySTATUS=='Active'){ ?>
                            <span class="badge badge-phoenix badge-phoenix-success">Active</span>
                            <?php } ?>
                            <?php if($rowxxx->agencySTATUS=='Disabled'){ ?>
                            <span class="badge badge-phoenix badge-phoenix-warning">Disabled</span>
                            <?php }   # code...
                            }else{ echo "<i style='color:red;'>Please Apply!</i>";} ?></p>
                            <p class="" style="margin-top: 0px;margin-bottom: 0px;"><b>Course: </b><?= $rowstudent->department; ?></p>
                            <p class="" style="margin-top: 0px;margin-bottom: 0px;"><b>School: </b><?= $rowstudent->colleges; ?></p>
                            <p class="" style="margin-top: 0px;margin-bottom: 0px;"><b>Student Number: </b><?= $rowstudent->studentnumber; ?></p>
                            <p class="" style="margin-top: 0px;margin-bottom: 0px;"><b>Section: </b><?= $rowstudent->section; ?></p>
                            <p class="" style="margin-top: 0px;margin-bottom: 0px;"><b>Class Year: </b><?= $rowstudent->classyear; ?></p>
                            <div><a class="me-2" href=""><span class="fab fa-linkedin-in text-400 hover-primary"></span></a><a class="me-2" href=""><span class="fab fa-facebook text-400 hover-primary"></span></a><a href=""><span class="fab fa-twitter text-400 hover-primary"></span></a></div>
                          </div>
                        </div>
                        <div class=" border-top border-dashed border-300 pt-4">
                            <div class="d-flex align-items-center mb-3">
                               <h3 class="me-1">EDUCATIONAL BACKGROUND</h3>
                                <button class="btn btn-link p-0" data-bs-toggle="modal" data-bs-target="#educationalbackground"><span class="fas fa-pen fs-0 ms-3 text-500"></span></button>
                            </div>

                                    

                        <?php 
                              $educationalbackground=mysqli_query($con,"SELECT * from educationalbackground where studentID = '$studentID' ")or die(mysqli_error($con));
                              $roweducationalbackground=mysqli_fetch_object($educationalbackground);

                              if (empty($roweducationalbackground)) {
                        ?>
                              <div class="alert alert-outline-danger" role="alert">Empty, Please Update!</div>
                        <?php
                              }else{
                        ?>
                              <table class="table">
                                <thead>
                                  <tr>
                                    <th scope="col">LEVEL</th>
                                    <th scope="col">SCHOOL</th>
                                    <th scope="col">INCLUSIVE DATE</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <th scope="row">ELEMENTARY</th>
                                    <td><?= $roweducationalbackground->elementarySCHOOL;?></td>
                                    <td><?= $roweducationalbackground->elementaryDATE;?></td>
                                  </tr>
                                  <tr class="table-primary">
                                    <th scope="row">HIGH SCHOOL</th>
                                    <td><?= $roweducationalbackground->hightschoolSCHOOL;?></td>
                                    <td><?= $roweducationalbackground->hightschoolDATE;?></td>
                                  </tr>
                                  <tr class="table-secondary">
                                    <th scope="row">COLLEGE</th>
                                    <td><?= $roweducationalbackground->collegeSCHOOL;?></td>
                                    <td><?= $roweducationalbackground->collegeDATE;?></</td>
                                  </tr>
                                </tbody>
                              </table>
                        <?php
                              }
                        ?>
                        </div>

                               <div class="modal fade" id="educationalbackground" tabindex="-1" data-bs-backdrop="static" aria-labelledby="educationalbackground" aria-hidden="true">
                                      <div class="modal-dialog">
                                        <div class="modal-content">
                                          <div class="modal-header bg-primary">
                                            <h5 class="modal-title text-white" id="educationalbackground">EDUCATIONAL BACKGROUND</h5><button class="btn p-1" type="button" data-bs-dismiss="modal" aria-label="Close"><span class="fas fa-times fs--1 text-white"></span></button>
                                          </div>
                                          <form method="post" action="query.php" enctype="multipart/form-data">
                                          <div class="modal-body">
                                              <div class="mb-3">
                                                <label class="form-label" for="">Level</label>
                                                <input class="form-control" id="" type="text" placeholder="" name="elevel" value="Elementary" readonly="" />
                                              </div>
                                              <div class="mb-3">
                                                <label class="form-label" for="">School</label>
                                                <input class="form-control" id="" type="text" placeholder="" name="eschool" value="<?php if(!empty($roweducationalbackground)){ $roweducationalbackground->elementarySCHOOL;}?>" />
                                              </div>
                                              <div class="mb-3">
                                                <label class="form-label" for="">Date Exclusive</label>
                                                <input class="form-control" id="" type="text" placeholder="" name="edate" value="<?php if(!empty($roweducationalbackground)){ $roweducationalbackground->elementaryDATE;}?>" />
                                              </div>

                                              <div class="mb-3">
                                                <label class="form-label" for="">Level</label>
                                                <input class="form-control" id="" type="text" placeholder="" name="hlevel" value="High School" readonly=""/>
                                              </div>
                                              <div class="mb-3">
                                                <label class="form-label" for="">School</label>
                                                <input class="form-control" id="" type="text" placeholder="" name="hschool" value="<?php if(!empty($roweducationalbackground)){ $roweducationalbackground->hightschoolSCHOOL;}?>" />
                                              </div>
                                              <div class="mb-3">
                                                <label class="form-label" for="">Date Exclusive</label>
                                                <input class="form-control" id="" type="text" placeholder="" name="hdate" value="<?php if(!empty($roweducationalbackground)){ $roweducationalbackground->hightschoolDATE;}?>" />
                                              </div>

                                              <div class="mb-3">
                                                <label class="form-label" for="">Level</label>
                                                <input class="form-control" id="" type="text" placeholder="" name="clevel" value="College" readonly=""/>
                                              </div>
                                              <div class="mb-3">
                                                <label class="form-label" for="">School</label>
                                                <input class="form-control" id="" type="text" placeholder="" name="cschool" value="<?php if(!empty($roweducationalbackground)){$roweducationalbackground->collegeSCHOOL;}?>" />
                                              </div>
                                              <div class="mb-3">
                                                <label class="form-label" for="">Date Exclusive</label>
                                                <input class="form-control" id="" type="text" placeholder="" name="cdate" value="<?php if(!empty($roweducationalbackground)){ $roweducationalbackground->collegeDATE;}?>" />
                                              </div>

                                              <div class="mb-0">
                                              <label class="form-label" for="">EXTRACURRICULAR ACTIVITIES AND AWARDS RECEIVED</label>
                                              <textarea class="form-control" id="" rows="3" name="extra"> <?php if(!empty($roweducationalbackground)){ $roweducationalbackground->extracirricular;}?></textarea>
                                            </div>
                                          </div>
                                          <input type="text" name="studentID" value="<?= $rowstudent->StudentID;?>" hidden>
                                          <div class="modal-footer"><button class="btn btn-primary" type="submit" name="btneducationalbackground" >Submit</button><a class="btn btn-outline-primary" type="button" data-bs-dismiss="modal">Cancel</a></div>
                                        </div>
                                        </form>
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
                                          <input type="text" name="studentID" value="<?= $rowstudent->StudentID;?>" hidden>
                                          <div class="modal-footer"><button class="btn btn-primary" type="submit" name="btnsecurityquestions" >Submit</button><a class="btn btn-outline-primary" type="button" data-bs-dismiss="modal">Cancel</a></div>
                                        </div>
                                        </form>
                                      </div>
                                    </div>

                        <?php 
                              $securityQA=mysqli_query($con,"SELECT * from securityquestions where securityquestionsUSERID = '$studentID' and securityquestionsUSERTYPE = 'student'")or die(mysqli_error($con));
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
                            $dtr=mysqli_query($con,"SELECT * from studentjournal where studentID = '$rowstudent->StudentID'")or die(mysqli_error($con));
                            $rowdtr= mysqli_num_rows( $dtr );
                            ?>
                            <h6>Journal</h6>
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
                                  <input type="text" name="studentID" value="<?= $rowstudent->StudentID;?>" hidden>
                                  <div class="mb-0">
                                    <label class="form-label" for="exampleFormControlInput1">Address</label>
                                    <input class="form-control" id="exampleFormControlInput1" type="text" name="address" value="<?= $rowstudent->address; ?>">  
                                  </div>
                                  <div class="mb-0">
                                    <label class="form-label" for="exampleTextarea">Birth Date</label>
                                    <input class="form-control datetimepicker" id="datetimepicker" type="text"  data-options='{"enableTime":true,"dateFormat":"d/m/y","disableMobile":true}' value="<?= date("d/m/y",strtotime($rowstudent->birthdate)); ?>" name="birthdate"/>
                                  </div>
                                  <div class="mb-0">
                                    <label class="form-label" for="exampleFormControlInput2">Gender</label>
                                    <select class="form-select" aria-label="Default select example" name="gender">
                                      <option selected=""><?= $rowstudent->gender; ?></option>
                                      <option >Male</option>
                                      <option >Female</option>
                                    </select>  
                                  </div>
                                  <div class="mb-0" style="margin-top: 0px;">
                                    <label class="form-label" for="exampleFormControlInput3">Contact Number</label>
                                    <input class="form-control" id="exampleFormControlInput3" type="text" value="<?= $rowstudent->contactnumber; ?>" name="number">  
                                  </div>
                                  <div class="mb-0" style="margin-top: 0px;">
                                    <label class="form-label" for="">Civil Status</label>
                                    <input class="form-control" id="" type="text" value="<?= $rowstudent->civilstatus; ?>" name="civilstatus"> 
                                  </div>
                                    <div class="mb-0" style="margin-top: 0px;">
                                    <label class="form-label" for="">Religion</label>
                                    <input class="form-control" id="" type="text" value="<?= $rowstudent->religion; ?>" name="religion"> 
                                  </div>
                                    <div class="mb-0" style="margin-top: 0px;">
                                    <label class="form-label" for="">Height</label>
                                    <input class="form-control" id="" type="text" value="<?= $rowstudent->height; ?>" name="height"> 
                                  </div>
                                  <div class="mb-0" style="margin-top: 0px;">
                                    <label class="form-label" for="">Weight</label>
                                    <input class="form-control" id="" type="text" value="<?= $rowstudent->weight; ?>" name="weight"> 
                                  </div>
                               
                              </div>
                              <div class="modal-footer"><button class="btn btn-primary" type="submit" name="btnupdateinfo" >Update</button><a class="btn btn-outline-primary" type="button" data-bs-dismiss="modal">Cancel</a></div>
                            </div>
                            </form>
                          </div>
                        </div>
                        </div>
                        <h5 class="text-800">Address</h5>
                        <p class="text-800"><?= $rowstudent->address; ?></p>
                         <h5 class="text-800">Birth Date</h5>
                        <p class="text-800"><?= $rowstudent->birthdate; ?></p>
                         <h5 class="text-800">Gender</h5>
                        <p class="text-800"><?= $rowstudent->gender; ?></p>
                         <h5 class="text-800">Contact number</h5>
                        <p class="text-800"><?= $rowstudent->contactnumber; ?></p>
                         <h5 class="text-800">Civil Status</h5>
                        <p class="text-800"><?= $rowstudent->civilstatus; ?></p>
                         <h5 class="text-800">Religion</h5>
                        <p class="text-800"><?= $rowstudent->religion; ?></p>
                        <h5 class="text-800">Height</h5>
                        <p class="text-800"><?= $rowstudent->height; ?></p>
                        <h5 class="text-800">Weight</h5>
                        <p class="text-800"><?= $rowstudent->weight; ?></p>
                        <hr>
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
                                  <input type="text" name="studentID" value="<?= $rowstudent->StudentID;?>" hidden>
                                  <div class="mb-0">
                                    <label class="form-label" for="exampleFormControlInput1">Username</label>
                                    <input class="form-control" id="exampleFormControlInput1" type="text" name="username" value="<?= $rowstudent->studentnumber; ?>" readonly>  
                                  </div>
                                  <div class="mb-0" style="margin-top: 0px;">
                                    <label class="form-label" for="exampleFormControlInput3">Password</label>
                                    <input class="form-control" id="exampleFormControlInput3" type="text" value="*********" name="password">  
                                  </div>
                               <input type="text" name="studentID" value="<?= $rowstudent->StudentID;?>" hidden>
                              </div>
                              <div class="modal-footer"><button class="btn btn-primary" type="submit" name="btnupdatesecurity" >Update</button><a class="btn btn-outline-primary" type="button" data-bs-dismiss="modal">Cancel</a></div>
                            </div>
                            </form>
                          </div>
                        </div>
                         <h5 class="text-800">Username</h5>
                          <p class="text-800"><?= $rowstudent->studentnumber; ?></p>
                          <h5 class="text-800">Password</h5>
                          <p class="text-800">**********</p>
                      </div>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="card">
                      <div class="card-body">
                       <div class="d-flex align-items-center mb-3">
                          <h3 class="me-1">Work Experience</h3>
                          <button class="btn btn-link p-0" data-bs-toggle="modal" data-bs-target="#WorkExperience"><span class="fas fa-plus fs-0 ms-3 text-500"></span><span class="fas fa-pen fs-0 ms-3 text-500"></span></button>
                        </div>

                           <div class="modal fade" id="WorkExperience" tabindex="-1" data-bs-backdrop="static" aria-labelledby="WorkExperience" aria-hidden="true">
                                      <div class="modal-dialog">
                                        <div class="modal-content">
                                          <div class="modal-header bg-primary">
                                            <h5 class="modal-title text-white" id="WorkExperience">Work Experience</h5><button class="btn p-1" type="button" data-bs-dismiss="modal" aria-label="Close"><span class="fas fa-times fs--1 text-white"></span></button>
                                          </div>
                                          <form method="post" action="query.php" enctype="multipart/form-data">
                                          <div class="modal-body">
                                             <input type="text" name="studentID" value="<?= $rowstudent->StudentID;?>" hidden>
                                              <div class="mb-3">
                                                <label class="form-label" for="">INCLUSIVE DATE</label>
                                                <input class="form-control" id="" type="date" name="date" />
                                              </div>
                                               <div class="mb-3">
                                                <label class="form-label" for="">EMPLOYER</label>
                                                <input class="form-control" id="" type="text" name="employer" />
                                              </div>
                                               <div class="mb-3">
                                                <label class="form-label" for="">POSITION</label>
                                                <input class="form-control" id="" type="text" name="position" />
                                              </div>
                                          </div>
                                          <div class="modal-footer"><button class="btn btn-primary" type="submit" name="btnWorkExperience" >Add</button><a class="btn btn-outline-primary" type="button" data-bs-dismiss="modal">Cancel</a></div>
                                        </div>
                                        </form>
                                      </div>
                                    </div>


                        <table class="table">
                          <thead>
                            <tr>
                              <th scope="col">INCLUSIVE DATE</th>
                              <th scope="col">EMPLOYER</th>
                              <th scope="col">POSITION</th>
                              <th scope="col">ACTION</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php 
                                  $worklist=mysqli_query($con,"SELECT * from workexperience where workexperienceSTUDENTID = '$studentID' order by workexperienceINCLUSIVEDATE")or die(mysqli_error($con));
                                   while($rowworklist=mysqli_fetch_object($worklist)){

                                  if (empty($rowworklist)) {
                            ?>
                                  <div class="alert alert-outline-warning" role="alert">Please Add Work Experience!</div>
                            <?php
                                  }else{
                            ?>
                                  <tr>
                                    <th scope="row"><?= $rowworklist->workexperienceINCLUSIVEDATE;?></th>
                                    <td><?= $rowworklist->workexperienceEMPLOYER;?></td>
                                    <td><?= $rowworklist->workexperiencePOSITION;?></td>
                                    <td>
                                      <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#<?= $rowworklist->workexperienceACTION;?>">Update</button>

                                        <div class="modal fade" id="<?= $rowworklist->workexperienceACTION;?>" tabindex="-1" data-bs-backdrop="static" aria-labelledby="<?= $rowworklist->workexperienceACTION;?>" aria-hidden="true">
                                          <div class="modal-dialog">
                                            <div class="modal-content">
                                              <div class="modal-header bg-primary">
                                                <h5 class="modal-title text-white" id="<?= $rowworklist->workexperienceACTION;?>">Update Work Experience</h5><button class="btn p-1" type="button" data-bs-dismiss="modal" aria-label="Close"><span class="fas fa-times fs--1 text-white"></span></button>
                                              </div>
                                              <form method="post" action="query.php" enctype="multipart/form-data">
                                              <div class="modal-body">
                                                <div class="mb-3">
                                                  <label class="form-label" for="">INCLUSIVE DATE</label>
                                                  <input class="form-control" id="" type="date" value="<?= $rowworklist->workexperienceINCLUSIVEDATE;?>" name="date" />
                                                </div>
                                                <div class="mb-3">
                                                  <label class="form-label" for="">EMPLOYER</label>
                                                  <input class="form-control" id="" type="text" value="<?= $rowworklist->workexperienceEMPLOYER;?>"  name="employer"/>
                                                </div>
                                                <div class="mb-3">
                                                  <label class="form-label" for="">POSITION</label>
                                                  <input class="form-control" id="" type="text" value="<?= $rowworklist->workexperiencePOSITION;?>"  name="position"/>
                                                </div>
                                                <input type="text" name="workexperienceID" value="<?= $rowworklist->workexperienceID;?>" hidden>
                                              </div>
                                              <div class="modal-footer"><button class="btn btn-primary" type="submit" name="btnupdateworkexperience" >Submit</button><a class="btn btn-outline-primary" type="button" data-bs-dismiss="modal">Cancel</a></div>
                                            </div>
                                            </form>
                                          </div>
                                        </div>

                                      <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#<?= $rowworklist->workexperienceACTION;?>D">Delete</button></td>
                                         <div class="modal fade" id="<?= $rowworklist->workexperienceACTION;?>D" tabindex="-1" data-bs-backdrop="static" aria-labelledby="<?= $rowworklist->workexperienceACTION;?>D" aria-hidden="true">
                                          <div class="modal-dialog">
                                            <div class="modal-content">
                                              <div class="modal-header bg-primary">
                                                <h5 class="modal-title text-white" id="<?= $rowworklist->workexperienceACTION;?>D">Delate Work Experience</h5><button class="btn p-1" type="button" data-bs-dismiss="modal" aria-label="Close"><span class="fas fa-times fs--1 text-white"></span></button>
                                              </div>
                                              <form method="post" action="query.php" enctype="multipart/form-data">
                                              <div class="modal-body">
                                                <div class="mb-3">
                                                  <label class="form-label" for="">INCLUSIVE DATE</label>
                                                  <input class="form-control" id="" type="date" value="<?= $rowworklist->workexperienceINCLUSIVEDATE;?>" name="date" readonly />
                                                </div>
                                                <div class="mb-3">
                                                  <label class="form-label" for="">EMPLOYER</label>
                                                  <input class="form-control" id="" type="text" value="<?= $rowworklist->workexperienceEMPLOYER;?>"  name="employer" readonly/>
                                                </div>
                                                <div class="mb-3">
                                                  <label class="form-label" for="">POSITION</label>
                                                  <input class="form-control" id="" type="text" value="<?= $rowworklist->workexperiencePOSITION;?>"  name="position" readonly/>
                                                </div>
                                                <div class="alert alert-soft-danger" role="alert">Are You sure To Delete This?</div>
                                                <input type="text" name="workexperienceID" value="<?= $rowworklist->workexperienceID;?>" hidden>
                                              </div>
                                              <div class="modal-footer"><button class="btn btn-primary" type="submit" name="btndeleteworkexperience" >Delete</button><a class="btn btn-outline-primary" type="button" data-bs-dismiss="modal">Cancel</a></div>
                                            </div>
                                            </form>
                                          </div>
                                        </div>


                                  </tr>
                            <?php
                                  }}
                            ?>
                            
                           
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>

                    <div class="col-12">
                    <div class="card">
                      <div class="card-body">
                       <div class="d-flex align-items-center mb-3">
                          <h3 class="me-1">TRAININGS AND SEMINARS ATTENDED</h3>
                          <button class="btn btn-link p-0" data-bs-toggle="modal" data-bs-target="#trainings"><span class="fas fa-plus fs-0 ms-3 text-500"></span><span class="fas fa-pen fs-0 ms-3 text-500"></span></button>
                        </div>

                           <div class="modal fade" id="trainings" tabindex="-1" data-bs-backdrop="static" aria-labelledby="trainings" aria-hidden="true">
                                      <div class="modal-dialog">
                                        <div class="modal-content">
                                          <div class="modal-header bg-primary">
                                            <h5 class="modal-title text-white" id="trainings">TRAININGS AND SEMINARS ATTENDED</h5><button class="btn p-1" type="button" data-bs-dismiss="modal" aria-label="Close"><span class="fas fa-times fs--1 text-white"></span></button>
                                          </div>
                                          <form method="post" action="query.php" enctype="multipart/form-data">
                                          <div class="modal-body">
                                             <input type="text" name="studentID" value="<?= $rowstudent->StudentID;?>" hidden>
                                              <div class="mb-3">
                                                <label class="form-label" for="">INCLUSIVE DATE</label>
                                                <input class="form-control" id="" type="date" name="date" />
                                              </div>
                                               <div class="mb-3">
                                                <label class="form-label" for="">TITLE</label>
                                                <input class="form-control" id="" type="text" name="title" />
                                              </div>
                                          </div>
                                          <div class="modal-footer"><button class="btn btn-primary" type="submit" name="btntrainings" >Add</button><a class="btn btn-outline-primary" type="button" data-bs-dismiss="modal">Cancel</a></div>
                                        </div>
                                        </form>
                                      </div>
                                    </div>


                        <table class="table">
                          <thead>
                            <tr>
                              <th scope="col">INCLUSIVE DATE</th>
                              <th scope="col" colspan="">TITLE</th>
                              <th scope="col"></th>
                              <th scope="col">ACTION</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php 
                                  $trainings=mysqli_query($con,"SELECT * from trainings where trainingsSTUDENTID = '$studentID' order by trainingsINCLUSIVEDATE")or die(mysqli_error($con));
                                   while($rowtrainings=mysqli_fetch_object($trainings)){

                                  if (empty($rowtrainings)) {
                            ?>
                                  <div class="alert alert-outline-warning" role="alert">Please Add Work Experience!</div>
                            <?php
                                  }else{
                            ?>
                                  <tr>
                                    <th scope="row"><?= $rowtrainings->trainingsINCLUSIVEDATE;?></th>
                                    
                                    <td colspan="2"><?= $rowtrainings->trainingsTITLE;?></td>
                                    
                                    <td>
                                      <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#<?= $rowtrainings->trainingsACTION;?>">Update</button>

                                        <div class="modal fade" id="<?= $rowtrainings->trainingsACTION;?>" tabindex="-1" data-bs-backdrop="static" aria-labelledby="<?= $rowtrainings->trainingsACTION;?>" aria-hidden="true">
                                          <div class="modal-dialog">
                                            <div class="modal-content">
                                              <div class="modal-header bg-primary">
                                                <h5 class="modal-title text-white" id="<?= $rowtrainings->trainingsACTION;?>">Update Work Experience</h5><button class="btn p-1" type="button" data-bs-dismiss="modal" aria-label="Close"><span class="fas fa-times fs--1 text-white"></span></button>
                                              </div>
                                              <form method="post" action="query.php" enctype="multipart/form-data">
                                              <div class="modal-body">
                                                <div class="mb-3">
                                                  <label class="form-label" for="">INCLUSIVE DATE</label>
                                                  <input class="form-control" id="" type="date" value="<?= $rowtrainings->trainingsINCLUSIVEDATE;?>" name="date" />
                                                </div>
                                                <div class="mb-3">
                                                  <label class="form-label" for="">EMPLOYER</label>
                                                  <input class="form-control" id="" type="text" value="<?= $rowtrainings->trainingsTITLE;?>"  name="title"/>
                                                </div>
                                                <input type="text" name="trainingsID" value="<?= $rowtrainings->trainingsID;?>" hidden>
                                              </div>
                                              <div class="modal-footer"><button class="btn btn-primary" type="submit" name="btnupdatetrainings" >Submit</button><a class="btn btn-outline-primary" type="button" data-bs-dismiss="modal">Cancel</a></div>
                                            </div>
                                            </form>
                                          </div>
                                        </div>

                                      <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#<?= $rowtrainings->trainingsACTION;?>D">Delete</button></td>
                                         <div class="modal fade" id="<?= $rowtrainings->trainingsACTION;?>D" tabindex="-1" data-bs-backdrop="static" aria-labelledby="<?= $rowtrainings->trainingsACTION;?>D" aria-hidden="true">
                                          <div class="modal-dialog">
                                            <div class="modal-content">
                                              <div class="modal-header bg-primary">
                                                <h5 class="modal-title text-white" id="<?= $rowtrainings->trainingsACTION;?>D">Delate Work Experience</h5><button class="btn p-1" type="button" data-bs-dismiss="modal" aria-label="Close"><span class="fas fa-times fs--1 text-white"></span></button>
                                              </div>
                                              <form method="post" action="query.php" enctype="multipart/form-data">
                                              <div class="modal-body">
                                                <div class="mb-3">
                                                  <label class="form-label" for="">INCLUSIVE DATE</label>
                                                  <input class="form-control" id="" type="date" value="<?= $rowtrainings->trainingsINCLUSIVEDATE;?>" name="date" readonly />
                                                </div>
                                                <div class="mb-3">
                                                  <label class="form-label" for="">TITLE</label>
                                                  <input class="form-control" id="" type="text" value="<?= $rowtrainings->trainingsTITLE;?>"  name="title" readonly/>
                                                </div>
                                                <div class="alert alert-soft-danger" role="alert">Are You sure To Delete This?</div>
                                                <input type="text" name="trainingsID" value="<?= $rowtrainings->trainingsID;?>" hidden>
                                              </div>
                                              <div class="modal-footer"><button class="btn btn-primary" type="submit" name="btndeletetrainings" >Delete</button><a class="btn btn-outline-primary" type="button" data-bs-dismiss="modal">Cancel</a></div>
                                            </div>
                                            </form>
                                          </div>
                                        </div>


                                  </tr>
                            <?php
                                  }}
                            ?>
                            
                           
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                
                   <div class="col-12">
                    <div class="card">
                      <div class="card-body">
                        ...
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
    <script src="../assets/js/flatpickr.js"></script>
  </body>

</html>