<?php
include("connection.php");

if(isset($_GET["restaurant_id"])){
    $restaurant_id = $_GET["restaurant_id"];
}else{
    die("missing restaurant id");
}

$query = $mysqli->prepare("select review, first_name, last_name, picture, ratings from reviews join users on reviews.user_id = users.id where restaurant_id = ? AND is_pending = 0");
$query->bind_param("s", $restaurant_id);
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
    //$response["success"] = true;
}
$json = json_encode($response);
echo $json;
?>