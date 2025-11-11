<?php
require_once __DIR__.'/../models/Bike.php';
require_once __DIR__.'/../models/Rider.php';

class BikeController {
    public function index(): void {
        $bikeM  = new Bike();
        $riderM = new Rider();
        $data   = $bikeM->all();
        $riders = $riderM->all(); // dropdown rider
        include __DIR__ . '/../views/BikeView.php';
    }

    public function add(): void {
        $riderId = $_POST['rider_id'] === '' ? 0 : (int)$_POST['rider_id'];
        $model   = trim($_POST['model'] ?? '');
        $engine  = $_POST['engine_cc'] === '' ? null : (int)$_POST['engine_cc'];
        $chassis = trim($_POST['chassis'] ?? '');
        $year    = $_POST['year'] === '' ? null : (int)$_POST['year'];

        if ($riderId>0 && $model!=='') {
            (new Bike())->insert($riderId, $model, $engine, ($chassis!==''?$chassis:null), $year);
        }
        header('Location: index.php?module=bike');
    }

    public function update(): void {
        $id      = (int)($_POST['id'] ?? 0);
        $riderId = $_POST['rider_id'] === '' ? 0 : (int)$_POST['rider_id'];
        $model   = trim($_POST['model'] ?? '');
        $engine  = $_POST['engine_cc'] === '' ? null : (int)$_POST['engine_cc'];
        $chassis = trim($_POST['chassis'] ?? '');
        $year    = $_POST['year'] === '' ? null : (int)$_POST['year'];

        if ($id>0 && $riderId>0 && $model!=='') {
            (new Bike())->update($id, $riderId, $model, $engine, ($chassis!==''?$chassis:null), $year);
        }
        header('Location: index.php?module=bike');
    }

    public function delete(): void {
        $id = (int)($_GET['id'] ?? 0);
        if ($id>0) (new Bike())->delete($id);
        header('Location: index.php?module=bike');
    }
}
