<?php include('../1connection.php'); ?>
<?php include('1session.php'); ?>
<?php 
//to select specific rows in the table
 if(isset($_GET['studentID']) ? $_GET['studentID'] : ''){
    $studentID = $_GET['studentID'];
$student=mysqli_query($con,"SELECT * from student where StudentID = '$studentID'")or die(mysqli_error($con));
      $rowstudent=mysqli_fetch_object($student);
 }else{
         echo"<script type='text/javascript'>window.location.replace('errors-404.php');</script>";
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
                <h2 class="mb-0">View Profile</h2>
              </div>
              <div class="col-auto">
                <!-- div class="row g-3">
                  <div class="col-auto"><button class="btn btn-phoenix-danger"><span class="fa-solid fa-trash-can me-2"></span>Delete customer</button></div>
                  <div class="col-auto"><button class="btn btn-phoenix-secondary"><span class="fas fa-key me-2"></span>Reset password</button></div> -->
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
                            <div class="avatar avatar-5xl"><img class="rounded-circle" src="../assets/img/user/<?= $rowstudent->picture?>" alt="" /></div>
                          </div>
                          <div class="col-12 col-sm-auto flex-1">
                            <h3><?= $rowstudent->firstname." ".$rowstudent->middlename." ".$rowstudent->lastname?><?php if($rowstudent->status=='Active'){ ?>
                            <span class="badge badge-phoenix badge-phoenix-success">Active</span>
                            <?php } ?>
                            <?php if($rowstudent->status=='Disabled'){ ?>
                            <span class="badge badge-phoenix badge-phoenix-warning">Disabled</span>
                            <?php } ?></h3>
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
                            <div><a class="me-2" href="customer-details.html#!"><span class="fab fa-linkedin-in text-400 hover-primary"></span></a><a class="me-2" href=""><span class="fab fa-facebook text-400 hover-primary"></span></a><a href=""><span class="fab fa-twitter text-400 hover-primary"></span></a></div>
                          </div>
                        </div>
                         <style>
.checked {
  color: orange;
}
</style>
                        <div class=" border-top border-dashed border-300 pt-4">
                            <div class="d-flex align-items-center mb-3">
                               <h3 class="me-1">Skills</h3>
                                
                            </div>
                            <?php 
                              $studentskills=mysqli_query($con,"SELECT * from studentskills where studentskillsSTUDENTID = '$studentID' ")or die(mysqli_error($con));
                              $rowstudentskills=mysqli_fetch_object($studentskills);

                              if (empty($rowstudentskills)) {
                        ?>
                              <div class="alert alert-outline-danger" role="alert">Empty, Please Update!</div>
                        <?php
                              }else{
                                 $tagall=''; 
                                  $studentskills2=mysqli_query($con,"SELECT * from studentskills where studentskillsSTUDENTID = '$studentID' ")or die(mysqli_error($con));
                                while($rowstudentskills2=mysqli_fetch_object($studentskills2))
                                    { 
                                      

                                if($rowstudentskills2->studentskillsTAGNAME != 'students'){
                                  if ($rowstudentskills2->studentskillsDES=='cus') {
                                    $tagall=$tagall.','.$rowstudentskills2->studentskillsTAGNAME;
                                  }
                                  
                        ?>
                              <span class="badge badge-light-primary"><?= $rowstudentskills2->studentskillsTAGNAME ?>
                              <?php if ($rowstudentskills2->studentskillsRATE==0) { ?>
                              <span class="fa fa-star "></span>
                              <span class="fa fa-star " ></span>
                              <span class="fa fa-star "></span>
                              <span class="fa fa-star"></span>
                              <span class="fa fa-star"></span>
                              <?php } else if ($rowstudentskills2->studentskillsRATE==1) { ?>
                                <span class="fa fa-star checked"></span>
                              <span class="fa fa-star "></span>
                              <span class="fa fa-star "></span>
                              <span class="fa fa-star"></span>
                              <span class="fa fa-star"></span>
                              <?php } else if ($rowstudentskills2->studentskillsRATE==2) { ?>
                                <span class="fa fa-star checked"></span>
                              <span class="fa fa-star checked"></span>
                              <span class="fa fa-star "></span>
                              <span class="fa fa-star"></span>
                              <span class="fa fa-star"></span>
                              <?php } else if ($rowstudentskills2->studentskillsRATE==3) { ?>
                                <span class="fa fa-star checked"></span>
                              <span class="fa fa-star checked"></span>
                              <span class="fa fa-star checked"></span>
                              <span class="fa fa-star"></span>
                              <span class="fa fa-star"></span>
                              <?php } else if ($rowstudentskills2->studentskillsRATE==4) { ?>
                                <span class="fa fa-star checked"></span>
                              <span class="fa fa-star checked"></span>
                              <span class="fa fa-star checked"></span>
                              <span class="fa fa-star checked"></span>
                              <span class="fa fa-star"></span>
                              <?php } else if ($rowstudentskills2->studentskillsRATE==5) { ?>
                                <span class="fa fa-star checked"></span>
                              <span class="fa fa-star checked"></span>
                              <span class="fa fa-star checked"></span>
                              <span class="fa fa-star checked"></span>
                              <span class="fa fa-star checked"></span>
                              <?php } ?> 
                            </span>
                        <?php
                              }}
                            }
                        ?>          

                       <br><br>

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
                          <!-- <button class="btn btn-link p-0" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><span class="fas fa-pen fs-0 ms-3 text-500"></span></button> -->

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
                               
                              </div>
                              <div class="modal-footer"><button class="btn btn-primary" type="submit" name="btnupdateinfo" disabled="">Update</button><a class="btn btn-outline-primary" type="button" data-bs-dismiss="modal">Cancel</a></div>
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

                      </div>
                    </div>
                  </div>
                  <div class="col-12 col-xxl-6">
                    <div class="card ">
                      <div class="card-body">
                        <a href="viewstudents.php?studentID=<?= $studentID; ?>" class="btn btn-primary">Statistics</a><a href="viewstudentsform.php?studentID=<?= $studentID; ?>" class="btn btn-secondary" style="margin-left: 10px;">Forms</a>
                      </div>
                    </div>
                  </div>
                  <div class="col-12 col-xxl-6">
                    <div class="card ">
                      <div class="card-body">
                        <h2 class="text-bold text-1100 mb-5">Electronic Generated Forms</h2>
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
            <div class="">
              <div class="table-responsive scrollbar ms-n1 ps-1">
              <table class="table table-sm fs--1 mb-0">
                  <thead>
                    <tr>
                     
                      
                      <th class="sort align-middle" scope="col" data-sort="name" style="width: 250px;">Forms Name</th>
                      <th class="sort align-middle" scope="col" data-sort="images" style="width: 250px; padding-left: 50px;">Details</th>
                     <th style="width: 200px;"></th>
                      <th class="sort align-right" scope="col" data-sort="id" style="width: 200px;">View</th>
                
                    </tr>
                  </thead>
                  <tbody class="list" id="table-latest-review-body">
 <?php
              $form=mysqli_query($con,"SELECT * from cform")or die(mysqli_error($con));
              while($row=mysqli_fetch_object($form))
              {
               


?>

                    <tr class="hover-actions-trigger btn-reveal-trigger position-static">
                      
                       <td class="name align-middle white-space-nowrap" ><a class="fw-semi-bold text-1100" href=""><?=$row->Cformname;?></a></td>
                      <td class="images align-middle white-space-nowrap"><a class="fw-semi-bold text-1100" href=""></a></td>
                      <td ></td>
                       <td class="id align-right white-space-nowrap">
                      <a href="viewreportstudents.php?cformid=<?=$row->CformID;?>&studentID=<?=$studentID;?>" class="btn btn-primary">View</a>
                        </td>
                    </tr>
                   
<?php } ?>
                  </tbody>
                </table>
              </div>
              <div class="row align-items-center justify-content-between py-2 pe-0 fs--1">
                <div class="col-auto d-flex">
                  <p class="mb-0 d-none d-sm-block me-3 fw-semi-bold text-900" data-list-info="data-list-info"></p><a class="fw-semi-bold" href="report.php#!" data-list-view="*">View all<span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span></a><a class="fw-semi-bold d-none" href="report.php#!" data-list-view="less">View Less<span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span></a>
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
    <script src="../vendors/echarts/echarts.min.js"></script>
    <script src="../vendors/chart/chart.min.js"></script>
    <script src="../vendors/list.js/list.min.js"></script>
    <script src="../vendors/leaflet/leaflet.js"></script>
    <script src="../vendors/leaflet.markercluster/leaflet.markercluster.js"></script>
    <script src="../vendors/leaflet.tilelayer.colorfilter/leaflet-tilelayer-colorfilter.min.js"></script>
   <!--      <script src="../assets/js/ecommerce-dashboard.js"></script> -->
  </body>
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="../code/highcharts.js"></script>
<script src="../code/modules/exporting.js"></script>
<script src="../code/modules/export-data.js"></script>
<script src="../code/modules/accessibility.js"></script>
 <script type="text/javascript" src="../googlechart/CalendarChart.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["calendar"]});
      google.charts.setOnLoadCallback(drawChart);

   function drawChart() {
       var dataTable = new google.visualization.DataTable();
       dataTable.addColumn({ type: 'date', id: 'Date' });
       dataTable.addColumn({ type: 'number', id: 'Submitted' });
       dataTable.addRows([
          
         <?php

            $journal2=mysqli_query($con,"SELECT studentjournal.*,student.* from studentjournal,student where studentjournal.studentID = student.studentID")or die(mysqli_error($con));
              while($row2=mysqli_fetch_object($journal2))
              {
               if ($rowstudent->StudentID == $row2->StudentID ) { ?>
                  [ new Date(<?= date("Y,m,d",strtotime($row2->journaldate."-1 month"));?>), 0 ],
              <?php } }?>
        ]);

       var chart = new google.visualization.Calendar(document.getElementById('calendar_basic'));

       var options = {
         title: "Journal Daily Submitted",
         
       };

       chart.draw(dataTable, options);
   }
    </script>
 <?php 
  $count2=0;
            $count=0;
            $total=162;
            $incomplete =0;
            $complete = 0;
            $incompletesum = 0;
              
              $journal=mysqli_query($con,"SELECT studentjournal.*,student.* from studentjournal,student where studentjournal.studentID = student.studentID")or die(mysqli_error($con));
              while($row=mysqli_fetch_object($journal))
              {
               if ($rowstudent->StudentID == $row->StudentID ) {
                   # code...
                 $count++;
               }}
              ?>
             
             <?php 

                $counth=$count;


                $incomplete = 61 - $counth;
                $completesum = ($count /  $total) *100;
                $incompletesum = ($incomplete /  $total) *100;

?>


<script type="text/javascript">
// Build the chart
Highcharts.chart('container', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Number of Daily Journal Submitted'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    accessibility: {
        point: {
            valueSuffix: '%'
        }
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: false
            },
            showInLegend: true
        }
    },
    series: [{
        name: 'Journal',
        colorByPoint: true,
        data: [{
            name: 'Submitted: <?= $counth;?> Journal',
            y: <?=$completesum?>
        }, {
            name: 'Not Completed: <?= $incomplete;?> Journal',
            y: <?=$incompletesum?>
        }]
    }]
});
    </script>

      <script type="text/javascript">
Highcharts.chart('container2', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: 0,
        plotShadow: false
    },
    title: {
        text: 'Number of Hours Completed',
        
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    accessibility: {
        point: {
            valueSuffix: '%'
        }
    },
   plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: false
            },
            showInLegend: true
        }
    },
    series: [{
        type: 'pie',
        name: 'Hours',
        innerSize: '50%',
        data: [
            ['Taken: <?= round($sumtotal2345);?> Hours', <?= $completesum2;?>],
            ['Remaining: <?= round($incomplete2);?> Hours', <?= $incompletesum2;?>]
        ]
    }]
});

    </script>