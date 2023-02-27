<?php
namespace db;

use db\BaseQuery;
use Throwable;

class TaskQuery
{
    public static function fetchTodo(string $user_id)
    {
        try
        {
            $db = new BaseQuery;
            $sql = "select * from tasks where user_id = :id";
            $result = $db->select($sql, [
                ":id" => $user_id
            ]);
            return $result;
        }
        catch(Throwable $e)
        {
            echo $e->getMessage();
        }
    }


    public static function registerTodo()
    {
        $is_success = false;
        try
        {
            $db = new BaseQuery;
            $sql = "insert into tasks(title, description) values(:todo, :description) where user_id = :id";
            $db->transaction();
            $result = $db->executeSql($sql, [
                ":todo" => "something2",
                ":description" => "nothing",
                ":id" => "test2"
            ]);
            $is_success = true;
        }
        catch(Throwable $e)
        {
            $db->rollback();
            $is_success = false;
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