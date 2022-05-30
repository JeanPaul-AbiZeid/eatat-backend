<?php
include("connection.php");

$user_id = $_POST["user_id"];
$restaurant_id = $_POST["restaurant_id"];
$review =  $_GET["review"];
$ratings = $_GET["ratings"];

$query = $mysqli->prepare("INSERT INTO reviews(review, ratings, user_id, restaurant_id, is_pending) VALUES(?, ?, ?, ?, 1)");
$query->bind_param("ssss", $review, $ratings, $user_id, $restaurant_id);
$query->execute();

$response = [];
$response["success"] = true;

header('Access-control-Allow-Origin:*');
$json = json_encode($response);
echo $json;

?>