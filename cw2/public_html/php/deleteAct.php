<?php
session_start();
$conn = new mysqli("mysql.cs.nott.ac.uk","psyky2","Xiaozhu1258?","psyky2");

//retrieves input
$actID = $_POST['id'];
//makes query
$result3=mysqli_query($conn,"SELECT * from Movie where actID='$actID' ");
//check if there is an actor existed in this database
$howmanyrows=mysqli_num_rows($result3);

if($howmanyrows != 0){    
    $_SESSION['alert7'] = 'true';
    header('location:../index.php');
}else{ 
   
    mysqli_query($conn,"DELETE FROM Actor WHERE actID ='$actID'");
    $_SESSION['alert1'] = 'true';
    //redirects to index.php
    header('location:../index.php');
   
    
}

?>

