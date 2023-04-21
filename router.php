<?php
namespace Url;
require_once(__DIR__.'/vendor/autoload.php');
use Core\Router;
$router = new Router();

$router->mount('', function() use ($router){
    $router->get('/login', function(){
        require_once('./view/login.php');
    });
    $router->get('/entrar', function(){
        require_once('./view/admin/index.php');
    });
});
$router->set404(function() {
    header('HTTP/1.1 404 Not Found');
    echo "ERROR 404 . La pagina no existe";
});
$router->run();