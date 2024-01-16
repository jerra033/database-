<?php

class Database
{
    private $host = 'localhost';
    private $dbname = 'inloggen';
    private $user = 'root';
    private $password = '';

    private $conn;

    public function __construct()
    {
        try {
            $this->conn = new PDO("mysql:host={$this->host};dbname={$this->dbname}", $this->user, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function selectData()
    {
        try {
            $stmt = $this->conn->query("SELECT * FROM inloggen");
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Select failed: " . $e->getMessage();
            return [];
        }
    }

    public function updateData($id, $newData)
    {
        try {
            $sql = "UPDATE jouw_tabel_naam SET kolom1 = ?, kolom2 = ? WHERE id = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([$newData['kolom1'], $newData['kolom2'], $id]);
            return true;
        } catch (PDOException $e) {
            echo "Update failed: " . $e->getMessage();
            return false;
        }
    }

    public function deleteData($id)
    {
        try {
            $sql = "DELETE FROM jouw_tabel_naam WHERE id = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([$id]);
            return true;
        } catch (PDOException $e) {
            echo "Delete failed: " . $e->getMessage();
            return false;
        }
    }
}
