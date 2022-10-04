<?php
/**
 * A very simple db class
 */
namespace MyApp\Services;
use \PDO;
/**
 * Class Database
 * @package MyApp\Services
 */
class Database{
    
    private string $dbHost;
    private string $dbName;
    private string $dbUser;
    private string $dbPass;
    private $pdo;
    
    function __construct(){
        $config = require "./config/database.php";
        $this->dbHost = $config['dbHost'];
        $this->dbName = $config['dbName'];
        $this->dbUser = $config['dbUser'];
        $this->dbPass = $config['dbPass'];
        $this->setPDO();
    }

    private function setPDO(): void{
        if($this->pdo === null){
            $dsn = "mysql:host=".$this->dbHost.";dbname=".$this->dbName;
            $pdo = new PDO($dsn, $this->dbUser, $this->dbPass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo = $pdo;
        }
    }

    public function getPDO(): PDO{
        return $this->pdo;
    }
}