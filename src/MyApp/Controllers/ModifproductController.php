<?php

namespace MyApp\Controllers;
use MyApp\Models\Product;
use MyApp\Services\View;

class ModifproductController{

    private ?string $templateName;
    
    public function  __construct(){
        $this->templateName = "./views/modifproduct.phtml";
    }
    
    public function index(){
        $product = Product::getAll();
        $view = new View($this->templateName,$product);
        $view->display();
    }

    public function modif(){
        if (isset($_POST["name"])){
            $modif_done = Product::modifOne( $_POST["name"], $_POST["img"], $_POST["description"], $_POST["price"], $_GET["id"]);
            if ( $modif_done===true ){
            header("Location:index.php?page=shopadmin");
            exit;
            }
        }
    }

}

