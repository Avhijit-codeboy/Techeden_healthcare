<html>

<head>
    <title>Volunteer Registration Page</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="registration.css" />
    <script>

        function getLocation() {
            console.log("location recieved");
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function (position) {
                    var latt = position.coords.latitude;
                    var longg = position.coords.longitude;
                    var fullloc = position.coords.latitude + "," + position.coords.longitude;
                    console.log(position.coords.latitude + "," + position.coords.longitude)
                    document.cookie = escape("lat") + "=" + escape(latt) + "; path=/";
                    document.cookie = escape("long") + "=" + escape(longg) + "; path=/";
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

$name = $email = $address = $lat = $long = $phone = "";
$name_err = $address_err = $email_err = $phone_err = "";
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
    if (empty($_POST['name'])) {
        $name_err = "Name is Mandatory";
        $valid = false;
    } else {
        $name = test_input($_POST['name']);
    }
    if (empty($_POST['address'])) {
        $address_err = "Address is Mandatory";
        $valid = false;
    } else {
        $address = test_input($_POST['address']);
    }
    if (empty($_POST['phone'])) {
        $phone_err = "Phone is Mandatory";
        $valid = false;
    } else {
        $phone = test_input($_POST['phone']);
    }
    if (empty($_POST['email'])) {
        $email_err = "Email is Mandatory";
        $valid = false;
    } else {
        $email = test_input($_POST['email']);
    }

    if ($valid) {
        include('config.php');
        $sql = "INSERT INTO volunteers(Name,Email,Phone,Lat,Lon,Address) VALUES ('$name','$email','$phone','$lat','$long','$address')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo '<script>alert("Successfully registered as Volunteer. You will be notified via email about any nearby requests.")</script>';
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
			<h1 style=" color: #00aa99; font-weight:bold;">Sehath</h1>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <pre>                      </pre>
                        <h1 style="color: black; font-weight:bold;">Volunteer Registration</h1><br>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <div class="container-login100">
        <div class="form-container">
            <h3>Register</h3>
            <form method="POST" action="">
                <input type="text" class="form-control" name="name" placeholder="Name"><span>*
                    <?php echo $name_err ?>
                </span><br><br>
                <input type="email" class="form-control" name="email" placeholder="Email"><span>*
                    <?php echo $email_err ?>
                </span><br><br>
                <input type="text" class="form-control" name="address" placeholder="Address"><span>*
                    <?php echo $address_err ?>
                </span><br><br>
                <input type="text" class="form-control" name="phone" placeholder="Phone"><span>*
                    <?php echo $phone_err ?>
                </span><br><br>
                <button class="btn btn-opacity-geo mr-1" onclick="getLocation()" type="button">Get
                    Location</button><br><br>
                <button class="btn btn-opacity-light mr-1" name="register" value="Register" type="submit">Sign
                    Up</button><br><br>
            </form>
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