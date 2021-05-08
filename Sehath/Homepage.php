<html>

<head>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
	<title>Homepage</title>
	<link rel="stylesheet" type="text/css" href="homepage.css" />
</head>

<body>
	<header id="header-section">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<div class="navbar-brand-wrapper d-flex w-80">
				<img src="images/sehathlogo.png" class="rounded" alt>
			</div>
			<div class="container-fluid">
				<h1 style="color: #00aa99; font-weight:bold;">Sehath</h1>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse"
					data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false"
					aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
					<div class="navbar-nav">
					</div>
				</div>
				<form action="VolunteerReg.php" method="GET" id="f3">
					<button class="btn btn-opacity-light mr-1">Register as Volunteer</button>
				</form>
			</div>
		</nav>
	</header>
	<div class="banner">
		<div class="container">
			<h1 class="font-weight-semibold">
				"Search Engine optimization"<br>
				"Marketing"
			</h1>
			<h6 class="font-weight-normal text-muted pb-3">
				Simple web application for user to check the availability of medicines or items in need of medical
				urgency around him.</h6>
			<div class="button-div">

				<form action="Login.php" method="GET" id="f1">

					<button class="btn btn-opacity-light mr-1">Shopekeeper</button>

				</form>


				<form action="Public.php" method="GET" id="f2">
					<button class="btn btn-opacity-success mr-1">Public</button>

				</form>



			</div><br><br>
			<img src="images/doctor.jpg" alt class="img-fluid">
		</div>
	</div>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf"
		crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"
		integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG"
		crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js"
		integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc"
		crossorigin="anonymous"></script>
</body>

</html>