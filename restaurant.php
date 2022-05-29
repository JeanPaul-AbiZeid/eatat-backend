<?php
include("connection.php");

$id = $_GET["id"];

$query = $mysqli->prepare("select * from restaurants where id = ?");
$query->bind_param("s", $id);
$query->execute();

$array = $query->get_result();
$response = [];

$restaurant = $array->fetch_assoc();
$response = $restaurant;

header('Access-control-Allow-Origin:*');
$json = json_encode($response);
echo $json;

?>