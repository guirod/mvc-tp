<?php

namespace Guirod\MvcTp\Models;

use PDO;
use PDOException;


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

    public function remove()
    {
        try {
            $conn = Connexion::getInstance()->getConn();
            $stt = $conn->prepare('DELETE FROM `user` WHERE id = ?');
            $stt->bindParam(1, $this->id, PDO::PARAM_INT);
            $stt->execute();
        } catch (PDOException $e) {
            // Logguer l'erreur dans le but de pouvoir reproduire l'anomalie
            echo $e->getMessage();
        }
    }

    public function save()
    {
        try {
            $conn = Connexion::getInstance()->getConn();
            $stt = $conn->prepare('INSERT INTO `user` (email,password_hash,nom,prenom,adresse) VALUES (?,?,?,?,?);');
            $stt->bindParam(1, $this->email);
            $stt->bindParam(2, $this->passwordHash);
            $stt->bindParam(3, $this->nom);
            $stt->bindParam(4, $this->prenom);
            $stt->bindParam(5, $this->adresse);
            $stt->execute();
            $this->id = $conn->lastInsertId();
        } catch (PDOException $e) {
            // Logguer l'erreur dans le but de pouvoir reproduire l'anomalie
            echo $e->getMessage();
        }
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

    public static function findById(int $id): ?User
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

    public function afficheNom(){
        return $this->nom . ' ' . $this->prenom;
    }
}