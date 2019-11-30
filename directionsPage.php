<?php
    include_once 'includes/dbh.inc.php';
    session_start();
    $_SESSION['userLives'] = 3;
?>


<!DOCTYPE html>
<html>
    <head>
        <title>The Untold Journey</title>
        <link href="journeyStyle.css" rel="stylesheet"/>
    </head>
    <body>
        <h1>Before we begin....</h1>
        <div class="leftBox">
            <h2>Once upon a time,</h2>
            <p>in the land of Feldor, there lived a boy named Wembly. He was a kind-hearted child that would never hurt a fly. 
                He lived with his mother and loved to explore into the nearby forests. There were all sorts of plants and creatures
                in the forests and much to still be discovered. One day, Wembly's mother became very ill. The doctors were not
                sure what was causing her illness and were not sure how to treat her condition. With little time remaining, Wembly 
                decides to go on an adventure into the forest to hopefully find a cure. Little does he know that the forest is 
                unpredictable and dangerous at times. Without looking back, Wembly enters into the forest....
            </p>
        </div>
        <div class="rightBox">
            <h2>Instructions and Rules</h2>
            <ol>
                <li>To win the game, the player must complete all stages without losing all of his/her lives.</li>
                <li>Each stage will contain two options. The player will pick one of the options and then answer
                    a question. 
                </li>
                <li>If the player answers the question correctly, he/she will move onto the next stage. If the question
                    is answered incorrectly, then the player will lose one life.
                </li>
                <li>A player may hover the mouse over the "Tip Area" in order to view a tip for the question.</li>
                <li>ANY ANSWERS THAT ARE NOT WHOLE NUMBERS MUST BE ROUNDED TO THE NEAREST HUNDRETH!
                    DO NOT LEAVE ANY ANSWERS IN IMPROPER FRACTIONS OR MIXED NUMBERS!
                </li>
                <li>Good luck and have fun!</li>
            </ol>
        </div>
        <a href="stage1.php"><button type="button" class="directionsButton">Enter the forest here!</button></a>
    </body>
</html>