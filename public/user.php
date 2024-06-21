<?php
session_start();
if($_SESSION['connected'] === false){
    header('Location: /login.php');
    die();
}
require_once '../elements/header.php';
?>

<?php if($_SESSION['role'] === 'user' || 'admin') : ?>
    <p class="text-3xl font-bold text-center">Page d'utilisateur</p>
<?php else : ?>
    <p>Réservé à l'utilisateur</p>
<?php endif; ?>

<?php require_once '../elements/footer.php' ?>