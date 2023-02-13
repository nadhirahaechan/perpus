<?php
include_once('../class/User.php');

$user= new User;
$data_user=$user->find(1);

// if(isset($_POST["submit"])){
//     $foto = $_FILES["foto"];
    
//     $target_file = 'images/' .date("YmdHis") .basename($foto["name"]);
//     move_uploaded_file($foto["tmp_name"], $target_file);
// }

if(isset($_POST["submit"])){
    $data = [
        "user_id" => $_POST["user_id"],
        "fullname" => $_POST["fullname"],
        "username" => $_POST["username"],
        "password" => password_hash($_POST["password"], PASSWORD_DEFAULT),
        "kelas" => $_POST["kelas"],
        "alamat" => $_POST["alamat"],
        $foto = $_FILES["foto"],
     ];

    $simpan=$user->update($_POST["user_id"], $data);
   
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Saya</title>
</head>
<body>
    <div class="row">
        <div class="col-3">
            <?php include('../sidebar.php') ?>
        </div>
    <div class="col-9">
    <div class="profil">
        <br><br>
        <form method="POST" action="" enctype="multipart/form-data">
            <table border="1">
                <input type="hidden" name="user_id" value="<?= $data_user["id"] ?>">
                <tr>
                    <th>Foto</th>
                    <td>
                        <input type="file" name="foto">
                    </td>
                </tr>
                <tr>
                    <th>Nama Lengkap</th>
                    <td>
                        <input type="text" name="fullname" value="<?= $data_user["fullname"] ?>">
                    </td>
                </tr>
                <tr>
                    <th>Username</th>
                    <td>
                        <input type="text" name="username" value="<?= $data_user["username"] ?>">
                    </td>
                </tr>
                <tr>
                    <th>Password</th>
                    <td>
                        <input type="password" name="password" value="" placeholder="Password belum diubah">
                    </td>
                </tr>

                <tr>
                    <th>Kelas</th>
                    <td>
                        <input type="text" name="kelas" value="<?= $data_user["kelas"] ?>">
                    </td>
                </tr>
                <tr>
                    <th>Alamat</th>
                    <td>
                        <textarea name="alamat"><?= $data_user["alamat"] ?></textarea>
                    </td>
                </tr>
            </table>

            <button type="submit" name="submit">SIMPAN</button>
        </form>
    </div>
    </div>
</body>
</html>