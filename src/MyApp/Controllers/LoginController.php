<?php
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

session_start();
class LoginController{
    
    private ?string $templateName;
    
    public function  __construct(){
        $this->templateName = "./views/login.phtml";
    }
    
    public function index(): void{
        /** if there is $_POST["email"]
        * performs login() user
        */
        if (isset($_POST["email"])){
            $login_done = User::login( $_POST["email"], $_POST["password"],);
            if ( $login_done===true ){
                
            header("Location:index.php?page=profile");
            exit;
            } echo "mot de passe invalide";
        }
        $view = new View($this->templateName,[]);
        $view->display();
        
    }
}