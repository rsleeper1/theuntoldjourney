<!-- The loadstage PHP files are run after the user selects one of the options on the current stage they are on.
These files are the service layer for the application. All of them are pretty much the same except for the type of 
questions that are produced and the text that is displayed when a player gets a question right or wrong. These 
files needed to be separate from one another though because there is enough of a difference between the questions and alert descriptions. -->

<?php
    include_once 'includes/dbh.inc.php';
    session_start();
?>

<!DOCTYPE html>
<html>  
    <body>
        <p>To advance, you must answer the following question correctly!</p>
        <!-- The alert functions display an alert when the user submits an answer to the question. It then will direct
        the user to the proper screen depending on if the user got the question right or wrong. -->
        <?php
            function goodAlert($message) {
                echo "<script type='text/javascript'>alert('$message');location='stage2.php';</script>";
            }

            function badAlert($message) {
                echo "<script type='text/javascript'>alert('$message');location='stage1.php';</script>";
            }

            function gameOver($message) {
                echo "<script type='text/javascript'>alert('$message');location='titlePage.php';</script>";
            }
 

            //This query pulls a question from the database and then displays it on the user interface.
            $sql = "SELECT * FROM easyquestions, tips WHERE easyquestions.Tip_ID = tips.Tip_ID AND E_Question_ID=1;";
            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);
            if ($resultCheck > 0) {
                while ($row = mysqli_fetch_assoc($result)){
                    echo $row['E_Question'] . "<br>";
                    $questionTip = $row['Tip'];
                    $answer = $row['E_Answer'];
                }
            }

            //Security precautions on user input.
            if ($_SERVER["REQUEST_METHOD"] == "post"){
                $finalAnswer = secureInput($_POST["finalAnswer"]);
            }            

            function secureInput($input){
                $input = trim($input);
                $input = stripslashes($input);
                $input = htmlspecialchars($input);
                return $input;
            }

            //Takes the user's answer and checks to see if it was right or wrong.
            if (!isset($_POST["finalAnswer"])){

            } elseif ($_POST['finalAnswer'] == $answer) {
                goodAlert("Good job! You can move on to the next stage!");
            } else {
                $_SESSION['userLives'] = $_SESSION['userLives'] - 1;
                if ($_SESSION['userLives'] == 0){
                    gameOver("Oh no, you ran out of lives. Wembly must return to the hospital with out a cure. Please play again!");
                }
                badAlert("Oh no, you did not answer the question correctly. You must begin the stage all over!");
            }

        ?>
        <!-- This form is used for the user to submit his/her answer. -->
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
            <p><label for="finalAnswer">Answer:</label>
            <input type="int" id="finalAnswer" name="finalAnswer"/><br>
            <input type="submit" value="Submit"/>
            </p>
        </form>
        <!-- This area provides a tip to the user that corresponds with the question given. -->
        <div class="tipArea">
            <p>Tip Area</p>
            <button type="button" class="tipButton" id="tipButton"><?php echo $questionTip; ?></button> 
        </div>
    </body>
</html>