<?php
include_once('../class/Buku.php');
include_once('../class/Peminjaman.php');

$buku = new Buku;
$data_buku = $buku->all();

$peminjaman = new Peminjaman;
$data_peminjaman = $peminjaman->getPeminjaman();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard User</title>
</head>
<body>
    
    <div class="row">
        <div class="col-3">
            <?php include('../sidebar.php') ?>
        </div>
        <div class="col-9">
            <div class="peminjaman"> 
            <br><br><br><br>
                 <div class="card" style="width: 58rem; height: 30rem; border:none;">
                    <h3>Table Peminjaman</h3>
                    <br>
                    <table border="1">
                    <tr>
                        <th>No.</th>
                        <th>Judul Buku</th> 
                        <th>Tanggal Peminjaman</th>
                        <th>Kondisi Buku Saat Dipinjam</th>
                        <th>Aksi</th>
                    </tr>
                </div>
            </div>
        </div>
    </div>
    
            <?php
                foreach($data_peminjaman as $key => $p) {
                    ?>
                    <tr>
                        <td><?= $key+1 ?></td>
                        <td><?= $p["buku"] ?></td>
                        <td><?= $p["tanggal_peminjaman"] ?></td>
                        <td><?= $p["kondisi_bukusblm"] ?></td>
                        <td>
                            <a href="form_pengembalian.php?id=<?php echo $p['id'];?>">Pengembalian</a>
                        </td>
                    </tr>
                    <?php
                }
            ?>
</body>
</html>