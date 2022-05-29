<?php

include("connection.php");  //establishing connection

$email = $_POST["email"];
$password = hash("sha256", $_POST["password"]);

echo $email

$query = $mysqli->prepare("Select id from users where email = ? AND password = ?");
$query->bind_param("ss", $email, $password);
$query->execute();

//$query->store_results();
$num_rows = $query->num_rows;
$query->bind_result($id);
$query->fetch();

$response = [];

if($num_rows == 0){
    $response["response"] = "User Not Found or incorrect password";
}else{
    $response["response"] = "Logged in";
    $response["user_id"] = $id;
}

$json = json_encode($response);
echo $json;

?>