<?php
namespace controller\login;

function get()
{
    require_once SOURCE_PATH . "views/login.php";
}

function post()
{
    echo "POST Methodが実行されました";
}
?>