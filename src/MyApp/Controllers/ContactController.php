<?php
/**
 * A really simple HomeController to display a view
 * 
 */
namespace MyApp\Controllers;
use MyApp\Services\View;
/**
 * Class HomeController
 * @package MyApp\Controllers
 **/
class ContactController{
    
    private ?string $templateName;
    
    public function  __construct(){
        $this->templateName = "./views/contact.phtml";
    }
    
    public function index(): void{
        $view = new View($this->templateName,[]);
        $view->display();
    }
}