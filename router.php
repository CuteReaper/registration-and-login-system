<?php
echo "2 router <br>";
$uri = $_SERVER["REQUEST_URI"];
$uri = (parse_url($uri)["path"]);

$router = [
    "/"=> "./controller/index.php",
    "/register" => "./controller/register.php",
    "/login" => "./controller/login.php"
];

foreach (array_keys($router) as $route) {
        if ($uri === $route){
            require ($router[$uri]) ;
            dd($router[$uri]) ;
            echo "2 router 1 <br>";

        }
};