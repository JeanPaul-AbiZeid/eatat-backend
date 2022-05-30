<?php
include("connection.php");

$query = $mysqli->prepare("SELECT id, first_name, last_name email from users");
$query->execute();

$array = $query->get_result();
$response = [];

while($users = $array->fetch_assoc()){
    $response[] = $users;
}

$json = json_encode($response);
echo $json;

?>