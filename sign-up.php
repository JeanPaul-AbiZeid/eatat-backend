<?php

include("connection.php");

$first_name = $_POST["first-name"];
$last_name = $_POST["last-name"];
$email = $_POST["email"];
$password = hash("sha256", $_POST["pass"]);

$query = $mysqli->prepare("INSERT INTO users(first_name, last_name, email, password) VALUES (?, ?, ?, ?)");
$query->bind_params("ssii", $first_name, $last_name,$email,$password); //this line helps avoid sql injections from hackers
$query->execute();

$response = [];
$response["success"] = true;

echo json_encode($response);

?>