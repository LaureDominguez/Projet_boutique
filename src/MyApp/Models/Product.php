<?php
namespace MyApp\Models;
use \MyApp\Services\Database;
use \PDO;
/**
 * Class Product
 * @package MyApp\Models
 */
class Product {

    static string $table = "products";

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
    
    static function addOne(string $name, string $img, string $description, string $price): bool{
        $done = true;
         // on se connecte à la BDD
        $db = new Database();
        $pdo = $db->getPDO();
        // on prépare une requète SQL INSERT
        $sql = $pdo->prepare("INSERT INTO products (name, img, description, price) VALUES (:name,:img,:description,:price) ");
        // on execute l'insertion dans la table !
        $params = [
        "name" => $name,
        "img" => $img,
        "description" => $description,
        "price" => $price
        ];
        $sql->execute($params);
        if ($pdo->errorInfo()[0]!=="00000"){
            $done = false;
        }
        return $done;
    }

    static function modifOne(string $name, string $img, string $description, string $price, int $id): bool{
        $done = true;
        $db = new Database();
        $pdo = $db->getPDO();
        $sql = $pdo->prepare("UPDATE products SET name=:name, img=:img, description=:description, price=:price WHERE id=:id");
        $params = [
            "name" => $name,
            "img" => $img,
            "description" => $description,
            "price" => $price,
            "id"=>$id
        ];
        $sql->execute($params);
        if ($pdo->errorInfo()[0]!=="00000"){
            $done = false;
        }
        return $done;
    }

    static function deleteOne(int $product_id){
        $done = true;
        $db = new Database();
        $pdo = $db->getPDO();
        $sql = $pdo->prepare("DELETE FROM products WHERE id=:id");
        $params = [
            "id"=>$product_id
        ];
        $sql->execute($params);
        if ($pdo->errorInfo()[0]!=="00000"){
            $done = false;
        }
        return $done;
    }
    
}