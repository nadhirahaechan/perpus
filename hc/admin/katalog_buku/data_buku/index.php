<?php

include_once('../../../class/Buku.php');


$buku = new Buku;
$data_buku = $buku->all();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Buku</title>
</head>
<body>
    <?php include('../../sidebar.php') ?>

    <div class="data_buku">
        <h3>Data Buku</h3>

        <?php
        if(isset($_GET["pesan"])){
            if($_GET["pesan"] == "hapus_sukses"){
                echo "Berhasil menghapus buku";
            }
            if($_GET["pesan"] == "hapus_gagal"){
                echo "Gagal menghapus buku";
            }
            if($_GET["pesan"] == "tambah_sukses"){
                echo "Berhasil menambah buku";
            }
            if($_GET["pesan"] == "edit_sukses"){
                echo "Berhasil mengedit buku";
            }
        }
        ?>
        <a href="tambah.php">Tambah</a>

        <table border='1'>
            <tr>
                <th>No</th>
                <th>Judul buku</th>
                <th>Pengarang</th>
                <th>Kategori</th>
                <th>Penerbit</th>
                <th>Tahun Terbit</th>
                <th>ISBN</th>
                <th>Aksi</th>
            </tr>
            <?php
                foreach($data_buku as $key => $b){
                    ?>
                        <tr>
                            <td><?= $key+1 ?></td>
                            <td><?= $b["judul"] ?></td>
                            <td><?= $b["pengarang"] ?></td>
                            <td><?= $b["kategori"] ?></td>
                            <td><?= $b["penerbit"] ?></td>
                            <td><?= $b["tahun_terbit"] ?></td>
                            <td><?= $b["isbn"] ?></td>
                            <td>
                                <a href="edit.php?id=<?= $b["id"] ?>">Edit</a>
                                <a onclick='hapus(<?= $b["id"] ?>)' href="#">Hapus</a>
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