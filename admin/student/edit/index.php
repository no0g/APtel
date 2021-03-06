<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <title>Edit Student</title>

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
       }else if(!isset($_GET['id'])) {
        header("location:../show/");
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
                  
                  <!-- User Account -->
                  <?php include '../../../assets/template/useradmin.php'; ?>

                </ul>
              </div>
            </nav>
          </header>
									<div class="card card-default">
										<div class="card-header card-header-border-bottom">
										<h2>Edit Student Data</h2>

                   </div>
										<div class="card-body">
                    <?php
                                    require_once '../../../config/config.php';
                                    $id = $_GET['id'];
                                    
                                    $check = $mysqli->prepare("select student.id, student.firstName, student.lastName, student.tpnumber, student.email, student.contact from student where student.id = ?");
                                    $check->bind_param('s', $id);
                                    $check->execute();
                                    $check->store_result();
                                    $check->bind_result($id,$firstName,$lastName,$tpnumber, $email, $contact);

                                    if($check->num_rows == 1){
                                      while($row = $check->fetch()){
                              ?>
											<form method="POST" action="../../../controller/admin/student/edit.php">
												<div class="row">
													<div class="col-sm-6">
														<div class="form-group">
															<label for="fname">First name</label>
															<input type="text" name="firstName" class="form-control" value=<?php echo htmlspecialchars($firstName) ;?> required >
														</div>
													</div>
													<div class="col-sm-6">
														<div class="form-group">
															<label for="lname">Last name</label>
															<input type="text" name="lastName" class="form-control" value=<?php echo htmlspecialchars($lastName); ?> required>
														</div>
                          </div>
                          <div class="col-sm-6">
														<div class="form-group">
															<label for="city">TP Number </label>
															<input type="text" name="tpnumber" class="form-control" value=<?php echo htmlspecialchars($tpnumber); ?> readonly>
														</div>
													</div>
                          <div class="col-sm-6">
														<div class="form-group">
															<label for="fname">Student Account ID</label>
															<input type="number" name="id" class="form-control" value=<?php echo htmlspecialchars($id) ;?> readonly>
														</div>
													</div>
													<div class="col-sm-6">
														<div class="form-group">
															<label for="city">Email</label>
															<input type="text" name="email" class="form-control" placeholder=<?php echo htmlspecialchars($email); ?> value=<?php echo  htmlspecialchars($email); ?> readonly>
														</div>
													</div>
													<div class="col-sm-6">
																<div class="form-group">
																	<label for="State">Contact</label>
																	<input type="number" name="contact" class="form-control" value=<?php echo htmlspecialchars($contact); ?> required>
																</div>
													</div>
												</div>
                        <div class="form-footer pt-5 border-top">
                          
													<button type="submit" name="edit" value="edit" class="btn btn-primary btn-default">Edit Student Data</button>
                          
                          <a onClick="return confirm('Are you sure want to delete this student account ?');" href="../../../controller/admin/student/delete.php?id=<?php echo $id?>">
                          <button type="button" value="remove"  class="btn btn-primary btn-danger " style="float: right;">Remove Student</button>
												  </a>
                        </div>
                        <div style="margin-top: 40px">
                                        <?php if(isset($_GET['message'])) {
                                    if($_GET['message'] == "faildelete"){
                                        ?>
                                        <div class="alert alert-danger alert-dismissible fade show"
                                            style="margin-bottom: 30px">
                                            <strong>Opss!</strong> Look's like there's something wrong! <br>
                                            Student may have active contract!
                                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                                        </div>
                                        <?php
                                    } else if ($_GET['message'] == "success"){
                                      ?>
                                      <div class="alert alert-success alert-dismissible fade show"
                                          style="margin-bottom: 30px">
                                          <strong>Success!</strong> You have edited student data!
                                          <button type="button" class="close" data-dismiss="alert">&times;</button>
                                      </div>
                                      <?php
                                    } else if ($_GET['message'] == "successdelete"){
                                      ?>
                                      <div class="alert alert-success alert-dismissible fade show"
                                          style="margin-bottom: 30px">
                                          <strong>Success!</strong> You have deleted student data!
                                          <button type="button" class="close" data-dismiss="alert">&times;</button>
                                      </div>
                                        <?php
                                    } else {
                                        ?>
                                        <div class="alert alert-danger alert-dismissible fade show"
                                            style="margin-bottom: 30px">
                                            <strong>Opss!</strong> Look's like there's something wrong! <br>
                                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                                        </div>
                                        
                                        <?php
                                        } 
                                    } ?>
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
                                NO USER EXIST!
                                </p>
                                <a class="text-dark pt-4 d-block text-center font-weight-medium font-size-15" >Please Make Sure User exist!</a>
                                
                              </div>
                            </div>
                          </div>
                          <?php }?>
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
