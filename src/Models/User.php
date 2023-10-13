<?php

namespace Guirod\MvcTp\Models;

use PDO;

class User
{
    public int $id; 
    public ?string $email;
    public ?string $passwordHash;
    public ?string $nom;
    public ?string $prenom;
    public ?string $adresse;

    public function __construct()
    {
    }

    public static function findAll(): array
    {
        $result = [];
        $conn = Connexion::getInstance()->getConn();
        $stt = $conn->query('SELECT * FROM `user`');
        while ($dbUser = $stt->fetch()) {
            $result[] = self::hydrate($dbUser);
        }

        return $result;
    } 

    public static function findById(int $id): User
    {
        $conn = Connexion::getInstance()->getConn();
        $stt = $conn->prepare('SELECT * FROM `user` WHERE id = ?');
        $stt->bindParam(1, $id, PDO::PARAM_INT);
        $stt->execute();

        $user = null;

        if ($dbUser = $stt->fetch()) {
            $user = self::hydrate($dbUser);
        }

        return $user;
    }

    public static function hydrate(array $properties): User
    {
        $user = new User();
        $user->id = $properties['id'];
        $user->email = isset($properties['email']) ? $properties['email'] : null;
        $user->passwordHash = isset($properties['passwordHash']) ? $properties['passwordHash'] : null;
        $user->nom = isset($properties['nom']) ? $properties['nom'] : null;
        $user->prenom = isset($properties['prenom']) ? $properties['prenom'] : null;
        $user->adresse = isset($properties['adresse']) ? $properties['adresse'] : null;

        return $user;
    } 
}