<?php
namespace MyApp\Services;
use MyApp\Controllers\NotfoundController;
/**
 * Class Router
 * @package MyApp\Services
 * */
class Router{
    /** @var string $page */
    private string $page;
    /** @var array $routes */
    private array $routes;
    /**
     * Router constructor.
     * set the current page
     * load routes from config
     */
    public function __construct(){
      $this->routes = require "./config/routes.php";
      $this->setPage();  
    }
    /**
     * Router start function.
     * Search for a corresponding route for the current page
     */
    public function start(): void{
          /** if the string page can be found in routes array */
          if (array_key_exists($this->page,$this->routes)){
            /** specify the route */
            $route = $this->routes[$this->page];
            /** specify the corresponding controller class */
            $controllerName = $route['action'][0];
            /** instantiate the controller */
            $controller = new $controllerName();
            /** and run the method eg: index() */
            $controller->{$route['action'][1]}();
          } else {
            $notFoundCtrl = new NotfoundController();
            $notFoundCtrl->index();
          }
    }
    
    public function setPage(){
      $this->page = isset($_GET['page']) ? strtolower($_GET['page']) : "home";
    }
    
    public function getPage(){
        return $this->page;
    }
}