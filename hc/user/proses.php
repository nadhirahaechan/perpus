<?php
include_once('../class/Peminjaman.php');
$aksi=$_GET["aksi"];

if($aksi=="tambah"){
    $peminjaman = new Peminjaman;

    $data_baru=$_POST; 
    $tambah_peminjaman = $peminjaman->create($data_baru);
    echo $tambah_peminjaman;
    header("location:peminjaman.php");
}

if($aksi=="pengembalian"){
    $peminjaman = new Peminjaman;

    $data_peminjaman=$_POST; 
    $tambah_peminjaman = $peminjaman->pengembalian($_POST['id'],$data_peminjaman);
    echo $tambah_peminjaman;
    header("location:pengembalian.php");
}

?>