<?php
    include_once 'includes/dbh.inc.php';
    session_start();
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
                    $("#questions").load("loadstage1-easyquestions.php");
                    $("#option2").hide();
                });
                $("#option2").click(function(){
                    $("#questions").load("loadstage1-hardquestions.php");
                    $("#option1").hide();
                });
            });
        </script>
    </head>
    <body>
        <h1>Stage 1</h1>
        <div class="leftBox">
            <p>After traveling into the forest for about an hour, Wembly comes across a split in the path.
                Which way should Wembly go?
            </p>
            <button type="button" class="option1" id="option1">Let's go to the left!</button>
            <button type="button" class="option2" id="option2">Let's go to the right!</button>
            <br>
            <p id='lives'>Number of Lives: <?php echo $_SESSION['userLives']; ?></p>
        </div>
        <div class="rightBox" id="questions">

        </div>
            
    </body>
</html>