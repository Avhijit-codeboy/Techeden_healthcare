<?php
session_start();
include('config.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $iid=$_POST['iid'];
    $sql="DELETE FROM items WHERE ItemId = '$iid'";
    $result = mysqli_query($conn, $sql);
    
    header("Location:shop.php");
}
?>
