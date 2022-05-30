<?php
include("connection.php");

if(isset($_POST["first_name"])){
    $first_name = $_POST["first_name"];
}else{
    die("missing first name");
}

if(isset($_POST["last_name"])){
    $last_name = $_POST["last_name"];
}else{
    die("missing restaurant id");
}

if(isset($_POST["email"])){
    $email = $_POST["email"];
}else{
    die("missing email");
}

if(isset($_POST["password"])){
    $password = hash("sha256", $_POST["password"]);
}else{
    die("missing password");
}

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

    //returning the id in response
    $query = $mysqli->prepare("select id from users where email=?");
    $query->bind_param("s",$email);
    $query->execute();

    $query->store_result();
    $query->bind_result($id);
    $query->fetch();
    $response["id"] = $id;

}

echo json_encode($response);


?>