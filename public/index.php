<?php
session_start();
$_SESSION['connected'] = false;
$pdo = new PDO("sqlite:../data.sqlite", null, null, [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
]);
$users = $pdo->query('SELECT * FROM users')->fetchAll();
require_once '../elements/header.php';
?>

    <h1 class="text-3xl mt-3">Accèder aux pages</h1>

    <ul class="text-blue-500 mt-3">
        <li><a href="admin.php">Page réservée à l'administrateur</a></li>
        <li><a href="user.php">Page réservée à l'utilisateur</a></li>
    </ul>

    <table class="border rounded w-1/5 text-left mt-4">
        <thead>
            <tr class="font-bold border-b">
                <th>ID</th>
                <th>Pseudo</th>
                <th>Role</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($users as $user): ?>
            <tr class="border-b">
                <td><?= $user['id'] ?></td>
                <td><?= $user['username'] ?></td>
                <td><?= $user['role'] ?></td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>

<?php require_once '../elements/footer.php'; ?>