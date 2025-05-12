<?php

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

    $routes = [
        '/' => 'controllers/index.php',
        '/about_us' => 'controllers/about_us.php',
        '/contact' =>'controllers/contact.php',

    ];

    function routeToController($uri, $routes){
        if(array_key_exists($uri, $routes)){
            require $routes[$uri];
        }else{
            abort();
        }

    }

    function abort($code){
        http_response_code($code);

        //for error display

        die();
    }

?>
