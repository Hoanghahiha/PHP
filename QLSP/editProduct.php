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

$sql_txt = "select * from products where id = ".$_GET["id"];
$stt =$conn ->query($sql_txt);
$product = null;
if($stt -> num_rows>0){
    while ($row = $stt ->fetch_assoc()){
        $product = $row;
    }
}
if ($product == null){
    die("Product not found");
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>FormSV</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</head>
<body class="container-sm">
<form action="updateProduct.php?id=<?php echo $product["id"];?>" method="post" style="margin: 10px">
    <div class="form-group" style="margin: 5px">
        <label>Name</label>
        <input required type="text" name="name" value="<?php echo $product["name"];?>">
    </div>
    <div class="form-group" style="margin: 5px">
        <label>Price</label>
        <input required type="number" name="price" value="<?php echo $product["price"];?>">
    </div>
    <div class="form-group" style="margin: 5px">
        <label>Unit</label>
        <input required type="text" name="unit" value="<?php echo $product["unit"];?>">
    </div>
    <div class="form-group" style="margin: 5px">
        <label>Quantity</label>
        <input required type="number" name="quantity" value="<?php echo $product["quantity"];?>">
    </div>
    <div class="form-group" style="margin: 5px">
        <label>Description</label>
        <input required type="text" name="description" value="<?php echo $product["description"];?>">
    </div>
    <div class="form-group">
        <p>Status: </p>
        <input type="radio" id="deactice" name="status" value="0"
            <?php if (($product["status"])==0)
            {
                echo "checked='checked'";
            }
            ?>
        >
        <label>Deactice</label>
        <input  type="radio" id="actice" name="status" value="1"
            <?php if (($product["status"])==1)
            {
                echo "checked='checked'";
            }
            ?>
        >
        <label>Actice</label><br>
    </div>
    <div class="form-group" style="margin: 5px">
        <button type="submit">Submit</button>
    </div>
</form>
</body>
</html>