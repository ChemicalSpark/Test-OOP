<?php
//session_start();
if(isset($_SESSION['user'])){
	header("location:index.php");
	exit;
}

include "koneksi.php";
$crud = new crud();
if(isset($_POST['submit'])){
	$hasil = $crud->login($_POST['username'], md5($_POST['password']));
	if($hasil){
		header("location:index.php");
	}else{
		header("location:login.php?err=1;");	
	}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Login</title>
</head>
<body style="background-color: grey; height : 100%; padding : 15%;">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-5">
			<span style="color: red;">
				<?php
				if(isset($_GET['err'])){  
					$err = $_GET['err'];
				if($err = 1) echo"Username atau Password salah";
				}
				?>
			</span>
			<div class="card">
				<div class="card-header">LOGIN OOP CRUD</div>
					<div class="card-body">
						<form method="POST" action="">
							<div class="row mb-3">
								<label class="col-md-4 col-form-label text-md-end">Username</label>
								<div class="col-md-6">
									<input type="text" class="form-control" name="username" required autocomplete="email" autofocus>
								</div>
							</div>
							<div class="row mb-3">
								<label class="col-md-4 col-form-label text-md-end">Password</label>
								<div class="col-md-6">
									<input type="password" class="form-control" name="password" required autocomplete="current-password">
								</div>
							</div>
							<div class="row md-3">
								<div class="col-md-6 offset-md-4">
									<div class="form-check">
										
									</div>
								</div>
							</div>
							<div class="row mb-0">
								<div class="col-md-8 offset-md-4">
									<button type="submit" class="btn btn-primary" name="submit">Login</button>
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