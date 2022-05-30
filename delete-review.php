<?php
include("connection.php");

$user_id = $_POST["user_id"];
$restaurant_id = $_POST["restaurant_id"];

$query = $mysqli->prepare("delete from reviews where user_id = ? AND restaurant_id = ?");
$query->bind_param("ss", $user_id, $restaurant_id);
$query->execute();

$response = [];
$response["success"] = true;

$json = json_encode($response);
echo $json;

?>