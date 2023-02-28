<?php
namespace controller\login;

use lib\Auth;

use function lib\redirect;

function get()
{
    require_once SOURCE_PATH . "views/login.php";
}

function post()
{
    $user_name = $_POST["user_name"];
    $pwd = $_POST["password"];
    $is_success = Auth::login($user_name, $pwd);
    if($is_success)
    {
        redirect("home");
    }
    else
    {
        redirect("referer");
    }
}
?>