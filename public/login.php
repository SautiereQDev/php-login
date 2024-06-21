<?php

use App\App;

require dirname(__DIR__) . '/vendor/autoload.php';

session_start();
$error = null;

if(isset($_POST['username'], $_POST['password'])){
    $user = App::getUser($_POST['username']);
    try {
        \App\Auth::login($_POST['username'], $_POST['password']);
    } catch (Exception $e) {
        $error = $e->getMessage();
    }
}
?>

<h1 class="text-3xl text-center mt-3">Connexion</h1>
<?php if($error): ?>
    <div class="bg-red-400 text-white text-center w-2/3 m-auto p-1 mt-3 rounded">
        <?= $error ?>
    </div>
<?php endif; ?>
<form method="post" class="flex flex-col gap-3 w-1/5 m-auto mt-6">
    <input type="text" name="username" placeholder="username" class="border p-1 rounded">
    <input type="text" name="password" placeholder="password"  class="border p-1 rounded">
    <button type="submit" class="border p-1 bg-blue-600 text-white rounded w-2/3 m-auto">Se connecter</button>
</form>

<?php require_once '../elements/header.php'; ?>