<?php
include("connection.php");

$query = $mysqli->prepare("SELECT * from reviews");
// $query->bind_param("s", $restaurant_id);
$query->execute();

$array = $query->get_result();
$num_rows = $array->num_rows;

$response = [];
while($reviews = $array->fetch_assoc()){
    $response[] = $reviews;
}

header('Access-control-Allow-Origin:*');
$json = json_encode($response);
echo $json;
?>
