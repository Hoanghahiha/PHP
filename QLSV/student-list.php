<?php
require ("students.php");
$students = getAllStudents();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Danh sách sinh viên</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</head>
<body class="container">
<a href="student-add.php">THÊM</a>
<table border="1" cellspacing="0" cellpadding="10" class="table table-hover table-dark">
    <tr>
        <td>ID</td>
        <td>Fullname</td>
        <td>Birthday</td>
        <td>Action</td>
    </tr>
    <?php foreach ($students as $item){ ?>
        <tr>
            <td><?php echo $item['student_id']; ?></td>
            <td>
                <a href="student-add.php?id=<?php echo $item['student_id']; ?>"><?php echo $item['student_name']; ?></a>
            </td>
            <td><?php echo $item['student_email']; ?></td>
            <td>
                <form method="post" action="student-delete.php">
                    <input type="hidden" value="<?php echo $item['student_id']; ?>" name="student_id"/>
                    <input onclick="return confirm('Ban co chac muon xoa sinh vien nay hay khong?');" type="submit" value="Delete" name="delete"/>
                </form>
            </td>
        </tr>
    <?php } ?>
</table>
</body>
</html>
