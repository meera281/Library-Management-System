<?php
session_start();
include "dbconnect.php";
$sno = $_GET["sno"];
$sql = "DELETE FROM `books` WHERE sno= '$sno'";
$result = mysqli_query($conn,$sql);
header("location: showbooks.php");
?>