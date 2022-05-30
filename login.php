<?php

include("connection.php");  //establishing connection

if(isset($_POST["email"])){
    $email = $_POST["email"];
}else{
    die("missing user id");
}

if(isset($_POST["password"])){
    $password = hash("sha256", $_POST["password"]);
}else{
    die("missing user id");
}

$query = $mysqli->prepare("Select id, type from users where email = ? AND password = ?");
$query->bind_param("ss", $email, $password);
$query->execute();

$query->store_result();
$num_rows = $query->num_rows;
$query->bind_result($id, $type);
$query->fetch();

$response = [];

if($num_rows == 0){
    $response["response"] = "User Not Found or incorrect password";
    $response["success"]  = false;
}else{
    $response["response"] = "Logged in";
    $response["user_id"] = $id;
    $response["type"] = $type;
    $response["success"]  = true;
}

$json = json_encode($response);
echo $json;

?>