<?php
namespace controller\home;
use db\TaskQuery;
use model\SessionModel;

use function lib\redirect;

function get()
{
    if(!empty($_SESSION['_user']))
    {
        $user_id = SessionModel::getSession("_user")["id"];
        $todos = TaskQuery::fetchTodo($user_id);
        \view\home\index($todos);
    }
    else
    {
        $todos = [];
        \view\home\index($todos);
    }
}

function post()
{
    $user = SessionModel::getSession("_user");
    if(isset($_POST["add_button"]))
    {
        $task = $_POST;
        var_dump($task);
        $is_success = TaskQuery::registerTodo($user, $task);
        redirect("home");
        die();
    }
    else if(isset($_POST["delete_button"]))
    {
        $task_id = $_POST["delete_button"];
        $is_success = TaskQuery::deleteTodo($user, $task_id);
        redirect("");
        die();
    }
    else if(isset($_POST["fix_button"]))
    {
        $task_id = $_POST["fix_button"];
        $task = $_POST;
        $is_success = TaskQuery::updateTodo($user, $task, $task_id);
        redirect("");
        die();
    }
    else if(isset($_POST["done_button"]))
    {
        echo "Done";
    }
}
?>