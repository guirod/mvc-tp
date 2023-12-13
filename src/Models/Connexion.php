<?php

namespace Guirod\MvcTp\Models;

use JetBrains\PhpStorm\NoReturn;
use PDO;
use PDOException;

class Connexion
{
    const SERVER_NAME = "mysql8";
    const USERNAME = "root";
    const PASSWORD = "p@ssw0rd";
    const DB_NAME = 'mvc_tp';

    private static ?Connexion $instance = NULL;
    
    private ?PDO $conn = null; 

    static public function getInstance(): ?Connexion
    {
        if (self::$instance === NULL) {
            try {
                self::$instance = new Connexion();
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }

        return self::$instance;
    }

    public function getConn(): PDO
    {
        return $this->conn;
    }

    /*
     * Private Constructor
     */
    private function __construct()
    {
        $this->conn = new PDO("mysql:host=". self::SERVER_NAME .";dbname=".self::DB_NAME, self::USERNAME, self::PASSWORD);
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    }

    /**
     * Nous aurions simplement pu modifier la visibilité à private ici
     * @return void
     */
    public function __clone() {
        trigger_error('Cloning forbidden.', E_USER_ERROR);
    }
}