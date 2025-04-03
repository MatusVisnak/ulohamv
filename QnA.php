<?php
class QnA {
    private $conn;

    // Konektor na databázu
    public function __construct() {
        $this->conn = new mysqli("localhost", "root", "", "ulohadb");

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    // Metóda na získanie pripojenia
    public function getConn() {
        return $this->conn;
    }

    // Metóda na získanie všetkých otázok a odpovedí
    public function getQnA() {
        $sql = "SELECT id, otazka, odpoved FROM qna";
        $result = $this->conn->query($sql);

        $otazky_a_odpovede = [];

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $otazky_a_odpovede[] = $row;
            }
        }

        return $otazky_a_odpovede;
    }
}
?>
