<?php
$p="";
if(isset($_GET['id'])){
    $p=$_GET['id'];
}




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<div class="container">
<br><br>
<div class="card">
<form action="proses.php?aksi=pengembalian" method="post" class="row g-3">
   <div class="col-12">
    <label for="inputiduser" class="form-label">ID Peminjaman</label>
    <input type="text" value="<?php echo $p; ?>" name="id" class="form-control">
  </div> 
  <div class="col-12">
    <label for="inputiduser" class="form-label">Tanggal Pengembalian</label>
    <input type="date" name="tanggal_pengembalian" class="form-control">
  </div>
  <div class="col-12">
    <label for="inputidbuku" class="form-label">Kondisi Buku Sesudah</label>
    <select name="kondisi_bukussdh">
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