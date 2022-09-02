<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "librarylogin";

$conn = mysqli_connect($servername, $username, $password, $database);

if($conn){
    echo "connection successful";
}
else{
    die("connection failed" . mysqli_connect_error());
}
?>