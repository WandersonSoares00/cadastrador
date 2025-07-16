<?php

require_once __DIR__ . '/../models/User.php';

class UserController {

    public function index() {
        $action = $_GET['action'] ?? 'list';
        $userId = $_GET['id'] ?? null;

        $userToEdit = null;
        $message = '';
        $showForm = false;

        if (isset($_GET['error'])) {
            $message = 'Erro: Todos os campos são obrigatórios!';
        }

        switch ($action) {
            case 'edit':
                if ($userId) {
                    $userToEdit = User::findById($userId);
                }
                $showForm = true;
                break;
            case 'create':
                $showForm = true;
                break;
        }

        $users = User::findAll();

        require_once __DIR__ . '/../views/template.php';
    }

    public function store() {
        $name = $_POST['name'] ?? '';
        $email = $_POST['email'] ?? '';

        if (empty($name) || empty($email)) {
            // Redireciona de volta para o formulário com uma flag de erro
            header('Location: index.php?action=create&error=validation');
            exit;
        }
        
        User::save($name, $email);

        // Redireciona para a página principal
        header('Location: index.php');
        exit;
    }

    public function update() {
        $id = $_POST['id'] ?? null;
        $name = $_POST['name'] ?? '';
        $email = $_POST['email'] ?? '';

        if (empty($id) || empty($name) || empty($email)) {
            // Redireciona de volta para o formulário de edição com erro
            header('Location: index.php?action=edit&id=' . $id . '&error=validation');
            exit;
        }

        User::update($id, $name, $email);

        header('Location: index.php');
        exit;
    }

    public function delete() {
        $id = $_GET['id'] ?? null;
        if ($id) {
            User::delete($id);
        }
        
        header('Location: index.php');
        exit;
    }
}
