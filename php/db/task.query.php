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


    public static function registerTodo($user, $todo, $description="")
    {
        $is_success = false;
        try
        {
            $db = new BaseQuery;
            $sql = "insert into tasks(id, title, description, user_id) values(:id, :todo, :description, :user_id)";
            $db->transaction();
            $result = $db->executeSql($sql, [
                ":id" => uniqid(),
                ":todo" => $todo,
                ":description" => $description,
                ":user_id" => $user["id"]
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


    public static function updateTodo($user, $task, $task_id)
    {
        $is_success = false;
        try
        {
            $db = new BaseQuery;
            $sql = "update
                        tasks
                    set
                        title = :todo, description = :description
                    where
                        user_id = :user_id and id = :task_id";
            $db->transaction();
            $db->executeSql($sql, [
                ":todo" => $task[$task_id . "_title"],
                ":description" => $task[$task_id . "_description"],
                ":user_id" => $user["id"],
                ":task_id"=> $task_id
            ]);
            $is_success = true;
        }
        catch(Throwable $e)
        {
            $db->rollback();
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


    public static function deleteTodo($user, $task_id)
    {
        $is_success = false;
        try
        {
            $db = new BaseQuery;
            $sql = "delete from tasks where user_id = :user_id and id = :task_id";
            $db->transaction();
            $db->executeSql($sql, [
                ":user_id"=>$user["id"],
                ":task_id"=>$task_id
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