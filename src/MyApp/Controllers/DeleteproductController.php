<?php
/**
 * An other controller to handle add product form
 * 
 */
namespace MyApp\Controllers;
use MyApp\Models\Product;
use MyApp\Services\View;

class DeleteproductController{
    
    public function  __construct(){
        
    }
    
    public function index(): void{
        if (!isset($_GET["product_id"])){
            header("Location:index.php?page=shopadmin");
            exit;
            }
        $delete_done = Product::deleteOne((int)$_GET["product_id"]);
        if ($delete_done===true){
            header("Location:index.php?page=shopadmin");
            exit;
        }
    }
}