<?php
class BaseModel{
    public function createConection(){
        $host = 'localhost';
        $userName = 'root';
        $password = '';
        $database = 'db_seguros'; 

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
