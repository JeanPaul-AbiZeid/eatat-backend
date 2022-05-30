<?php
include("connection.php");

$user_id = $_POST["user_id"];
$restaurant_id = $_POST["restaurant_id"];

$query = $mysqli->prepare("INSERT INTO favorites(user_id, restaurant_id) VALUES(?, ?)");
$query->bind_param("ss", $user_id, $restaurant_id);
$query->execute();


$response = [];
$response["success"] = true;

$json = json_encode($response);
echo $json;

?>