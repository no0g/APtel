<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <title>Your Contract</title>

  <!-- GOOGLE FONTS -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500|Poppins:400,500,600,700|Roboto:400,500" rel="stylesheet"/>
  <link href="https://cdn.materialdesignicons.com/3.0.39/css/materialdesignicons.min.css" rel="stylesheet" />

  <!-- PLUGINS CSS STYLE -->
  <link href="../../assets/plugins/toaster/toastr.min.css" rel="stylesheet" />
  <link href="../../assets/plugins/nprogress/nprogress.css" rel="stylesheet" />
  <link href="../../assets/plugins/flag-icons/css/flag-icon.min.css" rel="stylesheet"/>
  <link href="../../assets/plugins/jvectormap/jquery-jvectormap-2.0.3.css" rel="stylesheet" />
  <link href="../../assets/plugins/ladda/ladda.min.css" rel="stylesheet" />
  <link href="../../assets/plugins/select2/css/select2.min.css" rel="stylesheet" />
  <link href="../../assets/plugins/daterangepicker/daterangepicker.css" rel="stylesheet" />

  <!-- SLEEK CSS -->
  <link id="sleek-css" rel="stylesheet" href="../../assets/css/sleek.css" />

  

  <!-- FAVICON -->
  <link href="../../assets/img/favicon.png" rel="shortcut icon" />

  <!--
    HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries
  -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <script src="../../assets/plugins/nprogress/nprogress.js"></script>
  <?php 
    session_start();
        if(!isset($_SESSION['email']) && $_SESSION['status']!="login"){
          header("location:../index.php?message=not_login");
       }
    ?>
