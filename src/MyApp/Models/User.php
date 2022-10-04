<?php
namespace MyApp\Models;

use DateTime;
use \MyApp\Services\Database;
use \PDO;
/**
 * Class Product
 * @package MyApp\Models
 */
class User {

    static string $table = "user";

    static function getAll(): array{
        $array = [];
        $db = new Database();
        $pdo = $db->getPDO();
        $sql = $pdo->prepare("SELECT * FROM ".self::$table." ORDER BY id DESC");
        $sql->execute();

        if ($pdo->errorInfo()[0]==="00000"){
            $array = $sql->fetchAll(PDO::FETCH_ASSOC);
        } return $array;
    }
    
    static function addOne(string $email, string $password): bool{
        // DateTime $birthday, string $firstname, string $lastname, string $address, string $city, int $citycode, int $phone, int $sexe,
        $done = true;
         // on se connecte à la BDD
        $db = new Database();
        $pdo = $db->getPDO();
        // on prépare une requète SQL INSERT
        $sql = $pdo->prepare("INSERT INTO user (email, password) VALUES (:email, :password) ");
        //, birthday, firstname, lastname, address, city, citycode, phone, sexe
        //, :birthday, :firstname, :lastname, :address, :city, :citycode, :phone, :sexe
        
        // on execute l'insertion dans la table !
        $params = [
        "email" => $email,
        "password" => $password,
        // "birthday" => $birthday,
        // "firstname" => $firstname,
        // "lastname" => $lastname,
        // "address" => $address,
        // "city" => $city,
        // "citycode" => $citycode,
        // "phone" => $phone,
        // "sexe" => $sexe,
        ];
        $sql->execute($params);
        if ($pdo->errorInfo()[0]!=="00000"){
            $done = false;
        }
        return $done;
    }

    public function logout(): void{
        session_destroy();
    }
    
    public function loged(): bool{
        if (array_key_exists('email',$_SESSION) && $_SESSION['email'] !== null){
            return true;
        }
        return false;
    }
    
    public function getCurrentUser(): ?array{
        if ($this->loged()){
            return $this->getByUsername($_SESSION['email']);
        }
        return null;
    }

    public function getByUsername(string $email): array|false {
        $array = [];
        $db = new Database();
        $pdo = $db->getPDO();
        $sql = $pdo->prepare("SELECT id,email,role FROM ".self::$table." WHERE email=:email LIMIT 1");
        $sql->bindValue(":email",$email);
        $sql->execute();
            if ($pdo->errorInfo()[0]==="00000"){
            $array = $sql->fetch(PDO::FETCH_ASSOC);
            }
        return $array;
    }

    static function login(string $email, string $password): array{
        $userData = [];
        $db = new Database();
        $pdo = $db->getPDO();
        $sql = $pdo->prepare("SELECT * FROM ".self::$table." WHERE email=:email");
        $params = [
            "email" => $email
            ];
            $sql->execute($params);
            $sqlCheck = $sql->fetch(PDO::FETCH_ASSOC);
            $password_hash = $sqlCheck ? $sqlCheck["password"] : "";
            if ( password_verify($password, $password_hash) ) {
                $userData = ['email' => $sqlCheck["email"],'role' => $sqlCheck["role"]];
                $_SESSION = $userData;
            }
        return $userData;
    }

    // static function modifOne(DateTime $birthday, string $firstname, string $lastname, string $address, string $city, int $citycode, int $phone, int $sexe,): bool{
    //     $done = true;
    //     $db = new Database();
    //     $pdo = $db->getPDO();
    //     $sql = $pdo->prepare("UPDATE user SET birthday=:birthday, firstname=:firstname, lastname=:lastname, address=:address, city=:city, citycode=:citycode, phone=:phone, sexe=:sexe WHERE id=:id");
    //     $params = [
    //         "birthday" => $birthday,
    //         "firstname" => $firstname,
    //         "lastname" => $lastname,
    //         "address" => $address,
    //         "city" => $city,
    //         "citycode" => $citycode,
    //         "phone" => $phone,
    //         "sexe" => $sexe,
    //     ];
    //     $sql->execute($params);
    //     if ($pdo->errorInfo()[0]!=="00000"){
    //         $done = false;
    //     }
    //     return $done;
    // }

    static function deleteOne(int $user_id){
        $done = true;
        $db = new Database();
        $pdo = $db->getPDO();
        $sql = $pdo->prepare("DELETE FROM user WHERE id=:id");
        $params = [
            "id"=>$user_id
        ];
        $sql->execute($params);
        if ($pdo->errorInfo()[0]!=="00000"){
            $done = false;
        }
        return $done;
    }
    
}