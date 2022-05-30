<?php
include("connection.php");
if(isset($_POST["user_id"])){
    $user_id = $_POST["user_id"];
}else{
    die("missing user id");
}

if(isset($_POST["restaurant_id"])){
    $restaurant_id = $_POST["restaurant_id"];
}else{
    die("missing restaurant id");
}

if(isset($_POST["review"])){
    $review =  $_POST["review"];
}else{
    die("missing review");
}

if(isset($_POST["ratings"])){
    $ratings = $_POST["ratings"];
}else{
    die("missing ratings");
}

$query = $mysqli->prepare("INSERT INTO reviews(review, ratings, user_id, restaurant_id, is_pending) VALUES(?, ?, ?, ?, 1)");
$query->bind_param("ssss", $review, $ratings, $user_id, $restaurant_id);
$query->execute();

$response = [];
$response["success"] = true;

$json = json_encode($response);
echo $json;

?>