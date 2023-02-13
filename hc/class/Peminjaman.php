<?php
include_once('Database.php');

class Peminjaman{
    private $db ;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function all(){
        $sql = "SELECT user.fullname as peminjam, buku.judul as buku, peminjaman.id, peminjaman.tanggal_peminjaman, peminjaman.kondisi_bukusblm, peminjaman.tanggal_pengembalian, peminjaman.kondisi_bukussdh, peminjaman.denda FROM peminjaman, buku, user WHERE peminjaman.id_user = user.id AND peminjaman.id_buku = buku.id";

        return $this->db->connect()->query($sql)->fetch_all(MYSQLI_ASSOC);
    }

    public function getPeminjaman(){
        $sql = "SELECT user.fullname as peminjam, buku.judul as buku, peminjaman.tanggal_peminjaman, peminjaman.kondisi_bukusblm, peminjaman.tanggal_pengembalian, peminjaman.kondisi_bukussdh, peminjaman.denda, peminjaman.id FROM peminjaman, buku, user WHERE peminjaman.id_user = user.id AND peminjaman.id_buku = buku.id AND tanggal_pengembalian is NULL";

        return $this->db->connect()->query($sql)->fetch_all(MYSQLI_ASSOC);
    }
    public function find($id){
        $sql = "SELECT * FROM peminjaman WHERE id='$id'";

        return $this->db->connect()->query($sql)->fetch_assoc();
    }

    public function create($data){
        $id_user                = $data["id_user"];
        $id_buku                = $data["id_buku"];
        $tanggal_peminjaman     = $data["tanggal_peminjaman"];
        $kondisi_bukusblm       = $data["kondisi_bukusblm"];
    
        $sql = "INSERT INTO peminjaman(id_user,id_buku,tanggal_peminjaman,kondisi_bukusblm) VALUES ('$id_user','$id_buku','$tanggal_peminjaman','$kondisi_bukusblm')";
    
        if($this->db->connect()->query($sql) === TRUE ){
            return "Berhasil menambah data";
        }
            return "Gagal menambah data";
      }

      public function pengembalian($id,$data){
        $tanggal_pengembalian   = $data["tanggal_pengembalian"];
        $kondisi_bukussdh       = $data["kondisi_bukussdh"];
        $denda                  = $data["denda"];
    
        $sql = "UPDATE peminjaman SET tanggal_pengembalian='$tanggal_pengembalian', kondisi_bukussdh='$kondisi_bukussdh', denda='$denda' WHERE id='$id'";
    
        if($this->db->connect()->query($sql) === TRUE){
            return "Berhasil mengupdate data";
        }
            return "Gagal mengupdate data";
      }

      public function getPengembalian(){
        $sql = "SELECT user.fullname as peminjam, buku.judul as buku, peminjaman.tanggal_peminjaman, peminjaman.kondisi_bukusblm, peminjaman.tanggal_pengembalian, peminjaman.kondisi_bukussdh, peminjaman.denda, peminjaman.id FROM peminjaman, buku, user WHERE peminjaman.id_user = user.id AND peminjaman.id_buku = buku.id AND tanggal_pengembalian is not NULL";

        return $this->db->connect()->query($sql)->fetch_all(MYSQLI_ASSOC);
      }
      
      public function delete($id){
        $sql = "DELETE FROM peminjaman WHERE id='$id'";

        if($this->db->connect()->query($sql) === TRUE){
            return "berhasil menghapus";
        }
            return "gagal menghapus";
      }
}
?>