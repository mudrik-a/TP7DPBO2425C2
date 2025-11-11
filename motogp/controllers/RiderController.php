<?php
require_once __DIR__.'/../models/Rider.php';
require_once __DIR__.'/../models/Team.php';

class RiderController {
    public function index(): void {
        $riderM = new Rider();
        $teamM  = new Team();
        $data   = $riderM->all();
        $teams  = $teamM->all(); // dropdown team
        include __DIR__ . '/../views/RiderView.php';
    }

    public function add(): void {
        $name = trim($_POST['name'] ?? '');
        $nat  = trim($_POST['nationality'] ?? '');
        $num  = $_POST['number'] === '' ? null : (int)$_POST['number'];
        $tid  = $_POST['team_id'] === '' ? null : (int)$_POST['team_id'];
        if ($name!=='') (new Rider())->insert($name, $nat ?: null, $num, $tid);
        header('Location: index.php?module=rider');
    }

    public function update(): void {
        $id   = (int)($_POST['id'] ?? 0);
        $name = trim($_POST['name'] ?? '');
        $nat  = trim($_POST['nationality'] ?? '');
        $num  = $_POST['number'] === '' ? null : (int)$_POST['number'];
        $tid  = $_POST['team_id'] === '' ? null : (int)$_POST['team_id'];
        if ($id>0 && $name!=='') (new Rider())->update($id, $name, $nat ?: null, $num, $tid);
        header('Location: index.php?module=rider');
    }

    public function delete(): void {
        $id = (int)($_GET['id'] ?? 0);
        if ($id>0) (new Rider())->delete($id);
        header('Location: index.php?module=rider');
    }
}
