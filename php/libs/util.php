<?php
namespace lib;


function redirect($path)
{
    if($path == "referer")
    {
        $path = $_SERVER['HTTP_REFERER'];
    }
    else if($path == "")
    {
        $path = "home";
    }
    header("Location: {$path}");
    die();
}

function get_url($path)
{
    return BASE_PATH . trim($path, "/");
}

?>