<table id = 'search'>
    <style>
        caption{
            text-align:left;
        }
    </style>

        <?php
        session_start();
            $conn = new mysqli("mysql.cs.nott.ac.uk", "psyky2", "Xiaozhu1258?", "psyky2");
            //retrieves input
            $Name = $_POST['name'];

                if (isset($Name) && $Name != "") {  
                    if(preg_match('/[^a-zA-Z0-9 ]/', $Name) || ctype_space($Name) ){
                        $_SESSION['alert10'] = 'true';
                        header('location:index.php');
                    } else {
                        //print out 
                        echo "<caption><h2> Search Results : </h2></caption>"; 
                        echo "<th> ACTOR NAME </th>";
                        $query1 = mysqli_query($conn, "SELECT * FROM Actor WHERE actName LIKE '%$Name%'");
                        
                        $count = 0;
                        while ($data = mysqli_fetch_array($query1)) {
                            $id   = $data['actID'];
                            $name = $data['actName'];
                            echo "<tr><td>$name</td></tr>";
                            $count = 1;
                        }
                        if ($count == 0) {
                            echo "<br><tr><td> no actors</td></tr><br>";
                        }   
                        
                        
                                        
                        echo "<th><br> MOVIE TITLES </br> </th>";                   
                        $query2 = mysqli_query($conn, "SELECT * FROM Movie WHERE mvTitle LIKE '%$Name%'");                    
                        $count1 = 0;
                        while ($data1 = mysqli_fetch_array($query2)) {
                            $name1 = $data1['mvTitle'];
                            echo "<tr><td>$name1</td></tr>";
                            $count1 = 1;
                        }
                        if ($count1 == 0) {
                            echo "<tr><td>no movies</td></tr>";
                        }  
                    }                 
                }
        ?>
</table>