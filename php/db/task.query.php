<?php
namespace db;

use db\BaseQuery;
use Throwable;

class TaskQuery
{
    public static function fetchTodo(string $user_name)
    {
        try
        {
            $db = new BaseQuery;
            $sql = "select * from tasks where user_id = :id";
            $result = $db->select($sql, [
                ":id" => $user_name
            ]);
            return $result;
        }
        catch(Throwable $e)
        {
            echo $e->getMessage();
        }
    }


    public static function registerTodo($user, $todo, $description="")
    {
        $is_success = false;
        try
        {
            $db = new BaseQuery;
            $sql = "insert into tasks(title, description, user_id) values(:todo, :description, :user_id)";
            $db->transaction();
            $result = $db->executeSql($sql, [
                ":todo" => $todo,
                ":description" => $description,
                ":user_id" => $user["user_name"]
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
            if($is_success)
            {
                $db->commit();
            }
            return $is_success;
        }
    }
}



?>