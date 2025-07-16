<?php

require_once __DIR__ . '/../src/controllers/UserController.php';

$action = $_POST['action'] ?? $_GET['action'] ?? 'index';

$controller = new UserController();

switch ($action) {
    case 'store':
        $controller->store();
        break;
    case 'update':
        $controller->update();
        break;
    case 'delete':
        $controller->delete();
        break;
    case 'index':
    case 'create':
    case 'edit':
    default:
        $controller->index();
        break;
}

?>