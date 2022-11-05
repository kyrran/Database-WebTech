<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php
ini_set("log_errors", 1);
ini_set("error_log", "/tmp/php-error.log");
error_log( "Hello, errors!" );
?>
<head>
    <link href='style.css' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Inter:300,400,500,700&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    <div id='header'>
        <table style='width:100%'>
            <tr>
                <td>
                    <br>
                    <a href="index.php" style='font-weight:lighter;margin-left:1em;font-size:1em'> MOVIES & ACTORS </a>
                </td>

                <td>
                    <form method='post' style='margin-top:1em;text-align:center'>
                    <!--it must type something-->
                        <input type = 'text' style='border-top-left-radius:0.3em;border-bottom-left-radius:0.3em;padding-top:.5em;' placeholder = "  search for actor or movie " name='name' required>
                        <button type='submit' style='border-top-right-radius:0.3em;border-bottom-right-radius:0.3em;padding-top:.5em;' > search </button>
                        <!--add hover to button-->
                            <style>
                            button[type='submit']:hover,#header button[type='submit']:hover{                              
                                background-color:grey;
                                color:white;                                                 
                            }                         
                            </style>
                    </form>
                </td>

                <td> 
                    <span button class='top'>
                    <button type = 'submit' onclick = 'addInfo()' > ADD INFO</button>                   
                    <button type = 'submit' onclick = 'deleteInfo()'> DELETE INFO</button>
                    </span>                  
                </td>           
            </tr>    
        </table>
    </div>

</head>

<body>
 
    <div id='main'>
    
        <!--searching for-->
        <?php include 'php/alertmessage.php'?>
        <?php include 'php/Search.php'?> 
        <!--button to switch table-->
        
        <!--list 1-- if click search, hide list-->                        
        <?php   if (isset($_POST['name'])) { ?>
            <div style="display:none;" id='show'>
        <?php  } else { ?>          
                    <div style="display:block;text-align:center" id='show'>      
                       
                        <table style = "width:100% " >                                                                              
                            <tr>                              
                                <td><h1> List of Actors</h1></td>                                 
                                 <td><h1>List of Movies</h1></td>
                            </tr>
                            
                            <tr>
                                <td>
                                    <!--show the actor table-->
                                        <?php 
                                            $conn = new mysqli("mysql.cs.nott.ac.uk","psyky2","Xiaozhu1258?","psyky2");
                                            $query = mysqli_query($conn,"SELECT * FROM Actor");
                                            while ($data = mysqli_fetch_array($query)) {
                                                $name = $data["actName"];                                         
                                                echo "<ul><li>",$name,"</li></ul>";                                          
                                            }
                                        ?>
                                </td>
                
                                <td>    
                                    <!--show the movie table-->
                                    <?php
                                        $query2 = mysqli_query($conn,"SELECT * FROM Movie");
                                        while ($data2 = mysqli_fetch_array($query2)) {
                                            $mvname = $data2["mvTitle"];                           
                                            echo "<ul><li>",$mvname,"</li></ul>";                                          
                                            }
                                    ?>       
                                </td>
                            </tr>
                        </table>  
                    </div>   
        <?php  } ?>              
            </div>                            
        
    </div>

    <?php include 'php/addInfo.php'?>
    <?php include 'php/deleteInfo.php'?>
                
</body>

<script src='javascript.js'></script>

<script>
 
//to generate different error messages
    var i = 1;
    for(i=1;i<11;i++){
        $("#alert" + i).delay(2500).fadeOut(300);
    }


    function list234(){
           if(document.getElementById('list2').style.display == 'none'){
            document.getElementById('list2').style.display = 'block';
           }else{
            document.getElementById('list2').style.display = 'none'; 
           }
    }
</script>
</html>