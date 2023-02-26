<?php

use function lib\router;

require_once 'config.php';

require_once SOURCE_PATH . 'views/home.php';

require_once SOURCE_PATH . "db/query.php";
require_once SOURCE_PATH . "db/task.query.php";

require_once SOURCE_PATH . "libs/router.php";



try
{
    require_once SOURCE_PATH . "partials/header.php";
    router();
}
catch(Throwable $e)
{
    die('<h1>Something is Wrong</h1>');
}


?>