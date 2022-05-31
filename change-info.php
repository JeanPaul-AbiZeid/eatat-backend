<?php
include("connection.php");

$id = $_POST["id"];
$first_name = $_POST["first_name"];
$last_name = $_POST["last_name"];

$query = $mysqli->prepare("update users set first_name = ?, last_name = ? where id = ?");
$query->bind_param("sss", $first_name, $last_name, $id);
$query->execute();

$response = [];
$response["success"] = true;

$json = json_encode($response);
echo $json;

?>