<?php
namespace controller\register;

use db\UserQuery;

function get()
{
    require_once SOURCE_PATH . "/views/register.php";
}

function post()
{
    $id = $_POST["user_name"];
    $pwd = $_POST["password"];
    $flag = UserQuery::registerUser($id, $pwd);
    if($flag)
    {
        echo "登録に成功しました";
    }
    else
    {
        echo "登録に失敗しました";
    }
}

 ?>