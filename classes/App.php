<?php
namespace App;

use PDO;

class App{

    public static function getPDO (): PDO
    {
        return new PDO('sqlite:../data.sqlite', null, null,[
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_CLASS
        ]);
    }

    public static function getUser(string $username) : User | null {
        $pdo = self::getPDO();
        $query = $pdo->prepare('SELECT * FROM users WHERE username = :username');
        $query->execute([
            'username' => $username
        ]);
        $user = $query->fetch(\PDO::FETCH_ASSOC);
        if ($user) {
            return new User($user['username'], $user['password'], $user['role']);
        }
        return null;
    }
}