<!-- Refer to stage1.php for comments on the functionality of the stage PHP files. There probably is a way to reduce
the redundancy of these stage files, however I ran out of time due to some technical issues I ran into. The only
difference between the stage files are the descriptions of the story and the options the user gets to choose. -->

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
                    $("#questions").load("loadstage2-easyquestions.php");
                    $("#option2").hide();
                });
                $("#option2").click(function(){
                    $("#questions").load("loadstage2-hardquestions.php");
                    $("#option1").hide();
                });
            });
        </script>
    </head>
    <body>
        <h1>Stage 2</h1>
        <div class="leftBox">
            <p>Oh no! You choose the path where the evil troll lives. Now Wembly must find a way to get by.
            Wembly has two options to try and get by the troll. Help him decide what to do!
            </p>
            <button type="button" class="option1" id="option1">Grab a nearby rock and throw it to create a distraction.</button>
            <button type="button" class="option2" id="option2">Try and sneak by slowly without the troll noticing.</button>
            <br>
            <p id='lives'>Number of Lives: <?php echo $_SESSION['userLives']; ?></p>
        </div>
        <div class="rightBox" id="questions">

        </div>
            
    </body>
</html>