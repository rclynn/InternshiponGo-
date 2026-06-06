<?php include('../1connection.php'); ?>
<?php include('1session.php'); 
$search2=$_GET['search'];
 $search=strtoupper($search2);
?>
<!DOCTYPE html>
<html lang="en-US" dir="ltr">

<?php include('1head.php'); ?>
 <style>
.filterDiv {
  float: left;
 /* background-color: #2196F3;
  color: #ffffff;
  width: 100px;
  line-height: 100px;
  text-align: center;
  margin: 2px;*/
  display: none;
}

.show {
  display: block;
}



/* Style the buttons */


.btn.active {
  background-color: white;
  color: red;
}
</style>
<script>
function highlight(text) {
  var inputText = document.getElementById("inputText");
  var innerHTML = inputText.innerHTML;
  var index = innerHTML.indexOf(text);
  if (index >= 0) { 
   innerHTML = innerHTML.substring(0,index) + "<span class='highlight'>" + innerHTML.substring(index,index+text.length) + "</span>" + innerHTML.substring(index + text.length);
   inputText.innerHTML = innerHTML;
  }
}
</script>
<style>
.highlight {
  background-color: yellow;
}
</style>
  <body onLoad="highlight('<?= $search; ?>')">
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
              <li class="breadcrumb-item"><a href="">Job Posted</a></li>
              <li class="breadcrumb-item active">Job Posted</li>
            </ol>
          </nav>
          <h2 class="mb-7">Job Posted</h2>

          <div class="row">
            <div class="col-12">
             
              <div class="row align-items-center justify-content-between g-3 mb-3">
                  <div class="col col-auto">
                    <div class="search-box">
                      <form class="position-relative" data-bs-toggle="search" data-bs-display="static" method="post" action="query.php"><input class="form-control search-input search" type="search" placeholder="Search" aria-label="Search" name="Keyword" value="<?= $search; ?>" required="" minlength="3"/>
                       <button class="btn btn-link " style="" name="btnsearch"><img src="../assets/img/s.png" style="height: 18px; margin-top: -80px; margin-left: -10px;"><!-- <span class="fas fa-search search-box-icon"></span> --></button>
                      </form>
                    </div>
                  </div>
            
            </div>
          </div>
          <br><br>
          <div class="row">
            <div class="col-xl-12 col-xxl-9 mb-6">
              <div class="myBtnContainer tabs">
                <ul class="nav nav-underline nav-tabs mb-3 border-0" id="nav-tab" role="tablist">
                  
                  <li class="nav-item" role="presentation"><button class="nav-link active" id="pills-month-tab" data-bs-toggle="pill" data-bs-target="#pills-month" type="button" role="tab" aria-controls="pills-month" aria-selected="true" onclick="filterSelection('all')">All</button></li>
                  <li class="nav-item" role="presentation"><button class="nav-link " id="pills-month-tab" data-bs-toggle="pill" data-bs-target="#pills-month" type="button" role="tab" aria-controls="pills-month" aria-selected="true" onclick="filterSelection('Active')">Active</button></li>
                  <li class="nav-item" role="presentation"><button class="nav-link " id="pills-month-tab" data-bs-toggle="pill" data-bs-target="#pills-month" type="button" role="tab" aria-controls="pills-month" aria-selected="true" onclick="filterSelection('Disabled')">Disabled</button></li>
                  <li class="nav-item" role="presentation"><button class="nav-link " id="pills-month-tab" data-bs-toggle="pill" data-bs-target="#pills-month" type="button" role="tab" aria-controls="pills-month" aria-selected="true" onclick="filterSelection('Deleted')">Deleted</button></li>
                  <?php
                              $tag=mysqli_query($con,"SELECT *  from tag ")or die(mysqli_error($con));
                              while($rowtag=mysqli_fetch_object($tag))
                              {  
                              ?>
                   <li class="nav-item" role="presentation"><button class="nav-link" id="pills-month-tab" data-bs-toggle="pill" data-bs-target="#pills-month" type="button" role="tab" aria-controls="pills-month" aria-selected="true" onclick="filterSelection('<?= $rowtag->tagNAME; ?>')"><?= $rowtag->tagNAME; ?></button></li>
              <?php } ?>                    
                </ul>
                <div class="tab-content" id="pills-tabContent">
                  <div class="tab-pane fade show active" id="pills-month" role="tabpanel" aria-labelledby="pills-month-tab">
                    <div class="row g-3">
 <?php 
$i=0;

