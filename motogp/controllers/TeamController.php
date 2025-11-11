<?php
require_once __DIR__.'/../models/Team.php';

class TeamController {
    public function index(): void {
        $data = (new Team())->all();
        include __DIR__ . '/../views/TeamView.php';
    }

    public function add(): void {
        $name = trim($_POST['name'] ?? '');
        $country = trim($_POST['country'] ?? '');
        if ($name!=='') (new Team())->insert($name, $country ?: null);
        header('Location: index.php?module=team');
    }

    public function update(): void {
        $id = (int)($_POST['id'] ?? 0);
        $name = trim($_POST['name'] ?? '');
        $country = trim($_POST['country'] ?? '');
        if ($id>0 && $name!=='') (new Team())->update($id, $name, $country ?: null);
        header('Location: index.php?module=team');
    }

    public function delete(): void {
        $id = (int)($_GET['id'] ?? 0);
        if ($id>0) (new Team())->delete($id);
        header('Location: index.php?module=team');
    }
}
