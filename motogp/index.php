<?php

// ambil module & action dari URL
$module = $_GET['module'] ?? 'team';   // default tampil Team
$action = $_GET['action'] ?? 'index';  // default tampilan list

// routing controller
switch ($module) {
  case 'team':
    require_once __DIR__.'/controllers/TeamController.php';
    $controller = new TeamController();
    break;

  case 'rider':
    require_once __DIR__.'/controllers/RiderController.php';
    $controller = new RiderController();
    break;

  case 'bike':
    require_once __DIR__.'/controllers/BikeController.php';
    $controller = new BikeController();
    break;

  default:
    die("Module '$module' tidak ditemukan");
}

// pastikan action ada
if (!method_exists($controller, $action)) {
  die("Action '$action' tidak ditemukan di controller '$module'");
}

// jalankan
$controller->$action();
