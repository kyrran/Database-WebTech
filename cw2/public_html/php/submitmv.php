<?php
    if(isset($_POST['submit2'])){
        session_start();
        //get the name entered by user
        $actID = $_POST['actID'];
        $mvTitle = $_POST['mvname'];
        $mvGenre = $_POST['mvGenre'];
        $mvYear = $_POST['mvYear'];
        $mvPrice = $_POST['mvPrice'];

        $conn = mysqli_connect("mysql.cs.nott.ac.uk","psyky2","Xiaozhu1258?","psyky2") or die(mysqli_error());
        
        $result1=mysqli_query($dbc,"SELECT * from Movie where mvTitle='$mvTitle' ");
        //check if there is a movie existed in this database
        $howmanyrows=mysqli_num_rows($result1);

        if($howmanyrows != 0){    
            $_SESSION['alert6'] = 'true';
            header('location:../index.php');
        }else if (preg_match('/[^a-zA-Z0-9 ]/', $mvTitle) || ctype_space($mvTitle)){
            // it only allow a-z, A-Z, 0-9 and space(not only space)
            $_SESSION['alert9'] = 'true';
            header('location:../index.php');
        }else{
            $result = mysqli_query($conn,"INSERT INTO Movie (actID, mvTitle, mvGenre, mvYear, mvPrice) VALUES ('$actID', '$mvTitle', '$mvGenre','$mvYear','$mvPrice')") or die(mysqli_error());
            $_SESSION['alert4'] = 'true';
            //redirects to index.php
            header('location:../index.php');
        }
    }   
?>