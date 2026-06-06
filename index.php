<?php include('1connection.php'); ?>
<!DOCTYPE html>
<html lang="en-US" dir="ltr">

<?php include('1head.php'); ?>
<style type="text/css">
  .link-container {
   
  }

  .link-container a {
    display: block;
    height: 100%;
    text-align: center;
  }

  .link-container a:hover {
    background: #a4bffd;
  }
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
<script src="https://code.iconify.design/iconify-icon/1.0.2/iconify-icon.min.js"></script>
  <body>
    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">
      <div class="landing">
        <nav class="navbar bg-white navbar-expand-lg sticky-top">
          <div class="container-small"><a class="navbar-brand" href="index.html">
              <div class="d-flex align-items-center"><img src="assets/img/icons/removebg-preview.png" alt="phoenix" width="32" />
                <p class="logo-text ms-2">InternshiponGo</p>
              </div>
            </a><button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link fs--1 fw-bold active" aria-current="page" href="index.php#">Home</a></li>
                <li class="nav-item"><a class="nav-link fs--1 fw-bold" href="#about">About</a></li>
                <li class="nav-item"><a class="nav-link fs--1 fw-bold" href="#job">Job</a></li>
                <li class="nav-item"><a class="nav-link fs--1 fw-bold" href="#blog">Blog</a></li>
              </ul>
              <div class="d-flex align-items-center"><button class="btn btn-phoenix-primary order-0" type="submit"><span class="fw-bold">Sign In</span></button></div>
            </div>
          </div>
        </nav>
        <section class="bg-white pb-8" id="home">
          <div class="container-small hero-header-container">
            <div class="row align-items-center">
              <div class="col-12 col-lg-auto order-0 order-md-1 text-end order-1">
                <div class="position-relative p-5 p-md-7 d-lg-none">
                  <div class="bg-holder" style="background-image:url(assets/img/bg/bg-23.png);background-size:contain;"></div>
                  <!--/.bg-holder-->
                  <div class="position-relative"><img class="w-100" src="assets/img/bannner-removebg-preview.png" alt="hero-header" /></div>
                </div>
                <div class="hero-image-container position-absolute top-0 bottom-0 end-0 d-none d-lg-block">
                  <div class="position-relative h-100 w-100">
                    <div class="position-absolute h-100 top-0 d-flex align-items-center end-0" style="left:-23%;"><img class="pt-7 pt-md-0 w-100" src="assets/img/bg/bg-1-2.png" alt="hero-header" /></div>
                    <div class="position-absolute h-100 top-0 d-flex align-items-center end-0"><img class="pt-7 pt-md-0 w-100" src="assets/img/bannner-removebg-preview.png" alt="hero-header" /></div>
                  </div>
                </div>
              </div>
              <div class="col-12 col-lg-6 text-lg-start text-center pt-8 pb-6 order-0">
                <h1 class="fs-5 fs-lg-6 fs-md-7 fs-lg-6 fs-xl-7 fs fw-black mb-4"><span class="text-primary me-3">Search</span> discover, and <span class="text-primary me-3">Apply</span></h1>
                <p class="mb-5">InternshiponGo understands the importance of on-the-job training for students, and is dedicated to connecting them with opportunities for hands-on learning and real-world experience.</p>
              </div>
            </div>
          </div>
        </section>

        <!-- ============================================-->
        <!-- <section> begin ============================-->
       <!--  <section class="py-5 pt-xl-13 bg-white">
          <div class="container-small">
            <div class="row g-0">
              <div class="col-6 col-md-3 py-5 text-center border-1 border-dashed border-bottom border-end"><img class="img-fluid" src="assets/img/brand2/netflix.png" alt="" /></div>
              <div class="col-6 col-md-3 py-5 text-center border-1 border-dashed border-bottom border-end-md"><img class="img-fluid" src="assets/img/brand2/slack.png" alt="" /></div>
              <div class="col-6 col-md-3 py-5 text-center border-1 border-dashed border-bottom border-end border-end-md"><img class="img-fluid" src="assets/img/brand2/freelancer.png" alt="" /></div>
              <div class="col-6 col-md-3 py-5 text-center border-1 border-dashed border-bottom border-end-lg-0"><img class="img-fluid" src="assets/img/brand2/facebook.png" alt="" /></div>
              <div class="col-6 col-md-3 py-5 text-center border-1 border-dashed border-end border-bottom border-bottom-md-0"><img class="img-fluid" src="assets/img/brand2/shopify.png" alt="" /></div>
              <div class="col-6 col-md-3 py-5 text-center border-1 border-dashed border-end-md border-bottom border-bottom-md-0"><img class="img-fluid" src="assets/img/brand2/mail-bluster.png" alt="" /></div>
              <div class="col-6 col-md-3 py-5 text-center border-1 border-dashed border-end"><img class="img-fluid" src="assets/img/brand2/theme-wagon.png" alt="" /></div>
              <div class="col-6 col-md-3 py-5 text-center border-1 border-dashed border-end-lg-0"><img class="img-fluid" src="assets/img/brand2/google.png" alt="" /></div>
            </div>
          </div>
        </section> --><!-- <section> close ============================-->
        <!-- ============================================-->



        <!-- ============================================-->
        <!-- <section> begin ============================-->
        <section class="pt-15 pb-0">
          <div id="about" class="container-small">
            <div class="position-relative z-index-2">
              <div class="row">
                <div class="col-lg-3 text-center text-lg-start">
                  <h4 class="text-primary fw-bolder mb-4">About Us</h4>
                  <h2 class="mb-3 text-black">Pangasinan State University</h2>
                  <p class="mb-5">Lingayen Campus</p><a class="btn btn-lg btn-outline-primary rounded-pill me-2" href="index.php#!" role="button">Find out more<i class="fa-solid fa-angle-right ms-2"></i></a>
                </div>
                <div class="col-sm-9 col-lg-3 mt-10 text-center text-lg-start">
                  <div class="border-start-lg border-dashed ps-4"><img class="mb-4" src="assets/img/icons/illustrations/bolt.svg" alt="" />
                    <h5 class="fw-bolder mb-2">Mission</h5>
                    <p class="fw-semi-bold lh-sm mb-4">The Pangasinan State University, through instruction, research, extension and production, commits to develop highly principled, morally upright, innovative and globally competent individuals capable of meeting the needs of industry, public service and civil society.

