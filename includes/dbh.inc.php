<?php
$url = parse_url(getenv("mysql://b1bcf8fe2f24ac:625b6900@us-cdbr-iron-east-05.cleardb.net/heroku_dd8fcef5d8ead47?reconnect=true"));

$server = $url["us-cdbr-iron-east-05.cleardb.net"];
$username = $url["b1bcf8fe2f24ac"];
$password = $url["625b6900"];
$db = substr($url["heroku_dd8fcef5d8ead47"], 1);

$conn = new mysqli($server, $username, $password, $db);


if (!$conn) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

echo "Success: A proper connection to MySQL was made! The my_db database is great." . PHP_EOL;
echo "Host information: " . mysqli_get_host_info($conn) . PHP_EOL;


$sql = "SELECT * FROM easyquestions;";
echo $sql;



mysqli_close($conn);
?>



