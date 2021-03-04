<!DOCTYPE html>
<html lang="en">
<head>
  <head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <title>Student Login</title>

  <!-- GOOGLE FONTS -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500|Poppins:400,500,600,700|Roboto:400,500" rel="stylesheet"/>
  <link href="https://cdn.materialdesignicons.com/3.0.39/css/materialdesignicons.min.css" rel="stylesheet" />

  <!-- PLUGINS CSS STYLE -->
  <link href="../assets/plugins/toaster/toastr.min.css" rel="stylesheet" />
  <link href="../asset/plugins/nprogress/nprogress.css" rel="stylesheet" />
  <link href="../asset/plugins/flag-icons/css/flag-icon.min.css" rel="stylesheet"/>
  <link href="../asset/plugins/jvectormap/jquery-jvectormap-2.0.3.css" rel="stylesheet" />
  <link href="../asset/plugins/ladda/ladda.min.css" rel="stylesheet" />
  <link href="../asset/plugins/select2/css/select2.min.css" rel="stylesheet" />
  <link href="../asset/plugins/daterangepicker/daterangepicker.css" rel="stylesheet" />

  <!-- SLEEK CSS -->
  <link id="sleek-css" rel="stylesheet" href="../assets/css/sleek.css" />

  

  <!-- FAVICON -->
  <link href="../assets/img/favicon.png" rel="shortcut icon" />

  <!--
    HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries
  -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <script src="../assets/plugins/nprogress/nprogress.js"></script>
  <?php 
    session_start();
        if(!isset($_SESSION['pending'])){
          header("location:../student/index.php?message=not_login");
       }
    ?>
</head>

</head>
  <body class="bg-light-gray" id="body">
      <div class="container d-flex flex-column justify-content-between vh-100">
      <div class="row justify-content-center mt-5">
        <div class="col-xl-5 col-lg-6 col-md-10">
          <div class="card">
            <div class="card-header bg-primary">
              <div class="app-brand">
                <a href="../">
                  <svg class="brand-icon" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid" width="30" height="33"
                    viewBox="0 0 30 33">
                    <g fill="none" fill-rule="evenodd">
                      <path class="logo-fill-blue" fill="#7DBCFF" d="M0 4v25l8 4V0zM22 4v25l8 4V0z" />
                      <path class="logo-fill-white" fill="#FFF" d="M11 4v25l8 4V0z" />
                    </g>
                  </svg>
                  <span class="brand-name">APU Hostel</span>
                </a>
              </div>
            </div>
            <div class="card-body p-5">

              <h4 class="text-dark mb-5">Enter Your OTP</h4>
              <?php if(isset($_GET['message'])) {
                        if($_GET['message'] == "fail"){
			                ?>
                                    <div class="alert alert-danger alert-dismissible fade show"
                                        style="margin-bottom: 30px">
                                        <strong>Error!</strong> Wrong credentials!
                                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    </div>
                                    <?php
                    	} else if($_GET['message'] == "noCredential"){
			                ?>
                                    <div class="alert alert-danger alert-dismissible fade show"
                                        style="margin-bottom: 30px">
                                        <strong>Error!</strong> Insert your credentials!
                                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    </div>
                                    <?php
		                } else if($_GET['message'] == "not_login"){
			                ?>
                                    <div class="alert alert-danger alert-dismissible fade show"
                                        style="margin-bottom: 30px">
                                        <strong>Error!</strong> Please Login!
                                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    </div>
                                    <?php
                        } else if($_GET['message'] == "logout") {
                        ?>
                                    <div class="alert alert-info alert-dismissible fade show">
                                        <strong>Logout Success!</strong> Thank you :)
                                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    </div>
                                    <?php
                                }
                                    } ?>
                                    <!--  -->
              
              <form role="form" method="POST" action="../controller/mfaAuth.php">
                <div class="row">
                  <div class="form-group col-md-12 mb-4">
                    <input type="text" name="otp" class="form-control input-lg"  placeholder="Enter Your OTP">
                  </div>
                  <div class="col-md-12">
                    <div class="d-flex my-2 justify-content-between">
                      <div class="d-inline-block mr-3">
                
                    <button type="submit" name="login" value="Submit" class="btn btn-lg btn-primary btn-block mb-4">Submit</button>
                    
                    
                    <p>Check Your Email!</p>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
</body>
</html>