<?php
include("connection.php");

$restaurant_id = $_GET["restaurant_id"];

$query = $mysqli->prepare("select review, user_id from reviews where restaurant_id = ?");
$query->bind_param("s", $restaurant_id);
$query->execute();

$array = $query->get_result();
$num_rows = $array->num_rows;

$response = [];
$restaurant = $array->fetch_assoc();
$response = $restaurant;

header('Access-control-Allow-Origin:*');
$json = json_encode($response);
echo $json;
?>