</head>


  <body class="header-fixed sidebar-fixed sidebar-dark header-light" id="body">
    <script>
      NProgress.configure({ showSpinner: false });
      NProgress.start();
    </script>

    <div class="mobile-sticky-body-overlay"></div>

    <div class="wrapper">
      
              <!--
          ====================================
          ——— LEFT SIDEBAR WITH FOOTER
          =====================================
        -->
        <aside class="left-sidebar bg-sidebar">
          <div id="sidebar" class="sidebar sidebar-with-footer">
            <!-- Aplication Brand -->
            <div class="app-brand">
              <a href="http://127.0.0.1:5500/dist/index.html">
                <svg
                  class="brand-icon"
                  xmlns="http://www.w3.org/2000/svg"
                  preserveAspectRatio="xMidYMid"
                  width="30"
                  height="33"
                  viewBox="0 0 30 33"
                >
                  <g fill="none" fill-rule="evenodd">
                    <path
                      class="logo-fill-blue"
                      fill="#7DBCFF"
                      d="M0 4v25l8 4V0zM22 4v25l8 4V0z"
                    />
                    <path class="logo-fill-white" fill="#FFF" d="M11 4v25l8 4V0z" />
                  </g>
                </svg>
                <span class="brand-name">APU Hostel</span>
              </a>
            </div>
            <!-- begin sidebar scrollbar -->
            <div class="sidebar-scrollbar">

              <!-- sidebar menu -->
              <ul class="nav sidebar-inner" id="sidebar-menu">
                

              <li  class="has-sub" >
                    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#charts"
                      aria-expanded="false" aria-controls="charts">
                      <i class="mdi mdi-hotel"></i>
                      <span class="nav-text">Room Types</span> <b class="caret"></b>
                    </a>
                    <ul  class="collapse"  id="charts"
                      data-parent="#sidebar-menu">
                      <div class="sub-menu">
                            <li >
                              <a class="sidenav-item-link" href="../roomtype/">
                                <span class="nav-text">Explore Room Types</span>
                                
                              </a>
                            </li>
                      </div>
                    </ul>
                  </li>

                  <li  class="has-sub" >
                    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#room"
                      aria-expanded="false" aria-controls="room">
                      <i class="mdi mdi-note-plus-outline"></i>
                      <span class="nav-text">Room Bookings</span> <b class="caret"></b>
                    </a>
                    <ul  class="collapse"  id="room"
                      data-parent="#sidebar-menu">
                      <div class="sub-menu"> 
                            <li >
                              <a class="sidenav-item-link" href="../bookings/">
                                <span class="nav-text">Explore Room Bookings</span>
                              </a>
                            </li>
                            <li >
                              <a class="sidenav-item-link" href="../bookings/request/">
                                <span class="nav-text">Request New Bookings</span>
                              </a>
                            </li>
                      </div>
                    </ul>
                  </li>

                  <li  class="has-sub" >
                    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#bills"
                      aria-expanded="false" aria-controls="bills">
                      <i class="mdi mdi-tag"></i>
                      <span class="nav-text">Bills</span> <b class="caret"></b>
                    </a>
                    <ul  class="collapse"  id="bills"
                      data-parent="#sidebar-menu">
                      <div class="sub-menu"> 
                            <li >
                              <a class="sidenav-item-link" href="../bills/">
                                <span class="nav-text">Explore Bills</span>
                              </a>
                            </li>
                      </div>
                    </ul>
                  </li>

                  <li  class="has-sub" >
                    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#contract"
                      aria-expanded="false" aria-controls="contract">
                      <i class="mdi mdi-card-text-outline"></i>
                      <span class="nav-text">Room Contracts</span> <b class="caret"></b>
                    </a>
                    <ul  class="collapse"  id="contract"
                      data-parent="#sidebar-menu">
                      <div class="sub-menu"> 
                            <li >
                              <a class="sidenav-item-link" href="../contract/">
                                <span class="nav-text">Explore Room Contracts</span>
                              </a>
                            </li>
                      </div>
                    </ul>
                  </li>      
                
                

                
              </ul>

            </div>
          </div>
        </aside>

      

      <div class="page-wrapper">
                  <!-- Header -->
          <header class="main-header " id="header">
            <nav class="navbar navbar-static-top navbar-expand-lg">
              <!-- Sidebar toggle button -->
              <button id="sidebar-toggler" class="sidebar-toggle">
                <span class="sr-only">Toggle navigation</span>
              </button>
              <!-- search form -->
              <div class="search-form d-none d-lg-inline-block">

              </div>

              <div class="navbar-right ">
                <ul class="nav navbar-nav">
                  <!-- Github Link Button -->
                  
                  <!-- User Account -->
                  <li class="dropdown user-menu">

                  <button href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                  <?php
                          require_once '../../config/config.php';
                          $email = $_SESSION['email'];
                          
                          $check = $mysqli->prepare("SELECT firstName,lastName,image FROM student WHERE email = ? ");
                          $check->bind_param('s', $email);
                          $check->execute();
                          $check->store_result();
                          $check->bind_result($firstName,$lastName,$image);
                    
                          if($check->num_rows > 0){
                            while($row = $check->fetch()){
                                // $firstName=$row=['firstName'];
                                // $lastName=$row['lastName'];
                                // $image=$row['image'];

                  ?>
                    <img src=<?php echo $image?> class="user-image" alt="User Image" />
                    <span class="d-none d-lg-inline-block"><?php echo $firstName . " " . $lastName; ?> </span>
                  </button>
                  <ul class="dropdown-menu dropdown-menu-right">
                    <!-- User image -->
                    <li class="dropdown-header">
                      <img src=<?php echo $image; ?> class="img-circle" alt="User Image" />
                      <div class="d-inline-block">
                      <?php echo $firstName . " " . $lastName; ?> <small class="pt-1"><?php echo $email;?></small>
                      </div>
                    </li>
                    <?php } $check->close();}?>
                    <li>
                      <a href="profile.html">
                        <i class="mdi mdi-account"></i> My Profile
                      </a>
                    </li>
                    <li>
                      <a href="#"> <i class="mdi mdi-settings"></i> Account Setting </a>
                    </li>
                    <li class="dropdown-footer">
                      <a href="../../controller/logoutAuth.php"> <i class="mdi mdi-logout"></i> Log Out </a>
                    </li>
                  </ul>
                  </li>
                </ul>
              </div>
            </nav>
          </header>
									<div class="card card-default">
										<div class="card-header card-header-border-bottom">
											<h2>Room Contracts</h2>
										</div>
										<div class="card-body">
                    <?php
                                    require_once '../../config/config.php';
                                    $email = $_SESSION['email'];
                                    
                                    $check = $mysqli->prepare("SELECT student.firstName, student.lastName, room.name, contract.price, contract.startDate, contract.endDate from contract join student 
                                                                on student.id = contract.student join room 
                                                                on contract.room = room.id 
                                                                where student.email = ? and contract.endDate > now()");
                                    $check->bind_param('s', $email);
                                    $check->execute();
                                    $check->store_result();
                                    $check->bind_result($firstName,$lastName,$roomname, $price, $startDate,$endDate);

                                    if($check->num_rows > 0){
                                      while($row = $check->fetch()){
                              ?>
											<form >
												<div class="row">
													<div class="col-sm-6">
														<div class="form-group">
															<label for="fname">First name</label>
															<input type="text" class="form-control" value=<?php echo $firstName ;?> readonly>
														</div>
													</div>
													<div class="col-sm-6">
														<div class="form-group">
															<label for="lname">Last name</label>
															<input type="text" class="form-control" value=<?php echo $lastName; ?> readonly>
														</div>
                          </div>
                          <div class="col-sm-6">
														<div class="form-group">
															<label for="city">Room </label>
															<input type="text" class="form-control" value=<?php echo $roomname; ?> readonly>
														</div>
													</div>
													<div class="col-sm-6">
														<div class="form-group">
															<label for="city">Price</label>
															<input type="text" class="form-control" placeholder=<?php echo $price; ?> value="RM <?php echo  $price; ?>" readonly >
														</div>
													</div>
													<div class="col-sm-6">
														<div class="row">
															<div class="col-6">
																<div class="form-group">
																	<label for="State">Start Date</label>
																	<input type="date" class="form-control" value=<?php echo $startDate; ?> readonly>
																</div>
															</div>
															<div class="col-6">
																<div class="form-group">
																	<label for="Zip">End Date</label>
																	<input type="date" class="form-control" value=<?php echo $endDate; ?> readonly>
																</div>
															</div>
														</div>
													</div>
												</div>
												<div class="form-footer pt-5 border-top">
													<button type="submit" class="btn btn-primary btn-default">Download PDF</button>
												</div>
											</form>
                      <?php } 
                    } else { ?>

                        <div class="carousel-inner">
                            <div class="carousel-item active">
                            <div class="card border-0 text-center">
                              <div class="card-img-wrapper ">
                                <img src="assets/img/user/u6.jpg" alt="" class="img-fluid rounded-circle">
                              </div>
                              <div class="card-body">
                                <p>
                                You have no active contract now
                                </p>
                                <a class="text-dark pt-4 d-block text-center font-weight-medium font-size-15" >HURRY !!</a>
                                <span >Book Your Room NOW!!</span>
                              </div>
                            </div>
                          </div>
                          <?php }?>
                        </div>
                      </div>
                    </div>

          


              </div>
            <script>
                var d = new Date();
                var year = d.getFullYear();
                document.getElementById("copy-year").innerHTML = year;
            </script>
          </footer>

      </div>
    </div>

    
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDCn8TFXGg17HAUcNpkwtxxyT9Io9B_NcM" defer></script>
<script src="../../assets/plugins/jquery/jquery.min.js"></script>
<script src="../../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../../assets/plugins/toaster/toastr.min.js"></script>
<script src="../../assets/plugins/slimscrollbar/jquery.slimscroll.min.js"></script>
<script src="../../assets/plugins/charts/Chart.min.js"></script>
<script src="../../assets/plugins/ladda/spin.min.js"></script>
<script src="../../assets/plugins/ladda/ladda.min.js"></script>
<script src="../../assets/plugins/jquery-mask-input/jquery.mask.min.js"></script>
<script src="../../assets/plugins/select2/js/select2.min.js"></script>
<script src="../../assets/plugins/jvectormap/jquery-jvectormap-2.0.3.min.js"></script>
<script src="../../assets/plugins/jvectormap/jquery-jvectormap-world-mill.js"></script>
<script src="../../assets/plugins/daterangepicker/moment.min.js"></script>
<script src="../../assets/plugins/daterangepicker/daterangepicker.js"></script>
<script src="../../assets/plugins/jekyll-search.min.js"></script>
<script src="../../assets/js/sleek.js"></script>
<script src="../../assets/js/chart.js"></script>
<script src="../../assets/js/date-range.js"></script>
<script src="../../assets/js/map.js"></script>
<script src="../../assets/js/custom.js"></script>




  </body>
</html>
