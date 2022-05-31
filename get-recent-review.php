<?php
include("connection.php");

if(isset($_GET["id"])){
    $id = $_GET["id"];
}else{
    die("missing user id");
}
$query = $mysqli->prepare("SELECT review, ratings, name from reviews join users on users.id = reviews.user_id join restaurants on restaurants.id = reviews.restaurant_id where is_pending = 0");
$query->execute();

$array = $query->get_result();
$num_rows = $array->num_rows;

$response = [];

if ($num_rows == 0) {
    $response["response"] = "No Reviews Yet";
}else{
    while($reviews = $array->fetch_assoc()){
        $response[] = $reviews;
    }
    $response["success"] = true;
}

$json = json_encode($response);
echo $json;
?>