<?php
/**
 * An other controller to handle add product form
 * 
 */
namespace MyApp\Controllers;
use MyApp\Models\Product;
use MyApp\Services\View;
/**
 * Class AddproductController
 * @package MyApp\Controllers
 **/
class AddproductController{
    
    private ?string $templateName;
    
    public function  __construct(){
        $this->templateName = "./views/addproduct.phtml";
    }
    
    public function index(): void{
        /** if there is $_POST["name"]
        * performs addOne() product
        */
        if (isset($_POST["name"])){
            $insert_done = Product::addOne( $_POST["name"], $_POST["img"], $_POST["description"], $_POST["price"], );
            if ( $insert_done===true ){
            header("Location:index.php?page=shopadmin");
            exit;
            }
        }
        $view = new View($this->templateName,[]);
        $view->display();
        
    }
}