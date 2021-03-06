<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <title>Bookings</title>

  <!-- GOOGLE FONTS -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500|Poppins:400,500,600,700|Roboto:400,500" rel="stylesheet"/>
  <link href="https://cdn.materialdesignicons.com/3.0.39/css/materialdesignicons.min.css" rel="stylesheet" />

  <!-- PLUGINS CSS STYLE -->
  <link href="../../../assets/plugins/toaster/toastr.min.css" rel="stylesheet" />
  <link href="../../../assets/plugins/nprogress/nprogress.css" rel="stylesheet" />
  <link href="../../../assets/plugins/flag-icons/css/flag-icon.min.css" rel="stylesheet"/>
  <link href="../../../assets/plugins/jvectormap/jquery-jvectormap-2.0.3.css" rel="stylesheet" />
  <link href="../../../assets/plugins/ladda/ladda.min.css" rel="stylesheet" />
  <link href="../../../assets/plugins/select2/css/select2.min.css" rel="stylesheet" />
  <link href="../../../assets/plugins/daterangepicker/daterangepicker.css" rel="stylesheet" />

  <!-- SLEEK CSS -->
  <link id="sleek-css" rel="stylesheet" href="../../../assets/css/sleek.css" />

  

  <!-- FAVICON -->
  <link href="../../../assets/img/favicon.png" rel="shortcut icon" />

  <!--
    HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries
  -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <script src="../../../assets/plugins/nprogress/nprogress.js"></script>
  <?php 
    session_start();
        if($_SESSION['status']!="login"){
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
              <a href="../../../">
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
                              <a class="sidenav-item-link" href="../../roomtype/">
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
                              <a class="sidenav-item-link" href="../../bookings/">
                                <span class="nav-text">Explore Room Bookings</span>
                              </a>
                            </li>
                            <li >
                              <a class="sidenav-item-link" href="../../bookings/request/">
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
                              <a class="sidenav-item-link" href="../../bills/">
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
                              <a class="sidenav-item-link" href="../../contract/">
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
                  <li class="github-link mr-3">
                    <!-- <a class="btn btn-outline-secondary btn-sm" href="https://github.com/tafcoder/sleek-dashboard" target="_blank">
                      <span class="d-none d-md-inline-block mr-2">Source Code</span>
                      <i class="mdi mdi-github-circle"></i>
                    </a> -->

                  </li>

                  <!-- User Account -->
                  <li class="dropdown user-menu">

                    <button href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                    <?php

                            require_once '../../../config/config.php';
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
                      <img src=<?php echo "../".$image;?> class="user-image" alt="User Image" />
                      <span class="d-none d-lg-inline-block"><?php echo htmlspecialchars($firstName) . " " . htmlspecialchars($lastName); ?> </span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-right">
                      <!-- User image -->
                      <li class="dropdown-header">
                        <img src=<?php echo "../".$image; ?> class="img-circle" alt="User Image" />
                        <div class="d-inline-block">
                        <?php echo htmlspecialchars($firstName) . " " . htmlspecialchars($lastName); ?> <small class="pt-1"><?php echo htmlspecialchars($email);?></small>
                        </div>
                      </li>
                      <?php } $check->close();}?>
                      <li>
                        <a href="../../changepassword"> <i class="mdi mdi-settings"></i> Change Password </a>
                      </li>
                      <li class="dropdown-footer">
                        <a href="../../../controller/logoutAuth.php"> <i class="mdi mdi-logout"></i> Log Out </a>
                      </li>
                    </ul>
                  </li>
                </ul>
              </div>
            </nav>


          </header>



									<div class="card card-default">
										<div class="card-header card-header-border-bottom">
											<h2>Room Booking</h2>
										</div>
										<div class="card-body">
											<form method="POST" action="../../../controller/booking/request.php">
												<div class="row">
                          <?php
                             require_once '../../../config/config.php';
                             $email = $_SESSION['email'];
                             
                             $check = $mysqli->prepare("SELECT firstName,lastName FROM student WHERE email = ? ");
                             $check->bind_param('s', $email);
                             $check->execute();
                             $check->store_result();
                             $check->bind_result($firstName,$lastName);
                      
                             if($check->num_rows > 0){
                              while($row = $check->fetch()){

                  
                          ?>   
													<div class="col-sm-6">
														<div class="form-group">
															<label for="fname">First Name</label>
															<input type="text" class="form-control"  name="firstName" value=<?php echo htmlspecialchars($firstName)?> placeholder=<?php echo htmlspecialchars($firstName)?> readonly>
														</div>
													</div>
													<div class="col-sm-6">
														<div class="form-group">
															<label for="lname">Last Name</label>
															<input type="text" class="form-control"  name="lastName" value=<?php echo htmlspecialchars($lastName)?> placeholder=<?php echo htmlspecialchars($lastName)?> readonly>
														</div>
                          </div>
                          <?php } $check->close();}?>
                          <div class="col-sm-6">
														<div class="form-group">
															<label for="city">Room Type</label>
															<select name="roomtype" class="form-control" id="exampleFormControlSelect12">
                                <?php
                                    $type="";
                                    if(isset($_GET['type'])){
                                        $type = $_GET['type'];
                                    }
                                    
                                    require_once '../../../config/config.php';
                                  

                                    $check = $mysqli->prepare("select distinct roomtype.id,roomtype.name from room join roomtype on roomtype.id =room.type where room.id in(select room.id from contract right join room on contract.room = room.id where contract.id is null or contract.endDate < now()) and room.id not in (select room.id from contract right join room on contract.room = room.id where contract.id > now())");
                                    
                                    $check->execute();
                                    $check->store_result();
                                    $check->bind_result($rtid,$name);
                                    
                                    if($check->num_rows > 0){
                                      while($row = $check->fetch()){
                                        $typ="";
                                        if($type == $rtid){
                                            $typ="selected";
                                        }

                                 ?>
														    <option <?php echo $typ?>><?php echo $name; ?></option>
                                <?php } $check->close();} ?>
													    </select>
														</div>
													</div>
													<div class="col-sm-6">
														<div class="row">
															<div class="col-6">
																<div class="form-group">
																	<label for="State">Start Date</label>
																	<input name="startDate" type="date" min="<?php echo date("Y-m-d")?>"class="form-control" placeholder="Date" required>
																</div>
															</div>
															<div class="col-6">
																<div class="form-group">
																	<label for="Zip">End Date</label>
																	<input name="endDate" type="date" min="<?php echo date("Y-m-d",strtotime('+4 months'))?>" class="form-control" placeholder="Date" required>
																</div>
															</div>
														</div>
													</div>
												</div>
												<div class="form-footer pt-5 border-top">
													<button type="submit" name="submit" value="request" class="btn btn-primary btn-default">submit</button>
												</div>
                        <div style="margin-top: 40px">
                                        <?php if(isset($_GET['message'])) {
                                    if($_GET['message'] == "fail"){
                                        ?>
                                        <div class="alert alert-danger alert-dismissible fade show"
                                            style="margin-bottom: 30px">
                                            <strong>Opss!</strong> Look's like there's something wrong!
                                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                                        </div>
                                        <?php
                                    } else if ($_GET['message'] == "waiting"){
                                      ?>
                                      <div class="alert alert-danger alert-dismissible fade show"
                                          style="margin-bottom: 30px">
                                          <strong>Opss!</strong> You have to wait for your recent booking responded!
                                          <button type="button" class="close" data-dismiss="alert">&times;</button>
                                      </div>
                                      <?php
                                    } else if ($_GET['message'] == "minimum"){
                                      ?>
                                      <div class="alert alert-danger alert-dismissible fade show"
                                          style="margin-bottom: 30px">
                                          <strong>HAIYYO!</strong> You have to book atleast for 4 months!
                                          <button type="button" class="close" data-dismiss="alert">&times;</button>
                                      </div>
                                        <?php
                                    } else {
                                        ?>
                                        <div class="alert alert-success alert-dismissible fade show"
                                            style="margin-bottom: 30px">
                                            <strong>Success!</strong> Well be in touch soon!
                                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                                        </div>
                                        
                                        <?php
                                        } 
                                    } ?>
                                    </div>
											</form>
										</div>
									</div>
