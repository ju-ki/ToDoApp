<?php
namespace db;

use db\BaseQuery;
use Throwable;

class UserQuery
{
    public static function fetchUserId($user_id)
    {
        try
        {
            $db = new BaseQuery;
            $sql = "select * from users where id = :id";
            $result = $db->selectOne($sql, [
                ":id" => $user_id
            ]);
            return $result;
        }
        catch(Throwable $e)
        {
            echo $e->getMessage();
        }
    }


    public static function registerUser($id, $pwd)
    {
        $is_success = false;
        try
        {
            $db = new BaseQuery;
            $sql = "insert into users(id, pwd, user_name) values(:id, :pwd, :user_name)";
            $db->transaction();
            $pwd = password_hash($pwd, PASSWORD_DEFAULT);
            $result = $db->executeSql($sql, [
                ":id" => $id,
                ":pwd" => $pwd,
                ":user_name" => "test3_user",
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