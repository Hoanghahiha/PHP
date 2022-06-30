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

$sql_txt = "select * from products";
$stt =$conn ->query($sql_txt);
$list = [];
if($stt -> num_rows>0){
    while ($row = $stt ->fetch_assoc()){
        $list[] = $row;
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<div class="container-sm">
    <a href="qlsp.php">Them</a>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Price</th>
            <th scope="col">Unit </th>
            <th scope="col">Quantity</th>
            <th scope="col">Description</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>

        <?php foreach ($list as $item): ?>
            <tr>
                <td><?php echo$item["id"]; ?></td>
                <td><?php echo$item["name"]; ?></td>
                <td><?php echo$item["price"]; ?></td>
                <td><?php echo$item["unit"]; ?></td>
                <td><?php echo$item["quantity"]; ?></td>
                <td><?php echo$item["description"]; ?></td>
                <td>   <?php if ($item["status"] == 0)
                    {
                        echo ("Deactice");
                    }
                    else if ($item["status"] == 1)
                    {
                        echo ("Actice");
                    }?></td>
                <td>
                    <a href="editProduct.php?id=<?php echo $item['id']; ?>">Edit</a>
                    <a onclick="return confirm('Are you sure?')" href="deleteProduct.php ?id=<?php echo $item["id"];?>">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
</html>

