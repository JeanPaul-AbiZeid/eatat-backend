<?php
include("connection.php");

$restaurant_id = $_GET["restaurant_id"];

$query = $mysqli->prepare("select avg(ratings) from reviews where restaurant_id = ?");
$query->bind_param("s", $restaurant_id);
$query->execute();

$array = $query->get_result();
$num_rows = $array->num_rows;

$response = [];
$restaurant = $array->fetch_assoc();
$response = $restaurant;

$json = json_encode($response);
echo $json;
?>