if (!empty($search)) {
$agency=mysqli_query($con,"SELECT *  from work where workNAME LIKE '%$search%' or workDETAILS LIKE '%$search%' or workQUALIFICATIONS LIKE'%$search%' or worktags LIKE '%$search%'")or die(mysqli_error($con));
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

                $usertags = explode(',', $rowagency->worktags);?>                     
                     
                       <div class="filterDiv <?php  foreach($usertags as $keytags){ ?> <?= $keytags ?> <?php } ?> <?= $rowagency->workSTATUS; ?> col-12 col-md-6 col-lg-12 col-xl-6">
                        <?php if($rowagency->workSTATUS == 'Active'){?>
                        <div class=" card h-100 border-success  success-boxshadow bg-success-soft" style="background-color: #DCFFC2;">
                        <?php } ?>
                        <?php if($rowagency->workSTATUS == 'Disabled'){?>
                        <div class=" card h-100 border-success  success-boxshadow bg-success-soft" style="background-color: #FFE4C2;">
                        <?php } ?>
                        <?php if($rowagency->workSTATUS == 'Deleted'){?>
                         <div class=" card h-100 border-success  success-boxshadow bg-success-soft" style="background-color: #FFCDC2;">
                         <?php } ?>
                        
                          <div class="bg-holder" style="background-image:url(../assets/img/bg/bg-10.png);background-position:left bottom;background-size:auto;"></div>
                          <!--/.bg-holder-->
                          <div class="card-body d-flex flex-column justify-content-between position-relative z-index-2">
                            <div class="d-flex justify-content-between">
                              <div class="mb-5 mb-md-0 mb-lg-5">
                                <div id="inputText">
                                <div class="d-sm-flex align-items-center mb-3">
                                  <h3 class="mb-0 mb-"><?= strtoupper($rowagency->workNAME); ?></h3>
                                </div>
                                <p class="fs--1"><?php echo strtoupper($rowagency->workDETAILS); ?></p>
                                
                                <?php  foreach($usertags as $keytags){ ?>
                                <span class="badge badge-phoenix badge-phoenix-secondary"><?= strtoupper($keytags); ?></span>
                                <?php } ?>
                                <?php if($rowagency->workSTATUS == 'Active'){?>
                                  <span class='badge badge-phoenix badge-phoenix-success'><?= $rowagency->workSTATUS; ?></span>
                                <?php } ?>
                                <?php if($rowagency->workSTATUS == 'Disabled'){?>
                                  <span class='badge badge-phoenix badge-phoenix-warning'><?= $rowagency->workSTATUS; ?></span>
                                <?php } ?>
                                <?php if($rowagency->workSTATUS == 'Deleted'){?>
                                  <span class='badge badge-phoenix badge-phoenix-danger'><?= $rowagency->workSTATUS; ?></span>
                                <?php } ?>
                                </div>
                              </div><img src="../assets/img/spot-illustrations/shield.png" width="54" height="54" alt="" />
                            </div>
                            <div class="row ">
                              <div class="col-5 mb-2 mb-sm-0 mb-md-2 mb-lg-0">
                                 <li class="d-flex align-items-center"><span class="check-circle text-primary me-2" data-feather="users"></span><span class="text-700 fw-semi-bold"><?= "Up to ".$total . " Members"; ?></span></li>
                                 <li class="d-flex align-items-center"><span class="check-circle text-warning me-2" data-feather="user-plus"></span><span class="text-700 fw-semi-bold"><?= "Applied: ". $rowapplicantall. " "; ?></span></li>
                                 <li class="d-flex align-items-center"><span class="check-circle text-success me-2" data-feather="user-check"></span><span class="text-700 fw-semi-bold"><?= "Accepted: ". $rowapplicantacceptedall. " "; ?></span></li>
                                 <hr>
                                   <a href="viewjob.php?workID=<?= $rowagency->workID; ?>" class="btn btn-primary">View</a> 
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
<?php } }else{ echo"<script type='text/javascript'>window.location.replace('workplace.php');</script>"; }  ?>                      



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
<script>
filterSelection("all")
function filterSelection(c) {
  var x, i;
  x = document.getElementsByClassName("filterDiv");
  if (c == "all") c = "";
  for (i = 0; i < x.length; i++) {
    w3RemoveClass(x[i], "show");
    if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], "show");
  }
}

function w3AddClass(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {
    if (arr1.indexOf(arr2[i]) == -1) {element.className += " " + arr2[i];}
  }
}

function w3RemoveClass(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {
    while (arr1.indexOf(arr2[i]) > -1) {
      arr1.splice(arr1.indexOf(arr2[i]), 1);     
    }
  }
  element.className = arr1.join(" ");
}

// Add active class to the current button (highlight it)
var btnContainer = document.getElementById("myBtnContainer");
var btns = btnContainer.getElementsByClassName("btn");
for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function(){
    var current = document.getElementsByClassName("active");
    current[0].className = current[0].className.replace(" active", "");
    this.className += " active";
  });
}
</script>