<?php
namespace controller\login;

use lib\Auth;

use function lib\redirect;

function get()
{
    \view\login\login();
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