<?php
    class Connection{
        private $username = "niwglkmv_root";
        private $password = "gemmarie2023";
        private $host = "localhost";
        private $dbname = "niwglkmv_shims";
        private $conn;

        function __construct(){
            if(session_status() !== PHP_SESSION_ACTIVE) session_start();
            $this->conn = new mysqli($this->host, $this->username, $this->password, $this->dbname);
            if ($this->conn->connect_errno) {
                echo "Failed to connect to MySQL: " . $this->conn->connect_error;
                exit();
            }
        }

        function connect(){
            return $this->conn;
        }
    }
?>
   


    