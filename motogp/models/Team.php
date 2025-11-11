<?php
require_once __DIR__.'/../core/DB.php';

class Team {
    private DB $db;
    public function __construct(){ $this->db = new DB(); }

    public function all(): array {
        return $this->db->select("SELECT id, name, country FROM team ORDER BY name ASC");
    }

    public function insert(string $name, ?string $country): int {
        return $this->db->cud(
            "INSERT INTO team (name, country) VALUES (?, ?)",
            "ss", [ $name, $country ],
            true
        );
    }

    public function update(int $id, string $name, ?string $country): int {
        return $this->db->cud(
            "UPDATE team SET name=?, country=? WHERE id=?",
            "ssi", [ $name, $country, $id ]
        );
    }

    public function delete(int $id): int {
        return $this->db->cud("DELETE FROM team WHERE id=?", "i", [ $id ]);
    }
}
