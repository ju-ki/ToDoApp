<?php
namespace controller\login;

use lib\Auth;


function get()
{
    require_once SOURCE_PATH . "views/login.php";
}

function post()
{
    $id = $_POST["user_name"];
    $pwd = $_POST["password"];
    Auth::login($id, $pwd);
}
?>