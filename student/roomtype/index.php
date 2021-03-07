<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <title>Room Type</title>

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
								<h1>APU/APIIT Hostel Room Types</h1>
								
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb p-0">
            <li class="breadcrumb-item">
              <a href="index.html">                
              </a>
            </li>
          </ol>
        </nav>

							<div class="card card-default">
								<div class="card-header card-header-border-bottom">
									<h2>Room Types</h2>
								</div>
								<div class="card-body">
									<p class="mb-5">Here are available room types that APU/APIIT Hostel provides</p>
									<div class="card-deck">
                  <?php
                        require_once '../../config/config.php';
                       
                        if (isset($_GET['pageno'])) {
                            $pageno = $_GET['pageno'];
                        } else {
                            $pageno = 1;
                        }
                        // Page Number
                        $no_of_records_per_page = 3;
                        $offset = ($pageno-1) * $no_of_records_per_page;
                        $total_pages_sql = $mysqli->query("SELECT COUNT(*) FROM roomtype");
                        $total_rows = mysqli_fetch_array($total_pages_sql)[0];
                        $total_pages = ceil($total_rows / $no_of_records_per_page);

                        $check = $mysqli->prepare("select distinct roomtype.id,roomtype.name,roomtype.size,roomtype.image,roomtype.price,roomtype.Description from room right join roomtype
                        on roomtype.id =room.type LIMIT $offset, $no_of_records_per_page");
                        
                        $check->execute();
                        $check->store_result();
                        $check->bind_result($roomtypeid,$name,$size,$image,$price,$description);
                        
                        if($check->num_rows > 0){
                          while($row = $check->fetch()){

                  ?>
										<div class="card">
											<img class="card-img-top" src="../../uploads/room/<?php echo htmlspecialchars($image)?>" alt="Card image cap">
											<div class="card-body">
												<h5 class="card-title text-primary"><?php echo htmlspecialchars($name)?></h5>
												<p class="card-text "><?php echo htmlspecialchars($size)?> </p>
                        <p class="card-text pb-3"><?php echo $description?> </p>
                            <?php            
                            $stmt = $mysqli->prepare("select count(*) as sum from room left join contract ON
                            contract.room = room.id 
                            where room.type = ? and (contract.endDate < now() or contract.endDate is null) ");
                            $stmt->bind_param('s',$roomtypeid);
                            $stmt->execute();
                            $stmt->store_result();
                            $stmt->bind_result($sum);
                            
                            if($stmt->num_rows == 1 ){
                                while($row = $stmt->fetch()){ ?>
                              <p class="card-text pb-3"><?php echo "Available rooms: "."<b>".$sum."</b>";?> </p>
                        <?php } }?>

                          <p> RM <?php echo $price?></p>
												<p class="card-text">
                          <a href="../bookings/request/" class="btn btn-outline-primary">Book Now!</a>
												</p>
											</div>
										</div>
                    <?php } $check->close();} 
                    else {?>
                    	<div class="carousel-inner">
											  <div class="carousel-item active">
												<div class="card border-0 text-center">
													<div class="card-img-wrapper ">
														<img src="assets/img/user/u6.jpg" alt="" class="img-fluid rounded-circle">
													</div>
													<div class="card-body">
														<p>
                            Sorry, We could not find any available rooms now,
														</p>
														<a class="text-dark pt-4 d-block text-center font-weight-medium font-size-15" >SORRY :(</a>
														<span >Come back later buddy!</span>
													</div>
												</div>
											</div>
                      <?php }?>
                      
									</div>
                  <div class="card-body ">
                                <nav class=" justify-content-center d-flex">
                                    <ul class="pagination">
                                        <li class="page-item">
                                            <a href="?pageno=1" class="page-link"
                                                aria-label="Previous">
                                                <span aria-hidden="true">
                                                    <span class="mdi mdi-chevron-left" ></span>
                                                </span>
                                            </a>
                                        </li>
                                        <?php
								if($total_pages >= 1 && $pageno <= $total_pages){
									for($x=1; $x<=$total_pages; $x++){
										echo ($x == $pageno) ? '<b><li class="page-item active"><a class="page-link" href="?pageno='.$x.'">'.$x.'</a></li></b> ' : '<li class="page-item"><a class="page-link" href="?pageno='.$x.'">'.$x.'</a></li>';
									}
								}
								?>
                                        <li class="page-item">
                                            <a href="?pageno=<?php echo $total_pages; ?>" class="page-link"
                                                aria-label="Next">
                                                <span aria-hidden="true">
                                                    <span class="mdi mdi-chevron-right"></span>
                                                </span>
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
								</div>
							</div>
        </div>
      </div>
    </div>
    <script>
NProgress.done();
</script>
    
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
