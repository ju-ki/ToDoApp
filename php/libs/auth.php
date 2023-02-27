<?php
namespace lib;
use db\UserQuery;

class Auth
{
    public static function login($id, $pwd)
    {
        $user = UserQuery::fetchUserId($id);
        if(!empty($user) && $user["del_flag"] != 1)
        {
            if (password_verify($pwd, $user["pwd"]))
            {
                echo "認証に成功しました";
            }
            else
            {
                echo "認証に失敗しました";
            }
        }
        else
        {
            echo "ユーザが削除されているかそのユーザーは存在しません";
        }
    }
}
 ?>