<?php
include_once('../../../class/Peminjaman.php');

$id= $_GET["id"];

$peminjaman= new Peminjaman;
$peminjaman->delete($id);

header("Location: index.php?pesan=hapus_sukses");

?>