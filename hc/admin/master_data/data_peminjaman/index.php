<?php

include_once('../../../class/Peminjaman.php');
include_once('../../../class/User.php');

$user = new User;
$data_user=$user->find(2);

$peminjaman = new Peminjaman;
$data_peminjaman = $peminjaman->all();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Peminjaman</title>
</head>
<body>
    <?php include('../../sidebar.php') ?>

    <div class="data_peminjaman">
        <h3>Data Peminjaman</h3>

        <?php
        if(isset($_GET["pesan"])){
            if($_GET["pesan"] == "hapus_sukses"){
                echo "Berhasil menghapus user";
            }
            if($_GET["pesan"] == "hapus_gagal"){
                echo "Gagal menghapus user";
            }
        }
        ?>
        
        <table border="1">
            <tr>
                <th>No.</th>
                <th>Nama Anggota</th>
                <th>Judul Buku</th>
                <th>Tanggal Peminjaman</th>
                <th>Kondisi Buku Saat Dipinjam</th>
                <th>Aksi</th>
            </tr>
            <?php
                foreach($data_peminjaman as $key => $a){
                    ?>
                        <tr>
                            <td><?= $key+1 ?></td>
                            <td><?= $a["peminjam"] ?></td>
                            <td><?= $a["buku"] ?></td>
                            <td><?= $a["tanggal_peminjaman"] ?></td>
                            <td><?= $a["kondisi_bukusblm"] ?></td>
                            <td>
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