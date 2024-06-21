<?php
session_start();
if($_SESSION['connected'] === false){
    header('Location: /login.php');
    die();
}
require_once '../elements/header.php';
?>

<?php if($_SESSION['role'] === 'admin') : ?>
    <p class="text-3xl font-bold text-center">Pade d'administration</p>
<?php else : ?>
    <p>Réservé à l'administrateur</p>
<?php endif; ?>

<?php require_once '../elements/footer.php' ?>