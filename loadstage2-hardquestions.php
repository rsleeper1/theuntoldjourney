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
                echo "<script type='text/javascript'>alert('$message');location='stage3.php';</script>";
            }

            function badAlert($message) {
                echo "<script type='text/javascript'>alert('$message');location='stage2.php';</script>";
            }

            $sql = "SELECT * FROM hardquestions WHERE H_Question_ID=2;";
            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);
            if ($resultCheck > 0) {
                while ($row = mysqli_fetch_assoc($result)){
                    echo $row['H_Question'] . "<br>";
                    $answer = $row['H_Answer'];
                }
            }
            if (!isset($_POST["finalAnswer"])) {
                
            } elseif ($_POST['finalAnswer'] == $answer) {
                goodAlert("Good job! You snuck by the evil troll!");
            } else {
                badAlert("Oh no, you got caught by the evil troll! You must begin the stage all over!");
            }
        ?>
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
            <p><label for="finalAnswer">Answer:</label><br>
            <input type="float" id="finalAnswer" name="finalAnswer"/>
            <input type="submit" value="Submit"/>
            </p>
        </form>
    </body>
</html>