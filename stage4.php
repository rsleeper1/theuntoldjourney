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
                $("#option2").click(function(){
                    $("#questions").load("loadstage4-easyquestions.php");
                    $("#option1").hide();
                });
                $("#option1").click(function(){
                    $("#questions").load("loadstage4-hardquestions.php");
                    $("#option2").hide();
                });
            });
        </script>
    </head>
    <body>
        <h1>Stage 4</h1>
        <div class="leftBox">
            <p>As the sun begins to set, Wembly needs to find a place to rest for the night. He notices a cave about 
            a mile away, however, he is unsure if he can make it there before dark. There are a enough resources at 
            his current location to build a small shelter for the night, however he is unsure if he can finish the
            shelter before dark. What should Wembly do?
            </p>
            <button type="button" class="option1" id="option1">Try to reach the cave.</button>
            <button type="button" class="option2" id="option2">Build the shelter.</button>
            <br>
            <p id='lives'>Number of Lives: <?php echo $_SESSION['userLives']; ?></p>
        </div>
        <div class="rightBox" id="questions">

        </div>
            
    </body>
</html>