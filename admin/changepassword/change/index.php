<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <title>Change Password</title>
  <script src="../../../assets/js/passwordchecker.js"></script>
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
        if($_SESSION['status']!="admin"){
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
              <?php include '../../../assets/template/sidebaradmin.php'; ?>

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
                  <?php include '../../../assets/template/useradmin.php'; ?>

                </ul>
              </div>
            </nav>


          </header>



									<div class="card card-default">
										<div class="card-header card-header-border-bottom">
											<h2>Change Password</h2>
										</div>
										<div class="card-body">
											<form method="POST" action="../../../controller/admin/user/changepassword.php" >
												<div class="row">
													<div class="col-sm-6">
														<div class="form-group">
															<label for="fname">Current Password</label>
															<input type="password" name="currentPassword" class="form-control" placeholder="Current Password" required>
														</div>
													</div>

													<div class="col-sm-6">
														<div class="form-group">
															<label for="lname">New Password</label>
															<input style="margin-bottom:10px;" type="password" id="pwd" name="newPassword" class="form-control" placeholder="New Password" required>
                              <progress style="height:24px;width:100%" id="progress" value="0" max="100">70 </progress>
                              <span id="progresslabel"></span>
														</div>
                          </div>
                          <div class="col-sm-6">
													</div>
													<div class="col-sm-6">
														<div class="form-group">
															<label for="city">Confirm New Password</label>
															<input type="password" name="newPasswordConfirm" class="form-control" placeholder="Confirm New Password" required>
														</div>
                            </div>



													
												</div>
												<div class="form-footer pt-5 border-top">
													<button type="submit" name=submit value="change" class="btn btn-primary btn-default">Change Password</button>
												</div>
                        <div style="margin-top: 40px">
                                        <?php if(isset($_GET['message'])) {
                                    if($_GET['message'] == "regex"){
                                        ?>
                                        <div class="alert alert-danger alert-dismissible fade show"
                                            style="margin-bottom: 30px">
                                            <strong>New password requirements:</strong> 
                                            <ul>
                                              <li>- Must be a minimum of 8 characters</li>
                                              <li>- Must contain at least 1 number</li>
                                              <li>- Must contain at least one uppercase character</li>
                                              <li>- Must contain at least one lowercase character</li>
                                            </ul>
                                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                                        </div>
                                        <?php
                                    } else if ($_GET['message'] == "notsame"){
                                      ?>
                                      <div class="alert alert-danger alert-dismissible fade show"
                                          style="margin-bottom: 30px">
                                          <strong>Opss!</strong> Password confirmation not the same
                                          <button type="button" class="close" data-dismiss="alert">&times;</button>
                                      </div>
                                      <?php
                                    } else if ($_GET['message'] == "wrong"){
                                      ?>
                                      <div class="alert alert-danger alert-dismissible fade show"
                                          style="margin-bottom: 30px">
                                          <strong>HAIYYO!</strong> Wrong current password!
                                          <button type="button" class="close" data-dismiss="alert">&times;</button>
                                      </div>
                                        <?php
                                    } else {
                                        ?>
                                        <div class="alert alert-success alert-dismissible fade show"
                                            style="margin-bottom: 30px">
                                            <strong>Success!</strong> You have changed your password
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
<script src="../../../assets/js/passwordchecker.js"></script>




  </body>
</html>
