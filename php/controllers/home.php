<?php 
namespace controller\home;
use db\TaskQuery;
use model\SessionModel;

use function lib\redirect;

function get()
{
    if(!empty($_SESSION['_user']))
    {
        $user_name = SessionModel::getSession("_user")["user_name"];
        $todos = TaskQuery::fetchTodo($user_name);
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
    if(isset($_POST["add_button"]))
    {
        $user = SessionModel::getSession("_user");
        $title = $_POST["title"];
        $description = $_POST["description"];
        $is_success = TaskQuery::registerTodo($user, $title, $description);
        if($is_success)
        {
            redirect("home");
            die();
        }
        else
        {
            echo "タスクの追加に失敗しました";
        }
    }
    else if(isset($_POST["delete_button"]))
    {
        redirect("");
        die();
    }
}
?>