<?php
include("connection.php");


if(isset($_GET["user_id"])){
    $user_id = $_GET["user_id"];
}else{
    die("missing user id");
}

$query = $mysqli->prepare("delete from users where id = ?");
$query->bind_param("s", $user_id);
$query->execute();

$response = [];
$response["success"] = true;

$json = json_encode($response);
echo $json;

?>