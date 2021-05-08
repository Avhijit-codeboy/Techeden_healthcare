<?php
session_start();
include('config.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    $iid=$_POST['iid'];
    $iname=$_POST['iname'];
    $price=$_POST['quantity'];
    $quantity=$_POST['price'];
    $sid=$_SESSION['sid'];
    $sql="UPDATE items
    SET ItemName= '$iname',ItemPrice='$price',Quantity='$quantity'
    WHERE ItemId = '$iid' AND ShopId = '$sid'";
    $result = mysqli_query($conn, $sql);
    
    header("Location: ".$_SERVER["HTTP_REFERER"]);
}
?>
