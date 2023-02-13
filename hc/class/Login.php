<?php
include_once("Database.php");

class Login extends Database{
    public function authLogin($data){
        $username = $data['username'];
        $password = $data['password'];
        // CEK USERNAME
        $sql = "SELECT * FROM user WHERE username = '$username'";
        $cek_user = $this->db->query($sql)->fetch_assoc();

        // JIKA USER TIDAK KOSONG
        if(!empty($cek_user)){
            // JALANKAN KODE
            if($password == $cek_user["password"])
            {
                session_start();
                $_SESSION['id'] = $cek_user['id'];
                if($cek_user['role'] == "admin")
                {   
                    // JIKA ADMIN MAKA AKAN KESINI
                    header("Location: admin/index.php");
                }elseif($cek_user['role'] == "user")
                {
                    // JIKA USER MAKA AKAN KESINI
                    header("Location: user/index.php");
                }

            }
        }
    }
}