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

$response = [];

if ($num_rows > 0) {
    $response["response"] = "Restaurant already exists";
}else{
    $query = $mysqli->prepare("INSERT INTO restaurants(name, description, image, avg_cost, location, category) VALUES(?, ?, ?, ?, ?, ?)");
    $query->bind_param("ssssss", $name, $description, $image, $average_price, $location, $category);
    $query->execute();

    $response["success"] = true;
}


header('Access-control-Allow-Origin:*');
$json = json_encode($response);
echo $json;
?>