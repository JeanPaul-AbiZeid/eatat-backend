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

$query = $mysqli->prepare("select * from favorites where user_id = ? and restaurant_id = ?");
$query->bind_param("ss", $user_id, $restaurant_id);
$query->execute();


$array = $query->get_result();
$num_rows = $array->num_rows;

$response = [];

if ($num_rows == 0) {
    $query = $mysqli->prepare("INSERT INTO favorites(user_id, restaurant_id) VALUES(?, ?)");
    $query->bind_param("ss", $user_id, $restaurant_id);
    $query->execute();
    $response["response"] = "added to favorites";
}else{
    $response["response"] = "already a favorite";
}

$json = json_encode($response);
echo $json;

?>