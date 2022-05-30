<?php
header('Access-Control-Allow-Origin: *');
include("connection.php");
$query = $mysqli->prepare("SELECT * from restaurants");
$query->execute();

$array = $query->get_result();
$response = [];

while($restaurant = $array->fetch_assoc()){
    $response[] = $restaurant;
}
header('Access-control-Allow-Origin:*');
$json = json_encode($response);
echo $json;

?>