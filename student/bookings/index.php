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
              <a href="../../">
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
              <?php include '../../assets/template/sidebaruser.php'; ?>
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


                  </li>
                  
                  <!-- User Account -->
                  <?php include '../../assets/template/user.php'; ?>
                  
                </ul>
              </div>
            </nav>


          </header>


        <div class="content-wrapper">
          <div class="content">							<div class="breadcrumb-wrapper">
								<h1>Booking Tables</h1>
								
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb p-0">
            <li class="breadcrumb-item">
              <a href="index.html">           
              </a>
            </li>
          </ol>
        </nav>
      </div>
							<div class="row">
								<div class="col-12">
                  <!-- Recent Order Table -->
                  <div class="card card-table-border-none" id="recent-orders">
                    <div class="card-header justify-content-between">
                      <h2>Recent Bookings</h2>
                    </div>
                    <div class="card-body pt-0 pb-5">
                      <table class="table card-table table-hover table-responsive table-responsive-large" style="width:100%">
                        <thead>
                          <tr>
                            <th>Booking ID</th>
                            <th>Room Type</th>
                            
                            <th class="d-none d-md-table-cell">Start Date</th>
                            <th class="d-none d-md-table-cell">End Date</th>
                            <th>Status</th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody >
                              <?php
                                    require_once '../../config/config.php';
                                    $email = $_SESSION['email'];
                                    
                                    $check = $mysqli->prepare("select booking.id, roomtype.name, booking.startDate, booking.endDate, booking.status from booking join roomtype
                                    on roomtype.id = booking.roomtype join student ON
                                    booking.student = student.id where student.email = ? order by booking.id Desc ");
                                    $check->bind_param('s', $email);
                                    $check->execute();
                                    $check->store_result();
                                    $check->bind_result($id,$roomtype,$startDate, $endDate, $status);

                                    if($check->num_rows > 0){
                                      while($row = $check->fetch()){
                              ?>
                          <tr>
                            <td ><?php echo " ".$id ; ?></td>
                            <td >
                              <a class="text-dark"> <?php echo $roomtype ; ?></a>
                            </td>
                            <td class="d-none d-md-table-cell"><?php echo $startDate ; ?></td>
                            <td class="d-none d-md-table-cell"><?php echo $endDate ; ?></td>
                            <td >
                            <?php
                                if(strcmp($status,'waiting') == 0){?>
                              <span class="badge badge-warning">Waiting</span>
                            <?php } else if (strcmp($status,'accepted') == 0){?>
                              <span class="badge badge-success">Accepted</span>
                            <?php } else {?>
                              <span class="badge badge-danger">Rejected</span>
                            <?php } ?>
                            </td>
                            <td class="text-right">
                              <div class="dropdown show d-inline-block widget-dropdown">
                              <?php if(strcmp($status,'waiting') == 0 || strcmp($status,'rejected') == 0 ){?>
                                <a class="dropdown-toggle icon-burger-mini" href="" role="button" id="dropdown-recent-order1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static"></a>
                                <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-recent-order1">
                                  <li class="dropdown-item">
                                    <a onClick="return confirm('Are you sure want to cancel this booking ?')"
                                      href="../../controller/booking/cancel.php?id=<?php echo $id;?>">Cancel</a>
                                  </li>
                                </ul>
                              <?php } ?>
                              </div>
                            </td>
                          </tr>
                          <?php } $check->close();} ?>
                          
                        </tbody>

                      </table>
                      
                      <?php if(isset($_GET['message'])) {
                                        if($_GET['message'] == "fail"){
                                            ?>
                                <div class="col-12" style="margin-top: 40px">
                                    <div class="alert alert-danger alert-dismissible fade show"
                                        style="margin-bottom: 30px">
                                        <strong>Error!</strong>
                                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    </div>
                                </div>
                                <?php
                                        } else {
                                            ?>
                                <div class="col-12" style="margin-top: 40px">
                                    <div class="alert alert-success alert-dismissible fade show"
                                        style="margin-bottom: 30px">
                                        <strong>Success!</strong> Your booking has been canceled!
                                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    </div>
                                </div>
                                <?php
                                        } 
                                    } ?>
                    </div>
                    
                  </div>
                  
</div>
							</div>						
</div>

          


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
