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
            <p>The next morning, as Wembly is about to give up and turn back, he spots some of the most beautiful
            flowers he has ever seen. Wembly decides to grab one of the flowers to bring back to his mom. His choices
            are a dark purple flower or a bright orange flower. Which one do you think his mother will like more?
            </p>
            <button type="button" class="option1" id="option1">Pick the dark purple flower!</button>
            <button type="button" class="option2" id="option2">Pick the bright orange flower!</button>
            <br>
            <p id='lives'>Number of Lives: <?php echo $_SESSION['userLives']; ?></p>
        </div>
        <div class="rightBox" id="questions">

        </div>
            
    </body>
</html>