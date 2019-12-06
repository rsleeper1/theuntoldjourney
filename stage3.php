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
                    $("#questions").load("loadstage3-easyquestions.php");
                    $("#option1").hide();
                });
                $("#option1").click(function(){
                    $("#questions").load("loadstage3-hardquestions.php");
                    $("#option2").hide();
                });
            });
        </script>
    </head>
    <body>
        <h1>Stage 3</h1>
        <div class="leftBox">
            <p>After walking into the forest for a few hours, Wembly starts to get a little hungry. He comes 
            across some bushes with berries on them. There are two different kinds of berries on the bushes, red or black. 
            Which should Wembly eat?
            </p>
            <button type="button" class="option1" id="option1">Eat the red berry.</button>
            <button type="button" class="option2" id="option2">Eat the black berry.</button>
            <br>
            <p id='lives'>Number of Lives: <?php echo $_SESSION['userLives']; ?></p>
        </div>
        <div class="rightBox" id="questions">

        </div>
            
    </body>
</html>