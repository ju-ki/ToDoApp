<?php
namespace db;

use db\BaseQuery;
use model\ValidateModel;
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
            return false;
        }
    }


    public static function registerTodo($user, $task)
    {
        $is_success = false;
        if (!ValidateModel::isValidTitle($task["title"]) || !ValidateModel::isValidDescription($task["description"]))
        {
            return $is_success;
        }
        try
        {
            $db = new BaseQuery;
            $sql = "insert into tasks(id, title, description, user_id) values(:id, :todo, :description, :user_id)";
            $db->transaction();
            $result = $db->executeSql($sql, [
                ":id" => uniqid(),
                ":todo" => $task["title"],
                ":description" => $task["description"],
                ":user_id" => $user["id"]
            ]);
            $is_success = true;
            $db->commit();
            return $is_success;
        }
        catch(Throwable $e)
        {
            $db->rollback();
            $is_success = false;
            echo $e->getMessage();
            return $is_success;
        }
    }


    public static function updateTodo($user, $task, $task_id)
    {
        $is_success = false;
        if (!ValidateModel::isValidTitle($task[$task_id . "title"]) || !ValidateModel::isValidDescription($task[$task_id . "description"]))
        {
            return $is_success;
        }
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
            $db->commit();
            return $is_success;
        }
        catch(Throwable $e)
        {
            $db->rollback();
            echo $e->getMessage();
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
            $db->commit();
            return $is_success;
        }
        catch(Throwable $e)
        {
            $db->rollback();
            echo $e->getMessage();
            return $is_success;
        }
    }
}



?>