</p><!-- <a class="btn btn-link me-2 p-0 fs--2" href="index.php#!" role="button">Check Demo<i class="fa-solid fa-angle-right ms-2"></i></a> -->
                  </div>
                </div>
                <div class="col-sm-6 col-lg-3 mt-10 text-center text-lg-start">
                  <div class="border-start-lg border-dashed ps-4"><img class="mb-4" src="assets/img/icons/illustrations/pie.svg" alt="" />
                    <h5 class="fw-bolder mb-2">Vission</h5>
                    <p class="fw-semi-bold lh-sm mb-4">To become an ASEAN Premier State University in 2025</p><!-- <a class="btn btn-link me-2 p-0 fs--2" href="index.php#!" role="button">Check Demo<i class="fa-solid fa-angle-right ms-2"></i></a> -->
                  </div>
                </div>
                <div class="col-sm-6 col-lg-3 mt-10 text-center text-lg-start">
                  <div class="border-start-lg border-dashed ps-4"><img class="mb-4" src="assets/img/icons/illustrations/shield.svg" alt="" />
                    <h5 class="fw-bolder mb-2">Core Values</h5>
                    <p class="fw-semi-bold lh-sm mb-4">Accountability and Transparency
Credibility and Integrity
Competence and Commitment to Achieve
Excellence in Service Delivery
Social and Environmental Responsiveness
Spirituality</p><!-- <a class="btn btn-link me-2 p-0 fs--2" href="index.php#!" role="button">Check Demo<i class="fa-solid fa-angle-right ms-2"></i></a> -->
                  </div>
                </div>
              </div>
              
            </div>
          </div><!-- end of .container-->
        </section><!-- <section> close ============================-->
        <!-- ============================================-->
        <!--  -->

        <!-- ============================================-->
        
        
        <section class="bg-white">
          <div id="job" class="bg-holder" style="background-image:url(assets/img/bg/bg-5.png);background-position:;background-size:auto;"></div>
          <!--/.bg-holder-->
          <div class="container-small position-relative">
            <div class="row">
              <div class="col-12 mb-4">
                <h4 class="text-primary fw-bolder mb-3">Job Posted</h4>
                <h2>Some of Our Works</h2>
              </div>
             <!--  <div class="col-lg-6">
                <p>Rise like Phoenix focusing only on functionalities for your digital products leaving the design for us. Show what you do, with our latest admin dashboard. Check our best works and let us know what you want to find.</p>
              </div>
              <div class="col-lg-6">
                <p>Want to tell your customers about the details of how and what? Tell them with all the posts at one place without them ridirecting to another page or site.</p>
              </div> -->
            </div>
            <div class="row">
                <div class="myBtnContainer tabs">
                <ul class="nav nav-underline nav-tabs mb-3 border-0" id="nav-tab" role="tablist">
                  
                  <li class="nav-item" role="presentation"><button class="nav-link active" id="pills-month-tab" data-bs-toggle="pill" data-bs-target="#pills-month" type="button" role="tab" aria-controls="pills-month" aria-selected="true" onclick="filterSelection('all')">All</button></li>
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

