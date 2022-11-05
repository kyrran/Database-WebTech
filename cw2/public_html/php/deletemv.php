<?php
session_start();

$conn = new mysqli("mysql.cs.nott.ac.uk","psyky2","Xiaozhu1258?","psyky2");
//retrieves input
$mvName = $_POST['name'];
//makes query
mysqli_query($conn,"DELETE FROM Movie WHERE mvTitle ='$mvName'");
//redirects to index.php
$_SESSION['alert2'] = 'true';
header('location:../index.php');
?>