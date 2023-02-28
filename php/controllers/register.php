<?php
namespace controller\register;

use db\UserQuery;
use lib\Auth;

use function lib\redirect;

function get()
{
    require_once SOURCE_PATH . "/views/register.php";
}

function post()
{
    $user_name = $_POST["user_name"];
    $pwd = $_POST["password"];
    $is_success = Auth::register($user_name, $pwd);
    if($is_success)
    {
        echo "登録に成功しました";
        redirect("home");
    }
    else
    {
        echo "登録に失敗しました";
        redirect("referer");
    }
}

 ?>