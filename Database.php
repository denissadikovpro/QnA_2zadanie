<?php
namespace App;

use PDO;
use PDOException;

class Database {
    protected $pdo;

    public function __construct($host, $dbname, $user, $pass) {
        try {
            $this->pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            $this->handleError("Chyba pripojenia: " . $e->getMessage());
        }
    }

    protected function handleError($message) {
        // Tu môžeme logovať alebo vypisovať chyby elegantnejšie
        die($message);
    }
}
?>
