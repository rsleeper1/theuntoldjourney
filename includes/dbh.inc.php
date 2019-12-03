<?php
$url = parse_url(getenv("mysql://b1bcf8fe2f24ac:625b6900@us-cdbr-iron-east-05.cleardb.net/heroku_dd8fcef5d8ead47?reconnect=true"));

$server = $url["us-cdbr-iron-east-05.cleardb.net"];
$username = $url["b1bcf8fe2f24ac"];
$password = $url["625b6900"];
$db = substr($url["heroku_dd8fcef5d8ead47"], 1);

$conn = new mysqli($server, $username, $password, $db);
?>

