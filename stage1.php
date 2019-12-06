<!-- All of the stages are pretty similar except for the story. The functionality on each stage is the same.
I probably could have created stages for this to reduce redundancy, but I ran into some technical difficulties
and ran out of time. Each stage will have a scenario and then two options. After selecting one of the options the
page runs one of the loadstage PHP files depending on what stage and what is selected. -->

<?php
    include 'includes/dbh.inc.php';
    session_start();
?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>The Untold Journey</title>
        <link href="stageStyle.css" rel="stylesheet"/>
        <!-- This application uses AJAX and JQuery in order to load the questions on the screen without reloading
        the whole browser page. -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <!-- Loads the PHP file corresponding to the button selected. -->
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
            <!-- Buttons for selecting an option. -->
            <button type="button" class="option1" id="option1">Let's go to the left!</button>
            <button type="button" class="option2" id="option2">Let's go to the right!</button>
            <br>
            <!-- Shows user the number of lives left. -->
            <p id='lives'>Number of Lives: <?php echo $_SESSION['userLives']; ?></p>
        </div>
        <div class="rightBox" id="questions">

        </div>
            
    </body>
</html>