<?php
/**
 * A really simple NotfoundController to display a 404 view
 * 
 */
namespace MyApp\Controllers;
use MyApp\Services\View;
/**
 * Class NotfoundController
 * @package MyApp\Controllers
 **/
class NotfoundController{
    
    private ?string $templateName;
    
    public function  __construct(){
        $this->templateName = "./views/404.phtml";
    }
    
    public function index(): void{
        $view = new View($this->templateName,[]);
        $view->display();
    }
}