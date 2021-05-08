<?php
session_start();
include('config.php');
$shop=$_SESSION['sid'];
?>
<html>
<head>
	<title>Login Page</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="s1.css" />
	<link rel="stylesheet" type="text/css" href="shop.css" />
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
						<pre>                                    </pre>
						<h1 style="color: black; font-weight:bold;">Welcome <?php echo " $shop";?></h1>
						<form action="logout.php">   
							<button class="btn btn-opacity-dark mr-1" onclick="">Logout</button>
 </form>
						
					</div>
				</div>
			</div>
		</nav>
	</header>
	
	<div class="container-login100">


		<button class="btn btn-opacity-light mr-1" type="button" onclick="fun()">Add Item</button>


            <div id="myModal" class="modal">
                <div class="modal-content">
                    <span class="close">&times;</span>
                    <form>
                        <label>ItemId:</label><input type="text" id="iid" value="" required><br>
                        <label>ItemName:</label><input type="text" id="iname" value="" required><br>
                        <label>Quantity:</label><input type="text" id="quantity" value="" required><br>
                        <label>Price:</label><input type="text" id="price" value="" required><br>
                        <input type="submit" id="add" value="Add" onclick="addOrEdit(this.value)">
                    </form>
                </div>

            </div>
			<div><?php
                    $sql = "SELECT * FROM items WHERE ShopId='$shop'";
                    $result = mysqli_query($conn, $sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo '
                            <div class="card">
                                <div class="header">
                                    <div class="headtext">
                                        <h4>' . $row['ItemName'] . '
                                    </div>
                                    <div id="' . $row["ItemId"] . '" onclick="deleteItem(this.id)">
                                        <i class="fa fa-trash","w3-padding w3-xlarge w3-text-orange"></i>
                                    </div>
                                </div>
                                        </h4>
              
                                <p class="price">Price:' . $row['ItemPrice'] . '</p>
                                <p class="quantity">Quantity Available :' . $row['Quantity'] . '</p>
                                <button id="' . $row["ItemId"] . '" onclick="edit(this.id)">Edit</button>
                            </div>';
                        }
                    }
                    ?>
           </div>
	</div>
	<script>
        function fun(a) {
            var iid = document.getElementById("iid");
            var iname = document.getElementById("iname").value;
            var quantity = document.getElementById("quantity").value;
            var price = document.getElementById("price").value;
            var modal = document.getElementById("myModal");
            var span = document.getElementsByClassName("close")[0];
            modal.style.display = "block";
            span.onclick = function() {
                console.log("in");
				document.getElementById("iid").value
				=document.getElementById("iname").value
				=document.getElementById("quantity").value
                 = document.getElementById("price").value="";
            	var modal = document.getElementById("myModal");
                iid.readOnly = "false";
                document.getElementById("add").value = "Add";
                modal.style.display = "none";
            }
            window.onclick = function(event) {
                if (event.target == modal) {
                    console.log("in22");
                    document.getElementById("iid").value
				=document.getElementById("iname").value
				=document.getElementById("quantity").value
                 = document.getElementById("price").value="";
                    iid.readOnly = "false";
                    document.getElementById("add").value = "Add";
                    modal.style.display = "none";
                }
            }

        }

        function edit(a) {
            fun(a);
            if (a) {
                document.getElementById("iid").value = a;
                document.getElementById("iid").readOnly = "true";
                document.getElementById("add").value = "Save Changes";
            }
        }

        function addOrEdit(bvalue) {
            var iid = document.getElementById("iid").value;
            var iname = document.getElementById("iname").value;
            var quantity = document.getElementById("quantity").value;
            var price = document.getElementById("price").value;
            if (bvalue == "Add") {
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (xhttp.readyState == 4 && xhttp.status == 200) {
                        alert("Item Added Sucessfully!");
                    }
                };
                xhttp.open("POST", "newitem.php", true);
                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhttp.send("iid=" + iid + "&iname=" + iname + "&quantity=" + quantity + "&price=" + price);
            }
            if (bvalue == "Save Changes") {
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (xhttp.readyState == 4 && xhttp.status == 200) {
                        alert("Item Updated Sucessfully !");
                    }
                };
                xhttp.open("POST", "updateitem.php", true);
                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhttp.send("iid=" + iid + "&iname=" + iname + "&quantity=" + quantity + "&price=" + price);
            }
        }

        function deleteItem(id) {

            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (xhttp.readyState == 4 && xhttp.status == 200) {
                    alert("Item Deleted Sucessfully!");
                }
            };
            xhttp.open("POST", "deleteitem.php", true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send("iid=" + id);

        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
</body>

</html>