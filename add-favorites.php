<?php
include("connection.php");

$user_id = $_POST["user_id"];
$restaurant_id = $_POST["restaurant_id"];

$query = $mysqli->prepare("INSERT INTO favorites VALUES(?, ?)");
$query->bind_param("ss", $user_id, $restaurant_id);
$query->execute();


$response = [];
$response["success"] = true;

header('Access-control-Allow-Origin:*');
$json = json_encode($response);
echo $json;

?>