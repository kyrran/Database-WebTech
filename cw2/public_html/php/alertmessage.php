<?php
// begin the session
session_start();
$x = 0;
// create an array
$my_array=array('Actor Deleted', 
                'Movie Deleted' ,
                'Actor Added' ,
                'Movie Added' ,
                'Actor Already Existed', 
                'Movie Already Existed',
                'Delete Movie First',
                'ActName Cannot Contain Any Special Characters & Only Space Is Not Allowed',
                'mvTitle Cannot Contain Any Special Characters & Only Space Is Not allowed',
                'Please Enter Letters or Digit Only');
 
// put the array in a session variable


for ($x = 1; $x<11; $x++){
    if(isset($_SESSION["alert$x"])){
        $m = $my_array[$x - 1];
        echo "<div id = 'alert$x' style = color:red; font-size:1em;'>$m</div>";
    }
    // a little message to say we have done it
    unset($_SESSION["alert$x"]);
}
?>