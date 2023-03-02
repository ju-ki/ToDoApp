<?php

use function lib\router;

require_once 'config.php';

require_once SOURCE_PATH . 'views/home.php';
require_once SOURCE_PATH . 'views/login.php';
require_once SOURCE_PATH . 'views/register.php';

require_once SOURCE_PATH . "db/base.query.php";
require_once SOURCE_PATH . "db/task.query.php";
require_once SOURCE_PATH . "db/user.query.php";

require_once SOURCE_PATH . "libs/router.php";
require_once SOURCE_PATH . "libs/auth.php";
require_once SOURCE_PATH . "libs/util.php";

require_once SOURCE_PATH . "models/session.model.php";
require_once SOURCE_PATH . "models/validate.model.php";


session_start();

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