<?php
namespace App;
// récupère un utilisateur avec le username (getUser()) et password_verify() avec le mot de  passe du getUser et celui de l'input
class Auth{
    public static function login(string $username, string $password) : void{
        if(session_status() === PHP_SESSION_NONE){
            session_start();
        }

        $user = App::getUser($username);

        if(password_verify($password, $user->password)){
            $_SESSION['connected'] = true;
            $_SESSION['role'] = $user->role;
        }
        else{
            throw new \Exception("Identifiants incorrects");
        }

        if($_SESSION['role'] === 'admin'){
            header('Location: /admin.php');
            exit();
        }
        elseif($_SESSION['role'] === 'user'){
            header('Location: /user.php');
            exit();
        }
    }
}