<?php
namespace controller\register;

function get()
{
    require_once SOURCE_PATH . "/views/register.php";
}

function post()
{
    echo "Register画面でPOSTが実行されました";
}

 ?>