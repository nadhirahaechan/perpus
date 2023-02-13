<?php
include_once("Database.php");

class Buku{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function all(){
        $sql = "SELECT buku.id, buku.judul, buku.pengarang, kategori.nama as kategori, penerbit.nama as penerbit, buku.tahun_terbit, buku.isbn FROM buku,kategori,penerbit WHERE buku.id_kategori = kategori.id AND buku.id_penerbit = penerbit.id";

        return $this->db->connect()->query($sql)->fetch_all(MYSQLI_ASSOC);
    }

    public function find($id){
        $sql= "SELECT * FROM buku WHERE id='$id'";

        return $this->db->connect()->query($sql)->fetch_assoc();
    }

    public function update($id,$data){
        $judul = $data["judul"];
        $pengarang = $data["pengarang"];
        $tahun = $data["tahun_terbit"];
        $isbn = $data["isbn"];

        $sql = "UPDATE buku SET judul='$judul', pengarang='$pengarang', tahun_terbit='$tahun', isbn='$isbn' WHERE id='$id'";

        if($this->db->connect()->query($sql) === TRUE){
            return "Berhasil mengupdate data";
        }
            return "Gagal mengupdate data";
    }

    public function create($data){
        $judul = $data["judul"];
        $pengarang = $data["pengarang"];
        $tahun = $data["tahun_terbit"];
        $isbn = $data["isbn"];

        $sql = "INSERT INTO buku(judul,pengarang,tahun_terbit,isbn) VALUES ('$judul','$pengarang','$tahun','$isbn')";

        if($this->db->connect()->query($sql) === TRUE){
            return "Berhasil mengupdate data";
        }
            return "Gagal mengupdate data";
    }
}
?>