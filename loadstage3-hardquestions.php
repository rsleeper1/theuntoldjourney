<!-- Refer to loadstage1-easyquestions.php for comments on functionality of this page. There may have been a way
to reduce redundancy, however I ran out of time due to some technical difficulties. The only difference between
the loadstage PHP files are the type of questions and alert descriptions. --> 

<?php
    include_once 'includes/dbh.inc.php';
    session_start();
?>

<!DOCTYPE html>
<html>
    <head></head>
    <body>
        <p>To advance, you must answer the following question correctly!</p>
        <?php
            function goodAlert($message) {
                echo "<script type='text/javascript'>alert('$message');location='stage4.php';</script>";
            }

            function badAlert($message) {
                echo "<script type='text/javascript'>alert('$message');location='stage3.php';</script>";
            }

            function gameOver($message) {
                echo "<script type='text/javascript'>alert('$message');location='titlePage.php';</script>";
            }

            $sql = "SELECT * FROM hardquestions, tips WHERE hardquestions.Tip_ID = tips.Tip_ID AND H_Question_ID=3;";
            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);
            if ($resultCheck > 0) {
                while ($row = mysqli_fetch_assoc($result)){
                    echo $row['H_Question'] . "<br>";
                    $questionTip = $row['Tip'];
                    $answer = $row['H_Answer'];
                }
            }

            if ($_SERVER["REQUEST_METHOD"] == "post"){
                $finalAnswer = secureInput($_POST["finalAnswer"]);
            }            

            function secureInput($input){
                $input = trim($input);
                $input = stripslashes($input);
                $input = htmlspecialchars($input);
                return $input;
            }

            if (!isset($_POST["finalAnswer"])) {
                
            } elseif ($_POST['finalAnswer'] == $answer) {
                goodAlert("Good job! You chose the correct berry to eat!");
            } else {
                $_SESSION['userLives'] = $_SESSION['userLives'] - 1;
                if ($_SESSION['userLives'] == 0){
                    gameOver("Oh no, you ran out of lives. Wembly must return to the hospital with out a cure. Please play again!");
                }
                badAlert("Oh no, you ate a poisonous berry. You must begin the stage all over!");
            }
        ?>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
            <p><label for="finalAnswer">Answer:</label>
            <input type="int" id="finalAnswer" name="finalAnswer"/><br>
            <input type="submit" value="Submit"/>
            </p>
        </form>
        <div class="tipArea">
            <p>Tip Area</p>
            <button type="button" class="tipButton" id="tipButton"><?php echo $questionTip; ?></button> 
        </div>
    </body>
</html>