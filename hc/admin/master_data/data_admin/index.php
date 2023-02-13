<?php

include_once('../../../class/User.php');


$user = new User;
$data_user = $user->find(2);


$admin = new User;
$data_admin = $admin->getAdmin();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Admin</title>
</head>
<body>
    <?php include('../../sidebar.php') ?>

    <div class="data_admin">
        <h3>Data Admin</h3>

        <?php
        if(isset($_GET["pesan"])){
            if($_GET["pesan"] == "hapus_sukses"){
                echo "Berhasil menghapus admin";
            }
            if($_GET["pesan"] == "hapus_gagal"){
                echo "Gagal menghapus admin";
            }
            if($_GET["pesan"] == "tambah_sukses"){
                echo "Berhasil menambah admin";
            }
            if($_GET["pesan"] == "edit_sukses"){
                echo "Berhasil mengedit admin";
            }
        }
        ?>
        <a href="tambah.php">Tambah</a>

        <table border='1'>
            <tr>
                <th>No</th>
                <th>Kode</th>
                <th>NIS</th>
                <th>Nama Lengkap</th>
                <th>Kelas</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
            <?php
                foreach($data_admin as $key => $a){
                    ?>
                        <tr>
                            <td><?= $key+1 ?></td>
                            <td><?= $a["kode"] ?></td>
                            <td><?= $a["nis"] ?></td>
                            <td><?= $a["fullname"] ?></td>
                            <td><?= $a["kelas"] ?></td>
                            <td><?= $a["alamat"] ?></td>
                            <td>
                                <a href="edit.php?id=<?= $a["id"] ?>">Edit</a>
                                <a onclick='hapus(<?= $a["id"] ?>)' href="#">Hapus</a>
                            </td>
                        </tr>
                    <?php
                }
            ?>
        </table>
    </div>
    <script>
        function hapus(id){
            let konfirmasi = confirm("Apakah anda yakin ingin menghapus user ini?");

            if(konfirmasi === true){
                window.location.href = "hapus.php?id=" + id;
            }
        }
    </script>
</body>
</html>