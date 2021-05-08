<html>
<head>
    <title>Registration Page</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="registration.css" />
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
  
    </script>
</head>
<?php
function test_input($data1)
{
    $data1 = trim($data1);
    $data1 = stripslashes($data1);
    $data1 = htmlspecialchars($data1);
    return $data1;
}

$sid = $sname = $address =$lat=$long= $pass = $cpass = $stype = "";
$sid_err = $sname_err = $address_err = $pass_err = $cpass_err = $stype_err =  "";
$valid = true;



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_COOKIE['lat']) && isset($_COOKIE['long']))
{
$lat= $_COOKIE['lat'];
$long= $_COOKIE['long'];
}else{
    echo '<script>alert("kindly set location by hitting the set location button")</script>';
    $valid=false;
}
    if (empty($_POST['sid'])) {
        $sid_err = "Shope Id is Mandatory";
        $valid = false;
    } else {
        $sid = test_input($_POST['sid']);
    }
    if (empty($_POST['sname'])) {
        $sname_err = "Shope Name is Mandatory";
        $valid = false;
    } else {
        $sname = test_input($_POST['sname']);
    }
    if (empty($_POST['address'])) {
        $address_err = "Address is Mandatory";
        $valid = false;
    } else {
        $address = test_input($_POST['address']);
    }
    if (empty($_POST['pass'])) {
        $pass_err = "Password is Mandatory";
        $valid = false;
    } else {
        $pass = test_input($_POST['pass']);
        if (strlen($pass) < 4) {
            $pass_err = "Password length should be greater than 8 charecters";
        }
    }
    if (empty($_POST['cpass'])) {
        $cpass_err = "Confirm Password is Mandatory";
        $valid = false;
    } else {
        $cpass = test_input($_POST['cpass']);
        if ($pass != $cpass) {
            $cpass_err = "It doesnt match with Password";
        }
    }
    if (empty($_POST['stype'])) {
        $stype_err = "Shop Type is Mandatory";
        $valid = false;
    } else {
        $stype = test_input($_POST['stype']);
    }

    if ($valid) {
        include('config.php');
        $sql = "INSERT INTO shops(ShopId,ShopName,Address,X,Y,Type,Password) VALUES ('$sid','$sname', '$address','$lat','$long','$stype','$pass')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            
            echo '<script>alert("Successfully registered go ahead and signin ")</script>';
        } else {
            echo '<script>alert("Registration Failed Because of the Following Error :")</script>'. mysqli_error($conn);
        }
    }
}

?>

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
						<pre>                      </pre>
						<h1 style="color: black; font-weight:bold;">Shop Registration</h1><br>
					</div>
				</div>
			</div>
		</nav>
	</header>

    <div class="container-login100">
        <div class="form-container">
            <h3>SignUp</h3>
            <form method="POST" action="">
                <input type="text" class="form-control" id="shopid" name="sid" placeholder="Enter The Shop ID"><span>* <?php echo $sid_err ?></span><br><br>
                <input type="text" class="form-control" name="sname" placeholder="Enter Shop Name"><span>* <?php echo $sname_err ?></span><br><br>
                <button class="btn btn-opacity-geo mr-1" onclick="getLocation()" type="button">Get Location</button><br><br>

                <input type="text" class="form-control" name="address" placeholder="Enter Address"><span>* <?php echo $address_err ?></span><br><br>

                <input type="password" class="form-control" name="pass" placeholder="Enter password"><span>* <?php echo $pass_err ?></span><br><br>

                <input type="password" class="form-control" name="cpass" placeholder="Confirm password"><span>* <?php echo $cpass_err ?></span><br><br>
                <select class="form-select" name="stype" aria-label="">
                    <option selected>Select the shop Type</option>
                    <option value="1">Pharmacy</option>
                    <option value="2">General Store</option>
                    <option value="3">Others</option>
                </select><span>* <?php echo $stype_err ?></span><br><br>
                <button class="btn btn-opacity-light mr-1" name="register" value="Register" type="submit">Sign Up</button><br><br>
                <label>Already registered?</label>
                <br><br>
                <a href="Login.php">LogIn</a>
            </form>
        </div>

    </div>
  

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
</body>


</html>
<?php


?>