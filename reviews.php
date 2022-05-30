<?php
include("connection.php");

$query = $mysqli->prepare("SELECT first_name, last_name, picture, review, ratings, name, is_pending from reviews join users on users.id = reviews.user_id join restaurants on restaurants.id = reviews.restaurant_id");
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
