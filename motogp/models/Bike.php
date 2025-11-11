<?php
require_once __DIR__.'/../core/DB.php';

class Bike {
    private DB $db;
    public function __construct(){ $this->db = new DB(); }

    public function all(): array {
        $sql = "SELECT b.id, b.rider_id, b.model, b.engine_cc, b.chassis, b.year,
                       r.name AS rider_name, t.name AS team_name
                FROM bike b
                LEFT JOIN rider r ON b.rider_id = r.id
                LEFT JOIN team  t ON r.team_id  = t.id
                ORDER BY b.year DESC, b.model ASC";
        return $this->db->select($sql);
    }

    public function insert(int $riderId, string $model, ?int $engineCc, ?string $chassis, ?int $year): int {
        return $this->db->cud(
            "INSERT INTO bike (rider_id, model, engine_cc, chassis, year) VALUES (?, ?, ?, ?, ?)",
            "isisi", [ $riderId, $model, $engineCc, $chassis, $year ],
            true
        );
    }

    public function update(int $id, int $riderId, string $model, ?int $engineCc, ?string $chassis, ?int $year): int {
        return $this->db->cud(
            "UPDATE bike SET rider_id=?, model=?, engine_cc=?, chassis=?, year=? WHERE id=?",
            "isisii", [ $riderId, $model, $engineCc, $chassis, $year, $id ]
        );
    }

    public function delete(int $id): int {
        return $this->db->cud("DELETE FROM bike WHERE id=?", "i", [ $id ]);
    }
}
