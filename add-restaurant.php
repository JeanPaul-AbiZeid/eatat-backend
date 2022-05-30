<?php
include("connection.php");

if(isset($_POST["name"])){
    $name = $_POST["name"];
}else{
    die("missing name");
}

if(isset($_POST["description"])){
    $description =$_POST["description"];
}else{
    die("missing description");
}

if(isset($_POST["image"])){
    $image = $_POST["image"];
}else{
    die("missing image");
}

if(isset($_POST["avg_cost"])){
    $average_price = $_POST["avg_cost"];
}else{
    die("missing average price");
}

if(isset($_POST["location"])){
    $location = $_POST["location"];
}else{
    die("missing location");
}

if(isset($_POST["category"])){
    $category = $_POST["category"];
}else{
    die("missing category");
}


$query = $mysqli->prepare("select name from restaurants where name = ?");
$query->bind_param("s", $name);
$query->execute();

$query->store_result();
$num_rows = $query->num_rows;

$response = [];

if ($num_rows > 0) {
    $response["response"] = "Restaurant already exists";
}else{
    $query = $mysqli->prepare("INSERT INTO restaurants(name, description, image, avg_cost, location, category) VALUES(?, ?, ?, ?, ?, ?)");
    $query->bind_param("ssssss", $name, $description, $image, $average_price, $location, $category);
    $query->execute();

    $response["success"] = true;
}


$json = json_encode($response);
echo $json;
?>