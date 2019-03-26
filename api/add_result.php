<?php
session_start();
require ('connection.php');
$sid = $_SESSION["sid"];
$qbid = $_COOKIE["qbid"];
$result = $_GET["marks"];
$sql = "INSERT INTO result VALUES('".$sid."','".$qbid."','".$result."')";
mysqli_query($con,$sql);
header("location:.././student-dashboard.php");
?>