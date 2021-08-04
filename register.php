<!DOCTYPE html>
<?php
@session_start();
if(@$_SESSION['admin']){
    header('location:users/admin/index.php');
}else if(@$_SESSION['staff']){
    header('location:users/staff/index.php');
}else if(@$_SESSION['client']){
    header('location:users/client/index.php');
}else{
?>
<html lang="en">
<head>
	<title>Register</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/style.css">

<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" method="post" action="controllers/proses_reg.php" enctype="multipart/form-data">
					<span class="login100-form-title p-b-26" style="margin-top:-10px;">
						Register
					</span>
					
                    <div class="wrap-input100 validate-input" >
						<input class="input100" type="text" name="nama" required />
						<span class="focus-input100">Nama</span>
                    </div>

					<div class="wrap-input100 validate-input" required>
						<input class="input100" type="text" name="username">
						<span class="focus-input100">Username</span>
                    </div>
                    
					<div class="wrap-input100 validate-input" data-validate="Enter password" required />
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input class="input100" type="password" name="password1" required />
						<span class="focus-input100">Password</span>
                    </div>
                    <div class="wrap-input100 validate-input" data-validate="Enter password">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input class="input100" type="password" name="password2" required>
						<span class="focus-input100">Retype Password</span>
                    </div>
                    <select name="level" style="width:100%; margin-bottom:20px; margin-top:0px;" class="form-control show-tick" required>
                            <option value="" selected="">--Pilih User--</option>            
                            <option value="client">client</option>
                            <option value="staff">staff</option>
                            <option value="admin">Admin</option>
                             
                        </select>

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn">
								Register
							</button>
						</div>
					</div>

					<div class="text-center p-t-115" style="margin-top:-100px;">
						

						<a class="txt2" href="index.php">
							Login
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
</body>
</html>

<?php
}
?>