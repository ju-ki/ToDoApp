<?php
namespace db;

use db\BaseQuery;
use Throwable;

class UserQuery
{
    public static function fetchUserId($user_name)
    {
        try
        {
            $db = new BaseQuery;
            $sql = "select * from users where user_name = :name";
            $result = $db->selectOne($sql, [
                ":name" => $user_name
            ]);
            return $result;
        }
        catch(Throwable $e)
        {
            echo $e->getMessage();
        }
    }


    public static function registerUser($user_name, $pwd)
    {
        $is_success = false;
        try
        {
            $db = new BaseQuery;
            $sql = "insert into users(id, pwd, user_name) values(:id, :pwd, :user_name)";
            $db->transaction();
            $pwd = password_hash($pwd, PASSWORD_DEFAULT);
            $result = $db->executeSql($sql, [
                ":id" => uniqid(),
                ":pwd" => $pwd,
                ":user_name" => $user_name,
            ]);
            $is_success = true;
        }
        catch(Throwable $e)
        {
            $db->rollback();
            $is_success = false;
            echo $e->getMessage();
        }
        finally
        {
            if ($is_success)
            {
                $db->commit();
            }
            return $is_success;
        }
    }
}
?>