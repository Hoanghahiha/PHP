<?php
if (!$_POST["name"]){
    header("Location:qlsp.php");
}
$serverName = "localhost";
$userName = "root";
$password = "";
$dbName = "T2108M";

//connect db
$conn = new mysqli($serverName,$userName,$password,$dbName);
if ($conn -> connect_error){
    die($conn ->connect_error);
}
//echo "Connect Successful";

$sql_txt = "insert into products(name,price,unit,quantity,description,status) values (?,?,?,?,?,?)";
$stt = $conn ->prepare($sql_txt);
$stt -> bind_param("sisisi",$name,$price,$unit,$quantity,$description,$status);

//set params and execute
$name = $_POST["name"];
$price = $_POST["price"];
$unit = $_POST["unit"];
$quantity = $_POST["quantity"];
$description = $_POST["description"];
$status = $_POST["status"];
$stt -> execute();

header("Location:listSp.php");