<?php
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

$sql_txt = "delete from products where id=".$_GET["id"];
$stt = $conn ->prepare($sql_txt);
$stt -> execute();

header("Location:listSp.php");