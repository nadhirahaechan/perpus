<?php
$buku="";
if(isset($_GET['id_buku'])){
    $buku=$_GET['id_buku'];

   header("location:peminjaman.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Perpustakaan</title>
</head>
<body>
<div class="container">
<br><br>
<div class="card">
<form action="proses.php?aksi=tambah" method="post" class="row g-3">
  <div class="col-12">
    <label for="inputiduser" class="form-label">ID User</label>
    <input type="text" name="id_user" class="form-control">
  </div>
  <div class="col-12">
    <label for="inputidbuku" class="form-label">ID Buku</label>
    <input type="text" value="<?php echo $buku; ?>" name="id_buku" class="form-control">
  </div>
  <div class="col-12">
    <label for="inputtanggalpeminjaman" class="form-label">Tanggal Peminjaman</label>
    <input type="date" name="tanggal_peminjaman" class="form-control">
  </div>
  <div class="col-12">
    <label for="inputkondisi" class="form-label">Kondisi Buku Saat Dipinjam</label>
    <select name="kondisi_bukusblm">
        <option value="baik">Baik</option>
        <option value="rusak">Rusak</option>
    </select>
  </div>
  <div class="col-12">
    <button type="submit" id="simpan" class="btn btn-primary">Simpan</button>
  </div>
</form>
</div>
</div>
</body>
</html>