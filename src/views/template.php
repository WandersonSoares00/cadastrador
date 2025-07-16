<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD de Usuários</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="container">
    <h1>Cadastrador de Usuários</h1>

    <?php if (!empty($message)): ?>
        <div class="message"><?= htmlspecialchars($message) ?></div>
    <?php endif; ?>

    <?php if ($showForm): ?>
        <div class="form-section">
            <h2><?= $userToEdit ? 'Editar Usuário' : 'Criar Novo Usuário' ?></h2>
            <form action="index.php" method="POST">
                <input type="hidden" name="action" value="<?= $userToEdit ? 'update' : 'store' ?>">
                <?php if ($userToEdit): ?>
                    <input type="hidden" name="id" value="<?= htmlspecialchars($userToEdit['id']) ?>">
                <?php endif; ?>

                <div>
                    <label for="name">Nome:</label>
                    <input type="text" id="name" name="name" value="<?= htmlspecialchars($userToEdit['name'] ?? '') ?>">
                </div>
                <div>
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" value="<?= htmlspecialchars($userToEdit['email'] ?? '') ?>">
                </div>

                <button type="submit" class="btn"><?= $userToEdit ? 'Atualizar' : 'Salvar' ?></button>
                <a href="index.php">Cancelar</a>
            </form>
        </div>
    <?php endif; ?>

    <div class="user-list">
        <h2>Lista de Usuários</h2>
        <?php if (!$showForm): // Só mostra o botão "Novo" se o formulário não estiver visível ?>
            <a href="index.php?action=create" class="btn">Novo Usuário</a>
        <?php endif; ?>
        
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($users)): ?>
                    <tr>
                        <td colspan="4" style="text-align:center;">Nenhum usuário cadastrado.</td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($users as $user): ?>
                        <tr>
                            <td><?= htmlspecialchars($user['id']) ?></td>
                            <td><?= htmlspecialchars($user['name']) ?></td>
                            <td><?= htmlspecialchars($user['email']) ?></td>
                            <td class="actions">
                                <a href="index.php?action=edit&id=<?= $user['id'] ?>" class="btn btn-edit">Editar</a>
                                <a href="index.php?action=delete&id=<?= $user['id'] ?>" class="btn btn-delete">Deletar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<script src="js/script.js"></script>
</body>
</html>
