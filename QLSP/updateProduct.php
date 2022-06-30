<?php
$id = $_GET["id"];
if (!$_POST["name"]){
    header("editProduct.php?id=".$id);
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

$sql_txt = "UPDATE products set name=?, price=?, unit=?, quantity=?, description=?, status=? where id=?";
$stt = $conn ->prepare($sql_txt);
$stt -> bind_param("sisisii",$name,$price,$unit,$quantity,$description,$status,$sid);

//set params and execute
$name = $_POST["name"];
$price = $_POST["price"];
$unit = $_POST["unit"];
$quantity = $_POST["quantity"];
$description = $_POST["description"];
$status = $_POST["status"];
$sid = $id;
$stt -> execute();

header("Location:listSp.php");