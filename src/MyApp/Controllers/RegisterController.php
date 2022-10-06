<?php
session_start();
/**
 * An other controller to handle add product form
 * 
 */
namespace MyApp\Controllers;
use MyApp\Models\User;
use MyApp\Services\View;
/**
 * Class RegisterController
 * @package MyApp\Controllers
 **/
class RegisterController{
    
    private ?string $templateName;
    
    public function  __construct(){
        $this->templateName = "./views/register.phtml";
    }
    
    public function index(): void{
        /** if there is $_POST["name"]
        * performs addOne() user
        */
        if (isset($_POST["email"])){
            $insert_done = User::addOne( $_POST["email"], $_POST["password"],);
            // $_POST["birthday"], $_POST["firstname"], $_POST["lastname"], $_POST["address"], $_POST["city"], $_POST["citycode"], $_POST["phone"], $_POST["sexe"], 
            if ( $insert_done===true ){
            header("Location:index.php?page=home");
            exit;
            }
        }
        $view = new View($this->templateName,[]);
        $view->display();
        
    }
}