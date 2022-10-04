<?php

namespace MyApp\Controllers;
use MyApp\Models\Product;
use MyApp\Services\View;

class ShowproductController{
    
    private ?string $templateName;
    
    public function  __construct(){
        $this->templateName = "./views/showproduct.phtml";
    }
    
    public function index(){
        $product = Product::getAll();
        $view = new View($this->templateName,$product);
        $view->display();
    }
}