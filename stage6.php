<?php
    include_once 'includes/dbh.inc.php';
?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>The Untold Journey</title>
        <link href="stageStyle.css" rel="stylesheet"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
                $("#option1").click(function(){
                    $("#questions").load("loadstage5-easyquestions.php");
                    $("#option2").hide();
                });
                $("#option2").click(function(){
                    $("#questions").load("loadstage5-hardquestions.php");
                    $("#option2").hide();
                });
            });
        </script>
    </head>
    <body>
        <h1>Stage 5</h1>
        <div class="leftBox">
            <p>The next morning, as Wembly is about to give up and turn back, he notices some very unique
            plants in an open area in the forest. One of the plants has dark purple shade to it, his mother's 
            favorite color. The other plant is light blue with a tint of orange, which is Wembly's favorite color.
            Wembly knew that some plants in the forest had special healing powers, however, once picked from the 
            ground, they must be kept in a closed container. Wembly only has enough room for one of the plants.
            Which one should he pick? 
            </p>
            <button type="button" class="option1" id="option1">Pick the dark purple plant!</button>
            <button type="button" class="option2" id="option2">Pick the blue and orange plant!</button>
        </div>
        <div class="rightBox" id="questions">

        </div>
            
    </body>
</html>