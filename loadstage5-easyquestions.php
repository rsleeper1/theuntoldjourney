<?php
    include_once 'includes/dbh.inc.php';
?>

<!DOCTYPE html>
<html>
    <head></head>
    <body>
        <p>To advance, you must answer the following question correctly!</p>
        <?php
            function goodAlert($message) {
                echo "<script type='text/javascript'>alert('$message');location='stage6.php';</script>";
            }

            function badAlert($message) {
                echo "<script type='text/javascript'>alert('$message');location='stage5.php';</script>";
            }

            $sql = "SELECT * FROM easyquestions WHERE E_Question_ID=5;";
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
                goodAlert("Good job! You picked the correct flower and saved Wembly's mom!");
            } else {
                badAlert("Oh no, you picked the wrong flower. You must begin the stage all over!");
            }
        ?>
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
            <p><label for="finalAnswer">Answer:</label><br>
            <input type="int" id="finalAnswer" name="finalAnswer"/>
            <input type="submit" value="Submit"/>
            </p>
        </form>
    </body>
</html>