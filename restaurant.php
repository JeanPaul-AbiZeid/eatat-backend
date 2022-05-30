<?php
include("connection.php");

if(isset($_GET["id"])){
    $id = $_GET["id"];
}else{
    die("missing restaurant id");
}

$query = $mysqli->prepare("select * from restaurants where id = ?");
$query->bind_param("s", $id);
$query->execute();

$array = $query->get_result();
$response = [];

$restaurant = $array->fetch_assoc();
$response = $restaurant;

$json = json_encode($response);
echo $json;

?>