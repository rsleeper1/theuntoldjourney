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
                $("button").click(function(){
                    $("#questions").load("load-questions.php");
                });
            });
        </script>
    </head>
    <body>
        <h1>Stage 2</h1>
        <div class="leftBox">
            <p>After traveling into the forest for about an hour, Wembly comes across a split in the path.
                Which way should Wembly go?
            </p>
            <button type="button" class="option1">Let's go to the left!</button>
            <button type="button" class="option2">Let's go to the right!</button>
        </div>
        <div class="rightBox" id="questions">

        </div>
            
    </body>
</html>