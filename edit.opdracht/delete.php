<?php

class Database {
    private $host = 'localhost';
    private $username = '';
    private $password = 'jouw_wachtwoord';
    private $database = 'jouw_database';

    private $conn;

    public function __construct() {
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->database);

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function selectData($id) {
        
    }

    public function updateData($id, $newData) {
        try {
            $sql = "UPDATE jouw_tabel_naam SET kolom1 = ?, kolom2 = ? WHERE id = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([$newData['kolom1'], $newData['kolom2'], $id]);

            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Update failed: " . $e->getMessage();
            return false;
        }
    }
    
    public function deleteData($id) {
        try {
            $sql = "UPDATE jouw_tabel_naam SET kolom1 = ?, kolom2 = ? WHERE id = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([['kolom1'],['kolom2'], $id]);
            return true;
        } catch (PDOException $e) {
            echo "Delete failed: " . $e->getMessage();
            return false;
        }
    }
    

    public function closeConnection() {
        $this->conn->close();
    }
}

?>
