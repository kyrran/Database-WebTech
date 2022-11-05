<?php
    if(isset($_POST['submit'])){
        session_start();
        //get the name entered by user
        $actName = $_POST['name'];

        $conn = mysqli_connect("mysql.cs.nott.ac.uk","psyky2","Xiaozhu1258?","psyky2") or die(mysqli_error());
        $result1=mysqli_query($conn,"SELECT * from Actor where actName='$actName' ");
        //check if there is an actor existed in this database
        $howmanyrows=mysqli_num_rows($result1);

        if($howmanyrows != 0){    
            $_SESSION['alert5'] = 'true';
            header('location:../index.php');
        }else if (preg_match('/[^a-zA-Z0-9 ]/', $actName) || ctype_space($actName)){
            // it only allow a-z, A-Z, 0-9 and space(but not only space)
            $_SESSION['alert8'] = 'true';
            header('location:../index.php');
        } else { 
            $result = mysqli_query($conn,"INSERT INTO Actor(actName) VALUES('$actName')") or die(mysqli_error());
            $_SESSION['alert3'] = 'true';
            //redirects to index.php
            header('location:../index.php');
        }
    }   
?>