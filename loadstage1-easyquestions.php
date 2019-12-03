<?php
    include_once 'includes/dbh.inc.php';
    session_start();
?>

<!DOCTYPE html>
<html>  
    <body>
        <p>To advance, you must answer the following question correctly!</p>
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
 


            $sql = "SELECT * FROM heroku_dd8fcef5d8ead47.easyquestions, heroku_dd8fcef5d8ead47.tips WHERE heroku_dd8fcef5d8ead47.easyquestions.Tip_ID = heroku_dd8fcef5d8ead47.tips.Tip_ID AND heroku_dd8fcef5d8ead47.E_Question_ID=1;";
            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);
            if ($resultCheck > 0) {
                while ($row = mysqli_fetch_assoc($result)){
                    echo $row['E_Question'] . "<br>";
                    $questionTip = $row['Tip'];
                    $answer = $row['E_Answer'];
                }
            }


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

            $conn = null;
        ?>
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
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