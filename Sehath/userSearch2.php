<html>
<head>
  <link rel="stylesheet" href="shop.css">
  <script>
  function getLocation()
    {if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(function(position) {
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
  function openMaps(url){
  console.log("hello");
      window.open(url);
    }
  </script>
</head>
<body>
  <?php
  echo '<script>getLocation();</script>';
  $q1 = $_GET['meds'];
  $q2 = $_GET['loc'];
  include('config.php');
  $arr = array("");
  $allcards="";
  $cardx = "";
  if ($q1 != '') {
    $sql = "SELECT * FROM items WHERE ItemName LIKE '%$q1%'";
    $result = mysqli_query($conn, $sql);
$allcards="";
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $cardx = '<div class="card">
                    <div class="header">
                      <div class="headtext">
                        <h4>' . $row['ItemName'] . '
                      </div>
                    </div>
                        </h4>
                    <p class="price">Price:' . $row['ItemPrice'] . '</p>
                    <p class="quantity">Quantity Available :' . $row['Quantity'] . '</p>';

        $currsid = $row['ShopId'];
        $sql2 = "SELECT * FROM shops WHERE ShopId = '$currsid'";
        $result2 = mysqli_query($conn, $sql2);
        if ($result2->num_rows > 0) {
          while ($row2 = $result2->fetch_assoc()) {
            $loc_url='https://www.google.com/maps/search/?api=1&query=' . $row2['X'] . ',' . $row2['Y'] . '';
            $cardx = $cardx
              . '<p class="price">ShopName:' . $row2['ShopName'] . '</p>'
              . '<p class="price">Address:' . $row2['Address'] . '</p>'
              . '<button id="' . $loc_url . '" onclick="openMaps(this.id)">Open in Maps</button>
      </div>';
      $allcards=$allcards.$cardx;
          }
          
        }
      }
    }
    
  }
  if($q2!='' && $q1!='')
{
$sql="SELECT * FROM shops WHERE Address LIKE '%$q2%'";
$result = mysqli_query($conn,$sql);
$allcards="";
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $currsid=$row['ShopId'];
  $sql2="SELECT * FROM items WHERE ShopId = '$currsid' AND ItemName LIKE '%$q1%'";
  $result2 = mysqli_query($conn,$sql2);
  if ($result2->num_rows > 0) {
    while ($row2 = $result2->fetch_assoc()) { 
      $cardx = '<div class="card">
      <div class="header">
        <div class="headtext">
          <h4>' . $row2['ItemName'] . '
        </div>
      </div>
          </h4>
      <p class="price">Price:' . $row2['ItemPrice'] . '</p>
      <p class="quantity">Quantity Available :' . $row2['Quantity'] . '</p>';
$loc_url='https://www.google.com/maps/search/?api=1&query=' . $row['X'] . ',' . $row['Y'] . '';
$cardx = $cardx
. '<p class="price">ShopName:' . $row['ShopName'] . '</p>'
. '<p class="price">Address:' . $row['Address'] . '</p>'
. '<button id="' . $loc_url . '" onclick="openMaps(this.id)">Open in Maps</button>
</div>';
$allcards=$allcards.$cardx;
    }
    
  }
 
}
}

}
if($q2!='' && $q1=='')
{
$sql="SELECT * FROM shops WHERE Address LIKE '%$q2%'";
$result = mysqli_query($conn,$sql);
$allcards="";
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $currsid=$row['ShopId'];
  $sql2="SELECT * FROM items WHERE ShopId = '$currsid'";
  $result2 = mysqli_query($conn,$sql2);
  if ($result2->num_rows > 0) {
    while ($row2 = $result2->fetch_assoc()) { 
      $cardx = '<div class="card">
      <div class="header">
        <div class="headtext">
          <h4>' . $row2['ItemName'] . '
        </div>
      </div>
          </h4>
      <p class="price">Price:' . $row2['ItemPrice'] . '</p>
      <p class="quantity">Quantity Available :' . $row2['Quantity'] . '</p>';
$loc_url='https://www.google.com/maps/search/?api=1&query=' . $row['X'] . ',' . $row['Y'] . '';
$cardx = $cardx
. '<p class="price">ShopName:' . $row['ShopName'] . '</p>'
. '<p class="price">Address:' . $row['Address'] . '</p>'
. '<button id="' . $loc_url . '" onclick="openMaps(this.id)">Open in Maps</button>
</div>';
$allcards=$allcards.$cardx;
    }
  }
}
}
}
echo $allcards;
  mysqli_close($conn);
  ?>
  <script>
function openMaps(url){
  console.log("hello");
      window.open(url);
    }
  </script>
</body>

</html>

<!-- order by 111.111 *DEGREES(ACOS(LEAST(1.0, COS(RADIANS(latitude))* COS(RADIANS($lat))* COS(RADIANS(longitude - $lon))+ SIN(RADIANS(latitude))* SIN(RADIANS($lat))))) -->