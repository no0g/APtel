<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <title>Rooms</title>

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
                  <?php include '../../../assets/template/useradmin.php'; ?>
                  
                </ul>
              </div>
            </nav>


          </header>


        <div class="content-wrapper">
          <div class="content">							
          <div class="breadcrumb-wrapper">
								
								
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
                      <h2>Rooms</h2>
                      <a class="btn btn-primary" href="../../../controller/admin/pdf/roomreport.php"  type="button" id="dropdownMenuButton"  aria-expanded="false" data-display="static">
													Generate Report 
                      </a>
                      <div class="dropdown d-inline-block mb-1">
												<button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
													Room Type Filter
												</button>
												<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="?">All</a>
                        <?php 
                            
                            include "../../../config/config.php";
                            //get all room type

                            $check = $mysqli->prepare('select id, name from roomtype');
                            $check->execute();
                            $check->store_result();
                            $check->bind_result($roomtypeid,$roomtypename);

                            if($check->num_rows > 0){
                              while($row = $check->fetch()){
                          ?>
													<a class="dropdown-item" href="?type=<?php echo htmlspecialchars($roomtypeid);?>"><?php echo htmlspecialchars($roomtypename);?></a>
                          <?php } }?>
												</div>
											</div>
                    </div>
                    <div class="card-body pt-0 pb-5">
                      <table class="table card-table table-hover table-responsive table-responsive-large" style="width:100%">
                        <thead>
                          <tr>
                            <th>Room ID</th>
                            <th>Room Name</th>
                            <th>Room Type</th>

                            <th>Status</th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody >
                              <?php
                                    require_once '../../../config/config.php';


                                    //get data
                                    $check = "";
                                    if (isset($_GET['pageno'])) {
                                      $pageno = $_GET['pageno'];
                                    } else {
                                        $pageno = 1;
                                    }
                                    if (isset($_GET['type'])) {
                                      $type = $_GET['type'];

                                      //pagination
                                      $no_of_records_per_page = 5;
                                      $offset = ($pageno-1) * $no_of_records_per_page;
                                      $total_rows = "";
                                      $stmt = $mysqli->prepare("SELECT count(*) as total FROM room join roomtype on room.type = roomtype.id where room.type = ?  ");
                                      $stmt->bind_param("i",$type);
                                      
                                      $stmt->execute();
                                      $stmt->store_result();
                                      $stmt->bind_result($total);

                                      if($stmt->num_rows > 0){
                                        while($row = $stmt->fetch()){
                                          $total_rows = $total;
                                        }
                                      }

                                      $total_pages = ceil($total_rows / $no_of_records_per_page);

                                      //query
                                      $check = $mysqli->prepare("SELECT room.id, room.name, roomtype.name, roomtype.id FROM room join roomtype on room.type = roomtype.id where room.type = ?  LIMIT $offset, $no_of_records_per_page");
                                      $check->bind_param('i',$type);
                                    } else {
                                      //pagination
                                      $no_of_records_per_page = 5;
                                      $offset = ($pageno-1) * $no_of_records_per_page;
                                      $total_rows = "";
                                      $stmt = $mysqli->prepare("SELECT count(*) as total FROM room join roomtype on room.type = roomtype.id ");                                      
                                      $stmt->execute();
                                      $stmt->store_result();
                                      $stmt->bind_result($total);

                                      if($stmt->num_rows > 0){
                                        while($row = $stmt->fetch()){
                                          $total_rows = $total;
                                        }
                                      }

                                      $total_pages = ceil($total_rows / $no_of_records_per_page);

                                      $check = $mysqli->prepare("SELECT room.id, room.name, roomtype.name, roomtype.id FROM room join roomtype on room.type = roomtype.id LIMIT $offset, $no_of_records_per_page");

                                    }
                                    
                                    $check->execute();
                                    $check->store_result();
                                    $check->bind_result($id,$roomname, $roomtype,$roomtypeid);

                                    if($check->num_rows > 0){
                                      while($row = $check->fetch()){
                              ?>
                          <tr>
                            
                            <td >
                              <a class="text-dark" > <?php echo htmlspecialchars($id) ; ?></a>
                            </td>
                            <td >
                              <a class="text-dark" > <?php echo htmlspecialchars($roomname) ; ?></a>
                            </td>
                            <td >
                              <a class="text-dark" href="../../../admin/roomtype/edit/?id=<?php echo $roomtypeid;?>"> <?php echo htmlspecialchars($roomtype) ; ?></a>
                            </td>
                            <td >
                            <?php
                                require_once '../../../config/config.php';
                                $status = "";
                                $stat = $mysqli->prepare("select * from room left join contract on contract.room = room.id where (contract.endDate > now() or contract.id is not null) and room.id = ? ");
                                $stat->bind_param('i',$id);
                                $stat->execute();
                                $stat->store_result();
                                if($stat->num_rows > 0){
                                  $status = 'notavailable';
                                } else {
                                  $status = 'available';
                                }

                                if($status === 'notavailable'){?>
                              <span class="badge badge-danger">Not Available</span>
                            <?php } else {?>
                              <span class="badge badge-success">Available</span>
                            <?php } ?>

                            </td>
                              <?php if($status ==='available'){?>
                            <td class="text-right">
                              <div class="dropdown show d-inline-block widget-dropdown">
                                <a class="dropdown-toggle icon-burger-mini" href="" role="button" id="dropdown-recent-order1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static"></a>
                                <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-recent-order1">
                                  <li class="dropdown-item">
                                    <a onClick="return confirm('Are you sure want to delete this room ?')"
                                      href="../../../controller/admin/room/delete.php?id=<?php echo htmlspecialchars($id);?>">Delete</a>
                                  </li>

                                </ul>
                              
                              </div>
                            </td>
                            <?php } ?>
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
                                        } else if($_GET['message'] == "failroom"){
                                          ?>
                              <div class="col-12" style="margin-top: 40px">
                                  <div class="alert alert-danger alert-dismissible fade show"
                                      style="margin-bottom: 30px">
                                      <strong>Oops!</strong> There is no available room available
                                      <button type="button" class="close" data-dismiss="alert">&times;</button>
                                  </div>
                              </div>
                              <?php
                                      } else if($_GET['message'] == "success"){
                                        ?>
                            <div class="col-12" style="margin-top: 40px">
                                <div class="alert alert-success alert-dismissible fade show"
                                    style="margin-bottom: 30px">
                                    <strong>Success!</strong> You have deleted a room!
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                </div>
                            </div>
                            <?php
                                    } else if($_GET['message'] == "active"){
                                      ?>
                          <div class="col-12" style="margin-top: 40px">
                              <div class="alert alert-danger alert-dismissible fade show"
                                  style="margin-bottom: 30px">
                                  <strong>Oops!</strong> Student has an active contract!
                                  <button type="button" class="close" data-dismiss="alert">&times;</button>
                              </div>
                          </div>
                          <?php
                                  } else {
                                            ?>
                                <div class="col-12" style="margin-top: 40px">
                                    <div class="alert alert-success alert-dismissible fade show"
                                        style="margin-bottom: 30px">
                                        <strong>Success!</strong> Your have deleted a room!
                                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    </div>
                                </div>
                                <?php
                                        } 
                                    } ?>
                    </div>

                    <?php if(isset($type)){?>
                    <div class="card-body ">
                                <nav class=" justify-content-center d-flex">
                                    <ul class="pagination">
                                        <li class="page-item">
                                            <a href="?type=<?php echo $type?>&pageno=1" class="page-link"
                                                aria-label="Previous">
                                                <span aria-hidden="true">
                                                    <span class="mdi mdi-chevron-left" ></span>
                                                </span>
                                            </a>
                                        </li>
                                        <?php
								if($total_pages >= 1 && $pageno <= $total_pages){
									for($x=1; $x<=$total_pages; $x++){
										echo ($x == $pageno) ? '<b><li class="page-item active"><a class="page-link" href="?type='.$type.'&pageno='.$x.'">'.$x.'</a></li></b> ' : '<li class="page-item"><a class="page-link" href="?type='.$type.'&pageno='.$x.'">'.$x.'</a></li>';
									}
								}
								?>
                                        <li class="page-item">
                                            <a href="?type=<?php echo $type?>&pageno=<?php echo $total_pages; ?>" class="page-link"
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
                  <?php } else { ?>
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
                  <?php }  ?>

                  
</div>
							</div>						
</div>

          


        </div>
    </div>
    <script>
NProgress.done();
</script>
    
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