$agency=mysqli_query($con,"SELECT *  from work ")or die(mysqli_error($con));
              while($rowagency=mysqli_fetch_object($agency))
              { if ($rowagency->workSTATUS!='Deleted') {
               
                  
                
                  $applicantall=mysqli_query($con,"SELECT * from applicant where applicantWORK")or die(mysqli_error($con));
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
                        
                          <div class="bg-holder" style="background-image:url(assets/img/bg/bg-10.png);background-position:left bottom;background-size:auto;"></div>
                          <!--/.bg-holder-->
                          <div class="card-body d-flex flex-column justify-content-between position-relative z-index-2">
                            <div class="d-flex justify-content-between">
                              <div class="mb-5 mb-md-0 mb-lg-5">
                                <div class="d-sm-flex align-items-center mb-3">
                                  <h3 class="mb-0 mb-"><?= $rowagency->workNAME; ?></h3>
                                </div>
                                <p class="fs--1"><?php echo $rowagency->workDETAILS; ?></p>
                                
                                <?php  foreach($usertags as $keytags){ ?>
                                <span class="badge badge-phoenix badge-phoenix-secondary"><?= $keytags ?></span>
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
                                
                              </div><img src="assets/img/spot-illustrations/shield.png" width="54" height="54" alt="" />
                            </div>
                            <div class="row ">
                              <div class="col-5 mb-2 mb-sm-0 mb-md-2 mb-lg-0">
                                 <li class="d-flex align-items-center"><span class="check-circle text-primary me-2" data-feather="users"></span><span class="text-700 fw-semi-bold"><?= "Up to ".$total . " Members"; ?></span></li>
                                 <li class="d-flex align-items-center"><span class="check-circle text-warning me-2" data-feather="user-plus"></span><span class="text-700 fw-semi-bold"><?= "Applied: ". $rowapplicantall. " "; ?></span></li>
                                 <li class="d-flex align-items-center"><span class="check-circle text-success me-2" data-feather="user-check"></span><span class="text-700 fw-semi-bold"><?= "Accepted: ". $rowapplicantacceptedall. " "; ?></span></li>
                                 <hr>
                                   <!-- <a href="viewjob.php?workID=<?= $rowagency->workID; ?>" class="btn btn-primary">View</a>  -->
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
<?php }  } ?>            


                    </div>
                  </div>
                </div>
                
              </div>
              
            </div>
            </div>
          </div>
        </section>
        
        <!-- <section> begin ============================-->
        <section class="bg-white">
          <div id="blog" class="container-small">
            <div class="row">
              <div class="col-12 mb-4 text-center text-sm-start">
                <h4 class="text-primary fw-bolder mb-3">Blog</h4>
                <h2>Latest articles</h2>
              </div>
              <div class="col-lg-6 text-center text-sm-start">
                <p>See the latest articles we published here!
              </div>
            </div>
            <div class="row h-100 g-3 justify-content-center">
              <div class="col-sm-6 col-lg-3 mb-3 mb-md-0">
                <div class="card text-white h-100"><img class="rounded-top h-100" src="assets/img/blog/326305403_628617239031927_4583516561748484291_n-400x250.jpg" alt="..." />
                  <div class="card-body rounded-top">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                      <div class="d-flex align-items-center"><a class="btn-link" href="index.php#!"><span class="fa-solid fa-eye text-500"></span></a><span class="text-900 fs--2 ms-2 lh-1"><!-- 2563 --></span></div>
                      <div class="d-flex align-items-center"><a class="btn-link" href="index.php#!"><span class="fa-solid fa-heart text-500"></span></a><span class="text-900 ms-2 fs--2 lh-1"><!-- 125 --></span></div>
                      <div class="d-flex align-items-center"><a class="btn-link" href="index.php#!"><span class="fa-solid fa-comment text-500"></span></a><span class="text-900 ms-2 fs--2 lh-1"><!-- 125 --></span></div>
                    </div>
                    <h4 class="fw-bold mb-3 lh-sm line-clamp-2">PSU officials attend Senate public hearing on salt industry development</h4>
                    <span class="badge badge-light-primary mb-2">by psumain_main | Jan 20, 2023</span>
                    <p style="color: black;">Bent on igniting the wheel of innovation that will revive the salt...</p><!-- <a class="btn-link px-0 d-flex align-items-center fs--1 fw-bold" href="index.php#!" role="button">Read more<span class="fa-solid fa-angle-right ms-2"></span></a> -->
                  </div>
                </div>
              </div>
              
            </div>
            <div class="text-center mt-6"><button class="btn btn-outline-primary" type="button">View All<span class="fa-solid fa-angle-right ms-2"></span></button></div>
          </div><!-- end of .container-->
        </section><!-- <section> close ============================-->
        <!-- ============================================-->



        <!-- ============================================-->
        <!-- <section> begin ============================-->
        <section class="bg-white">
          <div class="container-small">
            <div class="row">
              <div class="col-12 mb-4">
                <h4 class="text-primary fw-bolder mb-3">Address</h4>
                <h2>If you need to find us:</h2>
              </div>
              
              <div class="col-md-12">
                <p>You can easily where to find us with precise location map. Getting closer was never easier!</p>
              </div>
            </div>
            <div class="row">
              <div class="col-12 mb-15">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3834.641026209471!2d120.22749671452975!3d16.032191788903788!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33915e69b8d7bf01%3A0x9974335ec26be4ee!2sPangasinan%20State%20University!5e0!3m2!1sen!2sph!4v1674408691297!5m2!1sen!2sph" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
              </div>
            </div>
            <div class="row g-md-7 g-lg-6">
              <div class="col-md-6 mb-5 mb-md-0">
                <h3 class="mb-3">Stay connected</h3>
                <p class="mb-11">Stay connected with Us Help Center; We're available for your necessities at all times.</p>
                <div class="d-flex flex-column">
                  <div class="d-flex align-items-center icon-wrapper shadow-cyan-200"><span class="text-primary fs-4 z-index-1 ms-2"><iconify-icon icon="mdi:phone"></iconify-icon></span>
                    <div class="flex-1 ms-3"><a class="link-900" href="tel:">(871) 406-7509</a></div>
                  </div>
                  <div class="d-flex align-items-center icon-wrapper shadow-cyan-200"><span class=" text-primary fs-4 z-index-1 ms-2"><iconify-icon icon="mdi:envelope"></iconify-icon></span>
                    <div class="flex-1 ms-3"><a class="fw-semi-bold link-1100" href="mailto:sample@email.com">sample@email.com</a></div>
                  </div>
                  <div class="d-flex align-items-center icon-wrapper shadow-cyan-200 mb-10"><span class=" text-primary fs-4 z-index-1 ms-2"><iconify-icon icon="mdi:map-marker"></iconify-icon></span>
                    <div class="flex-1 ms-3"><a class="fw-semi-bold link-1100" href="">Alvear, Lingayen, Pangasinan</a></div>
                  </div>
                  <div class="d-flex"><span class="fa-brands fa-facebook fs-2 text-primary me-3"></span><span class="fa-brands fa-twitter fs-2 text-primary me-3"></span><span class="fa-brands fa-linkedin-in fs-2 text-primary"></span></div>
                </div>
              </div>
              <!-- <div class="col-md-6">
                <h3 class="mb-3">Drop us a line</h3>
                <p class="mb-7">If you have any query or suggestion , we are open to learn from you, Lets talk, reach us anytime.</p>
                <form class="row g-4">
                  <div class="col-12"><input class="form-control bg-white" type="text" name="name" placeholder="Name" required="required" /></div>
                  <div class="col-12"><input class="form-control bg-white" type="email" name="email" placeholder="Email" required="required" /></div>
                  <div class="col-12"><textarea class="form-control bg-white" rows="6" name="message" placeholder="Message" required="required"></textarea></div>
                  <div class="col-12 d-grid"><button class="btn btn-outline-primary" type="submit">Submit</button></div>
                  <div class="feedback"></div>
                </form>
              </div> -->
            </div>
          </div><!-- end of .container-->
        </section><!-- <section> close ============================-->
        <!-- ============================================-->

       

          </div>
        </div>
      </div>
    </main><!-- ===============================================-->
    <!--    End of Main Content-->
    <!-- ===============================================-->



    <!-- ===============================================-->
    <!--    JavaScripts-->
    <!-- ===============================================-->
    <script src="vendors/popper/popper.min.js"></script>
    <script src="vendors/bootstrap/bootstrap.min.js"></script>
    <script src="vendors/anchorjs/anchor.min.js"></script>
    <script src="vendors/is/is.min.js"></script>
    <script src="vendors/fontawesome/all.min.js"></script>
    <script src="vendors/lodash/lodash.min.js"></script>
    <script src="polyfill.io/v3/polyfill.min.js"></script>
    <script src="vendors/list.js/list.min.js"></script>
    <script src="vendors/feather-icons/feather.min.js"></script>
    <script src="vendors/dayjs/dayjs.min.js"></script>
    <script src="assets/js/phoenix.js"></script>
    <script src="vendors/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="vendors/isotope-packery/packery-mode.pkgd.min.js"></script>
    <script src="vendors/bigpicture/BigPicture.js"></script>
    <script src="vendors/countup/countUp.umd.js"></script>
    <script src="https://prium.github.io/maps.googleapis.com/maps/api/js.js" async></script>
    <script src="https://prium.github.io/smtpjs.com/v3/smtp.js"></script>
     <script src="vendors/tinymce/tinymce.min.js"></script>
    <script src="vendors/popper/popper.min.js"></script>
    <script src="vendors/bootstrap/bootstrap.min.js"></script>
    <script src="vendors/anchorjs/anchor.min.js"></script>
    <script src="vendors/is/is.min.js"></script>
    <script src="vendors/fontawesome-free-5.3.1-web/css/all.min.js"></script>
    <script src="vendors/lodash/lodash.min.js"></script>
    <script src="polyfill.io/v3/polyfill.min.js"></script>
    <script src="vendors/list.js/list.min.js"></script>
    <script src="vendors/feather-icons/feather.min.js"></script>
    <script src="vendors/dayjs/dayjs.min.js"></script>
    <script src="assets/js/phoenix.js"></script>
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