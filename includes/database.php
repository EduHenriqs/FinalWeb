<?php
error_log('Including database.php');

if (class_exists('Database')) {
    error_log('Class Database already exists');
    return;
}
error_log('Defining class Database');

class Database {
    private $mysqli;

    public function __construct($host, $username, $password, $database) {
        $this->mysqli = new mysqli($host, $username, $password, $database);

        if ($this->mysqli->connect_error) {
            die('Erro de conexão (' . $this->mysqli->connect_errno . ') ' . $this->mysqli->connect_error);
        }
    }

    public function query($sql) {
        return $this->mysqli->query($sql);
    }

    public function prepare($sql) {
        return $this->mysqli->prepare($sql);
    }

    public function escapeString($string) {
        return $this->mysqli->real_escape_string($string);
    }

    public function close() {
        $this->mysqli->close();
    }

    public function __destruct() {
        $this->close();
    }
}
?>