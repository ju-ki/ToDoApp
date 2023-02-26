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
}



?>