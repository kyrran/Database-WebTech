<div style ="width:100%;display:none;text-align:center;" id ='list2' >
  <style>
    #list2 {
        height:180px;
        overflow:scroll;  
    }
  </style>

    <table id ='switch' style = "width:100;"  >    
        <style>
            table#switch td tr {
                border: 1px solid rgb(50,50,50);
            }
            table#switch tr td{
                height:30px;
            }
            #switch tr:hover {background-color: white;}
            #switch tr:nth-child(even) {
                background-color: #f2f2f2;
            }
        </style>  

                         
        <tr>               
            <td><h3> Actors</h3></td>
            <td><h3> Their Movies</h3></td>    
        </tr>
     
                <?php 
                    $conn = new mysqli("mysql.cs.nott.ac.uk","psyky2","Xiaozhu1258?","psyky2");
                    $query = mysqli_query($conn,"SELECT * FROM Actor LEFT JOIN Movie 
                                                    ON Actor.actID = Movie.actID 
                                                    UNION ALL 
                                                    SELECT * FROM Actor RIGHT JOIN Movie 
                                                    ON Actor.actID = Movie.actID 
                                                    WHERE Actor.actID is NULL"); //the way to achieve full outer join in mysql 
                    while ($data = mysqli_fetch_array($query) ) {                                       
                        $name = $data["actName"];
                        $mvname = $data["mvTitle"];
                        //print NULL
                       if ($mvname == ""){
                            echo'<tr>';
                            echo "<td>",$name,"</td>";
                            echo "<td>";
                            echo "NULL";
                            echo "</td>";
                            echo'</tr>';  
                        } else {
                            echo'<tr>';
                            echo "<td>",$name,"</td>";
                            echo "<td>",$mvname,"</td>";
                            echo'</tr>';  
                        } 
                    }                                                                            
                ?>
    </table>
</div>
       