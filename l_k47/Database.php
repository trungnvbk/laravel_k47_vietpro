<?php

class Database {

    protected $host = 'localhost';
    protected $name = 'root';
    protected $pass = '';
    protected $database = 'users_manager';
    protected $conn = null;
    protected $result = null;

    public function getConnect() {
        $this->conn = mysqli_connect($this->host, $this->name, $this->pass, $this->database);
        if ($this->conn == null) {
            return 0;
        } else {
            return 1;
        }
    }

    public function getTT($query) {
        if ($this->result != null) {
            mysqli_free_result($this->result);
        }
        $this->result = mysqli_query($this->conn, $query);
        return mysqli_fetch_all($this->result);
    }

}

$data = new Database;

$data->getConnect();
$result = $data->getTT("select * from login");
print_r($result);
?>
