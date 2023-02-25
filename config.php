<?php
$url = $_SERVER['REQUEST_URI'];
define('CURRENT_URI', $url);
if(preg_match("/(.+(todoApp))/i", $url, $match))
{
    define('BASE_PATH', $match[0] . "/");
}
// define('BASE_PATH', CURRENT_URI . "/");

define('IMAGE_PATH', BASE_PATH. 'images/');
define('JS_PATH', BASE_PATH. 'js/');
define('CSS_PATH', BASE_PATH. 'css/');
define('SOURCE_PATH', __DIR__. '/php/');
define('DEBUG', true);
?>
