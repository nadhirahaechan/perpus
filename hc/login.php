<?php
$data_user = new User;
if(isset($_SESSION["id"])){
    $data_user = $data_user->find($_SESSION["id"]);
    if($data_user["role"] == "admin"){
        header("Location : admin/index.php");
    }elseif($data_user["role"] == "user"){
        header("Location: user/index.php");
    }
}


$login = new Login;

if(isset($_POST["submit"])){
    $login->authLogin([
            "username" => $_POST["username"],
            "password" => $_POST["password"]
        ]);
}
?>