<nav class="navbar navbar-light navbar-top navbar-expand vertical-navbar">
          <div class="navbar-logo">
            <button class="btn navbar-toggler navbar-toggler-humburger-icon" type="button" data-bs-toggle="collapse" data-bs-target="#navbarVerticalCollapse" aria-controls="navbarVerticalCollapse" aria-expanded="false" aria-label="Toggle Navigation"><span class="navbar-toggle-icon"><span class="toggle-line"></span></span></button>
            <a class="navbar-brand me-1 me-sm-3" href="index.php">
              <div class="d-flex align-items-center">
                <div class="d-flex align-items-center"><img src="../assets/img/icons/removebg-preview.png" alt="phoenix" width="32" />
                  <p class="logo-text ms-2 d-none d-sm-block">InternshiponGo</p>
                </div>
              </div>
            </a>
          </div>
          <div class="collapse navbar-collapse">
            <!-- <div class="search-box d-none d-lg-block" style="width:25rem;">
              <form class="position-relative" data-bs-toggle="search" data-bs-display="static"><input class="form-control search-input search min-h-auto form-control-sm" type="search" placeholder="Search..." aria-label="Search" />
                <span class="fas fa-search search-box-icon"></span>
              </form>
            </div> -->
            <ul class="navbar-nav navbar-nav-icons ms-auto flex-row">
              
              <li class="nav-item dropdown"><a class="nav-link lh-1 px-0 ms-5" id="navbarDropdownUser" href="" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <div class="avatar avatar-l ">
                    <img class="rounded-circle" src="../assets/img/user/<?= $rowadviser->instructorIMG; ?>" alt="" />
                  </div>
                </a>
                <div class="dropdown-menu dropdown-menu-end py-0 dropdown-profile shadow border border-300" aria-labelledby="navbarDropdownUser">
                  <div class="card bg-white position-relative border-0">
                    <div class="card-body p-0">
                      <div class="text-center pt-4 pb-3">
                        <div class="avatar avatar-xl ">
                          <img class="rounded-circle" src="../assets/img/user/<?= $rowadviser->instructorIMG; ?>" alt="" />
                        </div>
                        <h6 class="mt-2"><?= $rowadviser->instructorNAME; ?></h6>
                      </div>
                      <!-- <div class="mb-3 mx-3"><input class="form-control form-control-sm" id="statusUpdateInput" type="text" placeholder="Update your status" /></div> -->
                    </div>
                    <div class="overflow-auto scrollbar" style="height: 10rem;">
                      <ul class="nav d-flex flex-column mb-2 pb-1">
                        <li class="nav-item"><a class="nav-link px-3" href="viewprofile.php"> <span class="me-2 text-900" data-feather="user"></span>Profile</a></li>
                       <!--  <li class="nav-item"><a class="nav-link px-3" href=""> <span class="me-2 text-900" data-feather="pie-chart"></span>Dashboard</a></li>
                        <li class="nav-item"><a class="nav-link px-3" href=""> <span class="me-2 text-900" data-feather="lock"></span>Posts &amp; Activity</a></li>
                        <li class="nav-item"><a class="nav-link px-3" href=""> <span class="me-2 text-900" data-feather="settings"></span>Settings &amp; Privacy </a></li>
                        <li class="nav-item"><a class="nav-link px-3" href=""> <span class="me-2 text-900" data-feather="help-circle"></span>Help Center</a></li>
                        <li class="nav-item"><a class="nav-link px-3" href=""> <span class="me-2 text-900" data-feather="globe"></span>Language</a></li> -->
                      </ul>
                    </div>
                    <div class="card-footer p-0 border-top">
                      <!-- <ul class="nav d-flex flex-column my-3">
                        <li class="nav-item"><a class="nav-link px-3" href=""> <span class="me-2 text-900" data-feather="user-plus"></span>Add another account</a></li>
                      </ul> -->
                      <hr />
                      <div class="px-3"> <a class="btn btn-phoenix-secondary d-flex flex-center w-100" data-bs-toggle="modal" data-bs-target="#staticBackdroplogout"> <span class="me-2" data-feather="log-out"> </span>Sign out</a></div>
                     <div class="my-2 text-center fw-bold fs--2 text-600"><a class="text-600 me-1" data-bs-toggle="modal" data-bs-target="#terms">Privacy policy</a>&bull;<a class="text-600 mx-1" data-bs-toggle="modal" data-bs-target="#terms">Terms</a></div>
                    </div>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </nav>