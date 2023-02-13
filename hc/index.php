<?php

if(isset($_POST["submit"])){
    $foto = $_FILES["foto"];
    
    $target_file = 'images/' .date("YmdHis") .basename($foto["name"]);
    move_uploaded_file($foto["tmp_name"], $target_file);

$db = mysqli_connect("localhost","root","","perpusndrr");
$result = $db->query("UPDATE user SET foto='$target_file'");

var_dump($result);

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST" action="" enctype="multipart/form-data">
        <input type="file" name="foto">
        <button type="submit" name="submit">Upload</button>
    </form>
</body>
</html>