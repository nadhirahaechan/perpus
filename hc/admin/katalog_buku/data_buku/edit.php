<?php

include_once('../../../class/Buku.php');

$id= $_GET["id"];

$buku = new Buku;
$data_buku = $buku->find($id);

if(isset($_POST["submit"])){
    $data= [
        "judul" => $_POST["judul"],
        "pengarang" => $_POST["pengarang"],
        "tahun_terbit" => $_POST["tahun_terbit"],
        "isbn" => $_POST["isbn"],
        
    ];

    

    $buku->update($id, $data);

    header("Location: index.php?pesan=edit_sukses");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Buku</title>
</head>
<body>
    <?php include('../../sidebar.php') ?>

    <div class="form_edit_buku">
        <form method="POST" action="">
            <div>
                <label>Judul</label>
                <input type="text" name="judul" value="<?= $data_buku["judul"] ?>">
            </div>
            <div>
                <label>Pengarang</label>
                <input type="text" name="pengarang" value="<?= $data_buku["pengarang"] ?>">
            </div>
            <div>
                <label>Tahun Terbit</label>
                <input type="text" name="tahun_terbit" value="<?= $data_buku["tahun_terbit"] ?>">
            </div>
            <div>
                <label>isbn</label>
                <input type="text" name="isbn" value="<?= $data_buku["isbn"] ?>">
            </div>
            <button type="submit" name="submit">Submit</button>
        </form>
    </div>
</body>
</html>
