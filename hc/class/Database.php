<?php

class Database {
    private $hostname="localhost";
    private $username="root";
    private $password="";
    private $database="perpusndrr";

    public function connect(){
        return mysqli_connect($this->hostname, $this->username, $this->password, $this->database);
    }
}

?>