<?php
return[
      'home' => [
        'name' => 'Accueil',
        'action' => [\MyApp\Controllers\HomeController::class,'index']
        ],
      'register' => [
        'name' => 'Register',
        'action' => [\MyApp\Controllers\RegisterController::class,'index']
        ],
      'login' => [
        'name' => 'Login',
        'action' => [\MyApp\Controllers\LoginController::class,'index']
        ],
      'profile' => [
        'name' => 'Profile',
        'action' => [\MyApp\Controllers\ProfileController::class,'index']
        ],
      'shopuser' =>[
        'name' => 'Boutique',
        'action' => [\MyApp\Controllers\ShopuserController::class,'index']
      ],
      'showproduct' =>[
        'name' => 'Boutique-detail',
        'action' => [\MyApp\Controllers\ShowproductController::class,'index']
        ],
      'shopadmin' =>[
        'name' => 'Boutique-admin',
        'action' => [\MyApp\Controllers\ShopadminController::class,'index']
      ],
      'addproduct' =>[
        'action' => [\MyApp\Controllers\AddproductController::class,'index']
      ],
      'modifproduct' =>[
        'action' => [\MyApp\Controllers\ModifproductController::class,'index']
      ],
      'validmodif' =>[
        'action' => [\MyApp\Controllers\ModifproductController::class,'modif']
      ],
      'deleteproduct' =>[
        'action' => [\MyApp\Controllers\DeleteproductController::class,'index']
      ],
      'contact' => [
        'name' => 'Contact',
        'action' => [\MyApp\Controllers\ContactController::class,'index']
        ],
      ];