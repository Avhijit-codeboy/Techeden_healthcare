<?php
@ob_start();
session_start();
$u_err = "";
$p_err = "";
$valid = true;
$fn = "";
$pass = "";
include('config.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (empty($_POST['uname'])) {
		$u_err = "Username cannot be empty";
		$valid = false;
	} else {
		$fn = $_POST['uname'];
	}

	if (empty($_POST['pname'])) {
		$p_err = "Password cannot be empty";
		$valid = false;
	} else {
		$pass = $_POST['pname'];
	}


	if ($valid) {
		$sql = "SELECT Password FROM shops WHERE ShopId='$fn'";
		$result = mysqli_query($conn, $sql);
		if (mysqli_num_rows($result) == 0) {
			$u_err = "User does not exist";
		} else {
			$row = mysqli_fetch_assoc($result);
			if ($row['Password'] != $pass) {
				$p_err = "Password entered is wrong!";
			} else {
				$_SESSION['sid'] = $fn;
				header('Location:shop.php');
			}
		}
	}
}
?>
<html>

<head>
	<title>Login Page</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="login.css" />
</head>

<body>
<header id="header-section">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<div class="navbar-brand-wrapper d-flex w-80">
				<img src="images/sehathlogo.png" class="rounded" alt>
			</div>
			<div class="container-fluid"">
			<h1 style="color: #00aa99; font-weight:bold;">Sehath</h1>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
					<div class="navbar-nav">
						<pre>                                           </pre>
						<h1 style="color: black; font-weight:bold;">Shop Login</h1><br>
					</div>
				</div>
			</div>
		</nav>
	</header>
	<div class="container-login100">
		<div class="form-container">
			<h3>Login</h3>

			<form class="login-form validate-form" method="POST" action="">

				Username:<br>
				<input class="form-control" type="text" name="uname" placeholder="Enter username"><span>* <?php echo $u_err ?></span><br><br>
				Password:<br>
				<input class="form-control" type="password" name="pname" placeholder="Enter password"><span>* <?php echo $p_err ?></span><br><br>

				<button class="btn btn-opacity-light mr-1" type="submit">Login</button><br><br>


				<label>Not Registered Yet?</label><br><br>

				<a class="txt2" href="Registration.php">Sign Up</a>
			</form>
		</div>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
</body>

</html>