</div>

          


        </div>
        <script>
NProgress.done();
</script>
          </footer>

      </div>
    </div>

    
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDCn8TFXGg17HAUcNpkwtxxyT9Io9B_NcM" defer></script>
<script src="../../../assets/plugins/jquery/jquery.min.js"></script>
<script src="../../../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../../../assets/plugins/toaster/toastr.min.js"></script>
<script src="../../../assets/plugins/slimscrollbar/jquery.slimscroll.min.js"></script>
<script src="../../../assets/plugins/charts/Chart.min.js"></script>
<script src="../../../assets/plugins/ladda/spin.min.js"></script>
<script src="../../../assets/plugins/ladda/ladda.min.js"></script>
<script src="../../../assets/plugins/jquery-mask-input/jquery.mask.min.js"></script>
<script src="../../../assets/plugins/select2/js/select2.min.js"></script>
<script src="../../../assets/plugins/jvectormap/jquery-jvectormap-2.0.3.min.js"></script>
<script src="../../../assets/plugins/jvectormap/jquery-jvectormap-world-mill.js"></script>
<script src="../../../assets/plugins/daterangepicker/moment.min.js"></script>
<script src="../../../assets/plugins/daterangepicker/daterangepicker.js"></script>
<script src="../../../assets/plugins/jekyll-search.min.js"></script>
<script src="../../../assets/js/sleek.js"></script>
<script src="../../../assets/js/chart.js"></script>
<script src="../../../assets/js/date-range.js"></script>
<script src="../../../assets/js/map.js"></script>
<script src="../../../assets/js/custom.js"></script>




  </body>
</html>
