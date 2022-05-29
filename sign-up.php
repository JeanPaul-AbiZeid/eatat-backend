<?php
header('Access-Control-Allow-Origin: *'); //this removes the error 
include("connection.php");

$first_name = $_POST["first-name"];
$last_name = $_POST["last-name"];
$email = $_POST["email"];
$password = hash("sha256", $_POST["password"]);

$query = $mysqli->prepare("select email from users where email=?");
$query->bind_param("s",$email);
$query->execute();

$query->store_result();
$rows = $query->num_rows;

$response = [];

if($rows >0){
    $response["response"] = "Email already exists";
    $response["success"] = false;
}else{
    $query = $mysqli->prepare("INSERT INTO users(first_name, last_name, email, password,type) VALUES (?, ?, ?, ?, 1)");
    $query->bind_param("ssss", $first_name, $last_name,$email,$password); //this line helps avoid sql injections from hackers
    $query->execute();
    $response["success"] = true;
}

echo json_encode($response);


?>