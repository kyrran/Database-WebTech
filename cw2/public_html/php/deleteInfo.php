 <div id='delete' style='display:none;'>

    <!--delete movie -->
    <h1> Delete Movie</h1>
    <form method='post' action='php/deletemv.php'>
        Title
        <select id ="delname" name='name'>
            <?php
                    $query = mysqli_query($conn,"SELECT * FROM Movie");
                    while($data = mysqli_fetch_array($query)) {
                        $name = $data['mvTitle'];
                        echo "<option value = '$name'> $name </option>";
                    }
                ?>
        </select>
        <button type='submit'> delete </button>
    </form>
    <br>

    <!--delete actor -->
    <h1> Delete Actor</h1>
    <form method='post' action='php/deleteAct.php'>
        Actor
        <select name='id' id = 'delid'>
            <!--another php to create drop-down list-->
            <?php 
                    $query = mysqli_query($conn,"SELECT * FROM Actor");
                    while ($data = mysqli_fetch_array($query)) {
                        $name = $data["actName"];
                        $id = $data["actID"];
                        echo "<option value = '$id' > $name </option>";
                        //option is the list 
                    }
                ?>
        </select>
        <button type='submit'> delete</button>
    </form>  
    
    <br><br><br>
    <input type = 'image' onclick ='list234()' src ="https://www.pngitem.com/pimgs/m/543-5430988_jicc-festival-new-york-film-actor-logo-hd.png" style = "width:20px;height:20px;float:left;margin-right:1em;  ">
    <div class='text'> <-- to view the movies <br><-- each actor plays</div><br><br>
    <?php include 'switchtable.php'?> 
    <style>
        .text {
        text-transform: uppercase;
        font-weight:bold;
        font-size: 15px;
        }
    </style>          
</div>