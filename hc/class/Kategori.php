<?php
include_once('Database.php');

class Kategori{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function all(){
        $sql="SELECT * FROM kategori";

        return $this->db->connect()->query($sql)->fetch_all(MYSQLI_ASSOC);
    }

    public function find($id){
        $sql="SELECT * FROM kategori WHERE id='$id'";

        return $this->db->connect()->query($sql)->fetch_Assoc();
    }
}
?>
