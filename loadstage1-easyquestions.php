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
                echo "<script type='text/javascript'>alert('$message');location='stage2.php';</script>";
            }

            function badAlert($message) {
                echo "<script type='text/javascript'>alert('$message');location='stage1.php';</script>";
            }

            function gameOver($message) {
                echo "<script type='text/javascript'>alert('$message');location='titlePage.php';</script>";
            }

            function getTip(){
                $sql = "SELECT * FROM tips WHERE Tip_ID=3;";
                $tipresult = mysqli_query($conn, $sql);
                $tipresultCheck = mysqli_num_rows($tipresult);
                if ($tipresultCheck > 0) {
                    while ($row = mysqli_fetch_assoc($tipresult)){
                        echo $row['Tip'] . "<br>";
                    }
                }
            }

            $sql = "SELECT * FROM easyquestions WHERE E_Question_ID=1;";
            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);
            if ($resultCheck > 0) {
                while ($row = mysqli_fetch_assoc($result)){
                    echo $row['E_Question'] . "<br>";
                    $answer = $row['E_Answer'];
                }
            }
            if (!isset($_POST["finalAnswer"])) {
                
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
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
            <p><label for="finalAnswer">Answer:</label>
            <input type="int" id="finalAnswer" name="finalAnswer"/><br>
            <input type="submit" value="Submit"/>
            </p>
        </form>
        <button type='button' onclick="getTip()">Tip</button>
    </body>
</html>