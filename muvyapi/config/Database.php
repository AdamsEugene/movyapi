<?php
    class Database {
        private $hostName = 'remotemysql.com';
        private $dbName = 'Q93n8XhAQY';
        private $userName = 'Q93n8XhAQY';
        private $password = '1r6N8fdD1u';
        private $conn;
        
        // connect db
        public function connect() {
            $this->conn = null;

            try {
                $this->conn = new PDO('mysql:host='.$this->hostName. ';dbname='.$this->dbName, $this->userName, $this->password);
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo 'Connection Error:' . $e->getMassage();
            }
            return $this->conn;
        }
    }
?>