<?php
include("connection.php");

$user_id = $_GET["user_id"];

$query = $mysqli->prepare("select * from restaurants join favorites on favorites.restaurant_id = restaurants.id where favorites.user_id = ?");
$query->bind_param("s", $user_id);
$query->execute();

$array = $query->get_result();
$num_rows = $array->num_rows;

$result = [];
?>