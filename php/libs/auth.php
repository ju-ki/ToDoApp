<?php
namespace lib;
use db\UserQuery;
use model\SessionModel;
use Throwable;

class Auth
{
    public static function login($id, $pwd)
    {
        $is_success = false;
        $user = UserQuery::fetchUserId($id);
        if(!empty($user) && $user["del_flag"] != 1)
        {
            if (password_verify($pwd, $user["pwd"]))
            {
                try
                {
                    SessionModel::setSession($user, "_user");
                    $is_success = true;
                    echo "認証に成功しました";
                    return $is_success;
                }
                catch(Throwable $e)
                {
                    echo $e->getMessage();
                }
            }
            else
            {
                echo "パスワードが間違っています";
            }
        }
        else
        {
            echo "ユーザが削除されているかそのユーザーは存在しません";
        }
        return $is_success;
    }

    public static function register($user_name, $pwd)
    {
        $is_success = false;
        $is_success = UserQuery::registerUser($user_name, $pwd);
        if($is_success)
        {
            $user = UserQuery::fetchUserId($user_name);
            SessionModel::setSession($user, "_user");
        }
        return $is_success;
    }

    public static function logout()
    {
        try{
            SessionModel::clearSession();
        }
        catch(Throwable $e)
        {
            echo $e->getMessage();
            return false;
        }
        return true;
    }


    public static function isLogin()
    {
    }
}
?>