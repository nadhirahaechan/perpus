<?php
include_once('../class/Buku.php');


$buku = new Buku;
$data_buku = $buku->all();

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
    
    <!-- <div class="container"> -->
        <div class="row">
            <div class="col-3">
                <?php include('../sidebar.php')?>
            </div>
            
            <div class="col-9">
                <div class="buku">
                    <br><br><br><br>
                    <div class="card" style="width: 58rem; height: 30rem; border:none;">
                        <h3>Table Buku</h3>
                        <br>
                        <table border="1">
                        <tr>
                            <th>No.</th>
                            <th>Judul Buku</th>
                            <th>Pengarang</th>
                            <th>Aksi</th>
                        </tr>
                    </div>
                </div>
            </div>
        </div>
    <!-- </div> -->
        
    


            <?php
                foreach($data_buku as $key => $buku) {
                    ?>
                    <tr>
                        <td><?= $key+1 ?></td>
                        <td><?= $buku["judul"] ?></td>
                        <td><?= $buku["pengarang"] ?></td>
                        <td>
                            <a href="form_peminjaman.php?id=<?php echo $buku['id'];?>">Pinjam</a>
                        </td>
                    <?php
                }
            ?>
</body>
</html>