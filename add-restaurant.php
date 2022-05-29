<?php
include("connection.php");

$name = $_POST["name"];
$description =$_POST["description"];
$image = $_POST["image"];
$average_price = $_POST["avg_cost"];
$location = $_POST["location"];
$category = $_POST["category"];

$query = $mysqli->prepare("select name from restaurants where name = ?");
$query->bind_param("s", $name);
$query->execute();

$query->store_result();
$num_rows = $query->num_rows;
?>