<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <title>Bills</title>

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
                  <?php include '../../assets/template/user.php'; ?>
                  
                </ul>
              </div>
            </nav>


          </header>


        <div class="content-wrapper">
          <div class="content">					<div class="invoice-wrapper rounded border bg-white py-5 px-3 px-md-4 px-lg-5">
						<div class="d-flex justify-content-between">
							<h2 class="text-dark font-weight-medium">Outstanding Fee</h2>
						</div>
						<div class="row pt-5">
							<div class="col-xl-3 col-lg-4">
								<p class="text-dark mb-2">From</p>
								<address>
									Asia Pacific University
									<br> Jalan Teknologi 5, Taman Teknologi Malaysia, 57000 Kuala Lumpur, Wilayah Persekutuan Kuala Lumpur
									<br> Email: APU@apu.edu.my
									<br> Phone: +60129991002
								</address>
							</div>
              <!-- Get user -->
              <?php
                             require_once '../../config/config.php';
                             $email = $_SESSION['email'];
                             
                             $check = $mysqli->prepare("SELECT firstName,lastName,contact FROM student WHERE email = ? ");
                             $check->bind_param('s', $email);
                             $check->execute();
                             $check->store_result();
                             $check->bind_result($firstName,$lastName,$contact);
                      
                             if($check->num_rows > 0){
                              while($row = $check->fetch()){

                  
                  ?>
							<div class="col-xl-3 col-lg-4">
								<p class="text-dark mb-2">To</p>
								<address>
									<?php echo htmlspecialchars($firstName)." ". htmlspecialchars($lastName); ?>
									<br> Email: <?php echo htmlspecialchars($email);?>
									<br> Phone: <?php echo htmlspecialchars($contact); ?>
								</address>
							</div>
						</div>
            <?php } } ?>
						<table class="table mt-3 table-striped table-responsive table-responsive-large" style="width:100%">
							<thead>
								<tr>
									<th>Contract</th>
									<th>Room Name</th>
									<th>Room Type</th>
									<th>Rent</th>
									<th>Price</th>
									<th>Overdue</th>
								</tr>
							</thead>
							<tbody>
              <!-- Get Contract Detail -->
              <?php
                             require_once '../../config/config.php';
                             $email = $_SESSION['email'];
                             
                             $check = $mysqli->prepare("SELECT contract.id,room.name,roomtype.name, contract.price, contract.overdue FROM contract join room
                                                        on room.id = contract.room join roomtype 
                                                        on room.type = roomtype.id join student
                                                        on student.id = contract.student WHERE student.email = ? ");
                             $check->bind_param('s', $email);
                             $check->execute();
                             $check->store_result();
                             $check->bind_result($id,$roomname,$roomtype,$price,$overdue);
                      
                             if($check->num_rows > 0){
                              while($row = $check->fetch()){
                  ?>
								<tr>
									<td><?php echo $id; ?></td>
									<td><?php echo $roomname; ?></td>
									<td><?php echo $roomtype; ?></td>
									<td>Monthly</td>
									<td><?php echo $price; ?></td>
									<td><?php echo $overdue; ?></td>
								</tr>
                
								</tr>

							</tbody>
						</table>
						<div class="row justify-content-end">
							<div class="col-lg-5 col-xl-4 col-xl-3 ml-sm-auto">
								<ul class="list-unstyled mt-4">
									<li class="mid pb-3 text-dark"> Subtotal
										<span class="d-inline-block float-right text-default">RM <?php echo $overdue; ?></span>
									</li>
									<li class="pb-3 text-dark">Total
										<span class="d-inline-block float-right">RM <?php echo $overdue; ?></span>
									</li>
								</ul>
                <?php if($overdue > 0){?>

                <form method="POST" action="../../controller/payment/submit.php" enctype='multipart/form-data'>
                  <h3>Upload Proof of Payment</h3>
                  
                  <label class="form-control-label">Amount</label>
                  <input type='number'  class="form-control" name='amount' required>

                  <label class="form-control-label">File</label>
                  <input type='file'  class="form-control" name='file' required>
                  <button name="submit" value="submit" class="btn btn-block mt-2 btn-lg btn-primary btn-pill"> Submit Payment Details</button>
                </form>
                <?php } ?>
                <?php } } else {?>
                  <tr>
									<td>-</td>
									<td>-</td>
									<td>-</td>
									<td>Monthly</td>
									<td>-</td>
									<td>0</td>
								</tr>
                
								</tr>

							</tbody>
						</table>
						<div class="row justify-content-end">
							<div class="col-lg-5 col-xl-4 col-xl-3 ml-sm-auto">
								<ul class="list-unstyled mt-4">
									<li class="mid pb-3 text-dark"> Subtotal
										<span class="d-inline-block float-right text-default">RM 0</span>
									</li>
									<li class="pb-3 text-dark">Total
										<span class="d-inline-block float-right">RM 0</span>
									</li>
								</ul>
                <?php } ?>

							</div>
						</div>
            <div style="margin-top: 40px">
                                        <?php if(isset($_GET['message'])) {
                                    if($_GET['message'] == "type"){
                                        ?>
                                        <div class="alert alert-danger alert-dismissible fade show"
                                            style="margin-bottom: 30px">
                                            <strong>Allowed File Types:</strong> 
                                            <ul>
                                              <li>- jpg</li>
                                              <li>- png</li>
                                              <li>- pdf</li>
                                              <li>- jpeg</li>
                                            </ul>
                                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                                        </div>
                                        <?php
                                    } else if ($_GET['message'] == "waiting"){
                                      ?>
                                      <div class="alert alert-danger alert-dismissible fade show"
                                          style="margin-bottom: 30px">
                                          <strong>Opss!</strong> Your last submitted is being validated by our team
                                          <button type="button" class="close" data-dismiss="alert">&times;</button>
                                      </div>
                                      <?php
                                    } else if ($_GET['message'] == "fail"){
                                      ?>
                                      <div class="alert alert-danger alert-dismissible fade show"
                                          style="margin-bottom: 30px">
                                          <strong>HAIYYO!</strong> Failed uploading file
                                          <button type="button" class="close" data-dismiss="alert">&times;</button>
                                      </div>
                                        <?php
                                    } else {
                                        ?>
                                        <div class="alert alert-success alert-dismissible fade show"
                                            style="margin-bottom: 30px">
                                            <strong>Success!</strong> You have uploaded the file
                                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                                        </div>
                                        
                                        <?php
                                        } 
                                    } ?>
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
