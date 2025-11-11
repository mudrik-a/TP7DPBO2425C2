<?php
require_once __DIR__.'/../core/DB.php';

class Rider {
    private DB $db;
    public function __construct(){ $this->db = new DB(); }

    public function all(): array {
        $sql = "SELECT r.id, r.name, r.nationality, r.number, r.team_id,
                       t.name AS team_name
                FROM rider r
                LEFT JOIN team t ON r.team_id = t.id
                ORDER BY r.number ASC, r.name ASC";
        return $this->db->select($sql);
    }

    public function insert(string $name, ?string $nat, ?int $num, ?int $teamId): int {
        return $this->db->cud(
            "INSERT INTO rider (name, nationality, number, team_id) VALUES (?, ?, ?, ?)",
            "ssii", [ $name, $nat, $num, $teamId ],
            true
        );
    }

    public function update(int $id, string $name, ?string $nat, ?int $num, ?int $teamId): int {
        return $this->db->cud(
            "UPDATE rider SET name=?, nationality=?, number=?, team_id=? WHERE id=?",
            "ssiii", [ $name, $nat, $num, $teamId, $id ]
        );
    }

    public function delete(int $id): int {
        return $this->db->cud("DELETE FROM rider WHERE id=?", "i", [ $id ]);
    }
}
