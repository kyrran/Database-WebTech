<div id='add' style='display:none;'>

    <!-- FORM  for add actor-->
    <h1> Add Actor </h1>
    <form method='post' action='php/submitact.php'>
        Name
        <input id = 'name' name='name' type = 'text' placeholder = 'add an actor' required>
        <button type='submit' name ='submit' style = "border-radius:4px; "> add </button>
    </form>  

    <br>
    <!--add movie-->
    <h1> Add Movie </h1>
    <form method='post' action='php/submitmv.php'>
        Actor
        <select id ='actID' name='actID'>
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

        <br>
        <br>Title
        <!--there must be a movie name-->
        <input id = 'mvname' name='mvname' type = 'text' placeholder = 'add a movie' required>
       
        <br>
        <br>Genre
            <select id ='mvGenre' name='mvGenre'>
             <?php 
                    //select distinct elements
                    $query2 = mysqli_query($conn,"SELECT DISTINCT mvGenre FROM Movie");
                    while ($data2 = mysqli_fetch_array($query2)) {
                        $mvGenre = $data2["mvGenre"];
                        echo "<option value = '$mvGenre'> $mvGenre </option>"; 
                        //option is the list 
                    }
                ?>  
            </select>

        <br>
        <br>Year
        <select id="mvYear" name ='mvYear'>
        <script>
            var nowY = new Date().getFullYear();
            options = ""; 
            //a list of years from 1950
            for(var Y=nowY - 1; Y>=1950; Y--) {
            options += "<option>"+ Y +"</option>";
            }
            $('#mvYear').append('<option value="2020" selected="selected">2020</option>');   
            $("#mvYear").append( options );
        </script>
        </select>
        
        <br>
        <br>Price
        <input type = "number" step = "0.01" value = "8.51" min = "0.00" max ='13.00'  name='mvPrice' placeholder="0.00">
        <span class="validity"></span>
        <!--check the validatin of the number-->
            <style>
            input:invalid+span:after {
                content: '✖';
                padding-left: 5px;
            }
            input:valid+span:after {
                content: '✓';
                padding-left: 5px;
            }
            </style>
        <button type='submit' name = 'submit2' style = "border-radius:4px;"> add </button>
    </form>
</div>
