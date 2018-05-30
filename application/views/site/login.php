<!DOCTYPE html>
<html lang="en">
<head>
	<title>e-Izin | Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>

  <link rel="icon" href="<?php echo ASSET; ?>img/logo.jpg">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo ASSET; ?>bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo ASSET; ?>bower_components/font-awesome/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="<?php echo ASSET; ?>dist/login/util.css">
	<link rel="stylesheet" type="text/css" href="<?php echo ASSET; ?>dist/login/main.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
	<style media="screen">
    *{
      font-family: "Poppins";
    }
    .login100-form-title,.input100,.login100-form-btn,.txt1{
      font-family: "Poppins";
    }
    .container-login100{
      background: #E4F5F7;
    }
  </style>
</head>
<body>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">

        <h1>
          <!-- SUBID PENGEMBANGAN KARIR
  BIDANG MUTASI DAN PENGEMBANGAN KARIR
  BKPSDM KABUPATEN SUBANG -->
        </h1>
				<div class="login100-pic js-tilt" data-tilt>
					<img src="<?php echo ASSET; ?>img/logo.jpg" alt="IMG">
				</div>

				<form class="login100-form validate-form" action="" method="post">
          <?php
          if (!empty($data_login)) {
            ?>
            <div class="alert alert-danger" style="">
              <h4><i class="fa fa-warning"></i> Login Error</h4>
              <?php echo $data_login; ?>
            </div>
            <?php
          }
          else{
            ?>

 					<span class="login100-form-title">
 						 <b>Login Untuk Masuk Ke Sistem</b>
             <?php
           	if (!empty($result_login)) {
           		echo "$result_login";
           	}
           	 ?>

 					</span>
            <?php
          }
           ?>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="username" placeholder="Username" value="<?php echo isset($_POST['username'])?$_POST['username']:null; ?>">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user-circle" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" value="button" type="submit" name="button">
							Login
						</button>
					</div>

					<div class="text-center p-t-12">
            <span class="txt1">
							Apabila lupa atau tidak mengetahui Username & Password, hubungi Admin
						</span>
					</div>

					<div class="text-center p-t-136">

					</div>
				</form>
			</div>
		</div>
	</div>





<!-- jQuery 3 -->
<script src="<?php echo ASSET; ?>bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo ASSET; ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

	<script src="<?php echo ASSET; ?>dist/login/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>

	<script src="<?php echo ASSET; ?>dist/login/js/main.js"></script>

</body>
</html>
