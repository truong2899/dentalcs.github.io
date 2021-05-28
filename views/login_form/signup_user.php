<?php
session_start();
include('../phpChatBot/database.inc.php');
$tr = new getData();
$con = $tr->ketnoi_csdl();
?>
<!DOCTYPE html>
<html lang="en"><!-- Basic -->
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">   
   
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
 
     <!-- Site Metas -->
    <title>Login and Register tabbed form</title>  
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">

    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<!-- Site CSS -->
    <link rel="stylesheet" href="css/style.css"> 
	<!-- Fontawesome CSS -->
    <link rel="stylesheet" href="css/all.min.css">  	
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/custom.css">

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
<div id="particles-js" class="main-form-box">
	<div class="md-form">
		<div class="container">
			<div class="row">
				<div class="col-md-6 offset-md-3">
					<div class="panel panel-login">
					
						<div class="panel-heading">
							<div class="row">
                            <div class="col-lg-12 col-sm-12 col-xl-12">
									<a href="#" id="register-form-link">Đăng Kí</a>
								</div>
							
							</div>
						</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-lg-12">
					
									<form id="register-form" action="" method="post" role="form">
									<div class="form-group">
											<label class="icon-lp"><i class="fas fa-user-tie"></i></label>
											<input type="text" name="fullname" id="fullname" tabindex="1" class="form-control" placeholder="Fullname" value="" required="">
										</div>
										<div class="form-group">
											<label class="icon-lp"><i class="fas fa-user-tie"></i></label>
											<input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Username" value="" required="">
										</div>
										<div class="form-group">
											<label class="icon-lp"><i class="fas fa-envelope"></i></label>
											<input type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="Email Address" value="" required="">
										</div>
										<div class="form-group">
											<label class="icon-lp"><i class="fas fa-key"></i></label>
											<input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password" required="">
										</div>
										<!-- <div class="form-group">
											<label class="icon-lp"><i class="fas fa-key"></i></label>
											<input type="password" name="confirm-password" id="confirm-password" tabindex="2" class="form-control" placeholder="Confirm Password" required="">
										</div> -->
										<div class="form-group">
											<label class="icon-lp"><i class="fas fa-key"></i></label>
											<input type="password" name="phonenumber" id="phonenumber" tabindex="2" class="form-control" placeholder="PhoneNumber" required="">
										</div>
									
										
										<div class="form-group">
											<div class="row">
												<div class="col-sm-6 offset-sm-3">
													<input type="submit" name="nut_dangki" id="nut_dangki" tabindex="4" class="form-control btn btn-register" value="Đăng Kí">
												</div>
											</div>
										</div>										
									</form>
									<?php include('get_formsignup.php') ?>
									
								</div>
							</div>
						</div>
					</div>
					
		
					
				</div>
			</div>
		</div>	
	</div>
	
</div>

	
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/particles.min.js"></script>

	
</body>
</html>
