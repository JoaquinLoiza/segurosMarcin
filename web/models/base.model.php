<?php
require '../vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable('../');
$dotenv->load();

class BaseModel{
    public function createConection(){
        $host = $_ENV['BD_HOST'];
        $userName = $_ENV['BD_USER'];
        $password = $_ENV['BD_PASS'];
        $database = $_ENV['BD_NAME']; 

        // 1. abro la conexión con MySQL 
        try {
            $pdo = new PDO("mysql:host=$host;dbname=$database;charset=utf8", $userName, $password);            
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        } catch (Exception $e) {
            var_dump($e);
        }
        return $pdo;
    }
}
