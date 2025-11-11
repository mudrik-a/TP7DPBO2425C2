<?php

require_once __DIR__.'/config.php';

class DB {
    private mysqli $conn;

    public function __construct() {
        $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        if ($this->conn->connect_error) {
            die('Koneksi gagal: ' . $this->conn->connect_error);
        }
        $this->conn->set_charset(DB_CHARSET);
    }

    /** SELECT → array assoc */
    public function select(string $sql, string $types = '', array $params = []): array {
        $stmt = $this->conn->prepare($sql);
        if (!$stmt) die('Prepare gagal: '.$this->conn->error);
        if ($types !== '' && $params) $stmt->bind_param($types, ...$params);
        $stmt->execute();
        $res  = $stmt->get_result();
        $rows = $res ? $res->fetch_all(MYSQLI_ASSOC) : [];
        $stmt->close();
        return $rows;
    }

    /** C/U/D → affected rows | insert_id bila $returnInsertId=true */
    public function cud(string $sql, string $types = '', array $params = [], bool $returnInsertId=false) {
        $stmt = $this->conn->prepare($sql);
        if (!$stmt) die('Prepare gagal: '.$this->conn->error);
        if ($types !== '' && $params) $stmt->bind_param($types, ...$params);
        $ok = $stmt->execute();
        if (!$ok) die('Execute gagal: '.$stmt->error);
        $affected = $stmt->affected_rows;
        $insertId = $stmt->insert_id;
        $stmt->close();
        return $returnInsertId ? $insertId : $affected;
    }
}
