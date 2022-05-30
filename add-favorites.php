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

$query = $mysqli->prepare("INSERT INTO favorites(user_id, restaurant_id) VALUES(?, ?)");
$query->bind_param("ss", $user_id, $restaurant_id);
$query->execute();


$response = [];
$response["success"] = true;

$json = json_encode($response);
echo $json;

?>