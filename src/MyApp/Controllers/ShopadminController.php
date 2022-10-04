<?php

namespace MyApp\Controllers;
use MyApp\Models\Product;
use MyApp\Services\View;

class ShopadminController{
    
    private ?string $templateName;
    
    public function  __construct(){
        $this->templateName = "./views/shopadmin.phtml";
    }
    
    public function index(){
        $product = Product::getAll();
        $data = ['products'=>$product];
        $view = new View($this->templateName,$data);
        $view->display();
    }
}