<?php
require_once 'config.php';



try
{
    require_once SOURCE_PATH . "partials/header.php";
    $path = str_replace(BASE_PATH, '', $_SERVER['REQUEST_URI']);

    $method = strtolower($_SERVER['REQUEST_METHOD']);
    if ($path === '')
    {
        $path = "home";
    }
    $targetFile = SOURCE_PATH . "controllers/{$path}.php";

    if(!file_exists(($targetFile)))
    {
        require_once SOURCE_PATH . "views/404.php";
        return;
    }
    require_once $targetFile;
    $fn = "\\controller\\{$path}\\{$method}";
    $fn();

}
catch(Throwable $e)
{
    die('<h1>Something is Wrong</h1>');
}


?>