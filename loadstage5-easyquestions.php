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
                echo "<script type='text/javascript'>alert('$message');location='winner.php';</script>";
            }

            function badAlert($message) {
                echo "<script type='text/javascript'>alert('$message');location='stage5.php';</script>";
            }

            function gameOver($message) {
                echo "<script type='text/javascript'>alert('$message');location='titlePage.php';</script>";
            }

            $sql = "SELECT * FROM easyquestions, tips WHERE easyquestions.Tip_ID = tips.Tip_ID AND E_Question_ID=5;";
            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);
            if ($resultCheck > 0) {
                while ($row = mysqli_fetch_assoc($result)){
                    echo $row['E_Question'] . "<br>";
                    $questionTip = $row['Tip'];
                    $answer = $row['E_Answer'];
                }
            }
            if (!isset($_POST["finalAnswer"])) {
                
            } elseif ($_POST['finalAnswer'] == $answer) {
                goodAlert("Good job! You picked the correct flower!");
            } else {
                $_SESSION['userLives'] = $_SESSION['userLives'] - 1;
                if ($_SESSION['userLives'] == 0){
                    gameOver("Oh no, you ran out of lives. Wembly must return to the hospital with out a cure. Please play again!");
                }
                badAlert("Oh no, you picked the wrong flower. You must begin the stage all over!");
            }
        ?>
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
            <p><label for="finalAnswer">Answer:</label>
            <input type="float" id="finalAnswer" name="finalAnswer"/><br>
            <input type="submit" value="Submit"/>
            </p>
        </form>
        <div class="tipArea">
            <p>Tip Area</p>
            <button type="button" class="tipButton" id="tipButton"><?php echo $questionTip; ?></button> 
        </div>
    </body>
</html>