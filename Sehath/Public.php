<?php 
	if(isset($_COOKIE['lat']) && isset($_COOKIE['long']))
	{
	$lat= $_COOKIE['lat'];
	$long= $_COOKIE['long'];
	}
	?>
<html>
<head>
	<script> 
	function getLocation() {
    console.log("innn");
        if(navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
              var latt=position.coords.latitude;
              var longg=position.coords.longitude;
              console.log("in js");
              var fullloc=position.coords.latitude +","+ position.coords.longitude;
					console.log(position.coords.latitude +","+ position.coords.longitude)
                    document.cookie = escape("lat") + "="+ escape(latt) + "; path=/";
                    document.cookie =  escape("long") + "="+ escape(longg)  + "; path=/";
            });
        } else {
            alert("Sorry, your browser does not support HTML5 geolocation.");
        }
    }
	
  
	getLocation() </script>
	<title>Login Page</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="public.css" />
	<script>
		function showSuggestion() {
			let str1 = document.getElementById('x').value;
			let str2 = document.getElementById('y').value;
			var xmlhttp = new XMLHttpRequest();

			xmlhttp.open("GET", "userSearch2.php?meds=" + str1 + "&loc=" + str2, true);
			xmlhttp.send();

			xmlhttp.onreadystatechange = function() {
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
					document.getElementById('output').innerHTML = xmlhttp.responseText;
				}
			}
		}
	</script>
</head>

<body>
	<header id="header-section">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<div class="navbar-brand-wrapper d-flex w-80">
				<img src="images/sehathlogo.png" class="rounded" alt>
			</div>
			<div class="container-fluid">
			<h1 style="color: #00aa99; font-weight:bold;">Sehath</h1>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
					<div class="navbar-nav">
						<pre>                      </pre>
						<h1 style="color: black; font-weight:bold;">Medicine Availability Portal</h1><br>
					</div>
					<button type="button" class="btn btn-warning">Request a Volunteer!</button>
					<button type="button" class="btn btn-danger">Alert medicine!</button>
				</div>
			</div>
		</nav>
	</header>

	
	<div class="container-login100">
		<div class="form-container">
			<h2>Search Medicines</h2>
			<label>Item🔎</label>
			<input type="search" name="meds" id="x" class="form-control" onkeyup="showSuggestion()">
			<label>Location🔎</label>
			<input type="search" name="loc" id="y" class="form-control" onkeyup="showSuggestion()">
		</div>
		<hr class="center-diamond">
		<div id="output" style="font-weight:bold"></div>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
	<script>
function openMaps(url){
  console.log("hello");
      window.open(url);
    }


    </script>
</body>
</html>

<!-- INSERT INTO `items` (`ItemId`, `ItemName`, `ItemPrice`, `Quantity`,`ShopId`) 
VALUES ('i012',
'Tempra',
'123',
'5',
's2'),
('i123',
'Remdesivir',
'12',
'150',
's1'),
('i324',
'Augmentin',
'46',
'76',
's1'),
('i53',
'Oxygen Cylinder',
'12',
'1000',
's1'),
('i824',
'Flazol',
'142',
'12',
's2'); -->