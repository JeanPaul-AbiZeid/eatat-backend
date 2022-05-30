<?php
include("connection.php");

$user_id = $_POST["user_id"];
$restaurant_id = $_POST["restaurant_id"];
$review =  $_POST["review"];
$ratings = $_POST["ratings"];

$query = $mysqli->prepare("INSERT INTO reviews(review, ratings, user_id, restaurant_id, is_pending) VALUES(?, ?, ?, ?, 1)");
$query->bind_param("ssss", $review, $ratings, $user_id, $restaurant_id);
$query->execute();

$response = [];
$response["success"] = true;

$json = json_encode($response);
echo $json;

?>