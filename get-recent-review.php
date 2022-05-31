<?php
include("connection.php");

if(isset($_GET["id"])){
    $id = $_GET["id"];
}else{
    die("missing user id");
}
$query = $mysqli->prepare("SELECT first_name, last_name, picture, review, ratings, name from reviews join users on users.id = reviews.user_id join restaurants on restaurants.id = reviews.restaurant_id");
$query->execute();

$array = $query->get_result();
$num_rows = $array->num_rows;

$response = [];
while($reviews = $array->fetch_assoc()){
    $response[] = $reviews;
}

$json = json_encode($response);
echo $json;
?>