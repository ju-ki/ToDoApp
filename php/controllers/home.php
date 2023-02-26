<?php 
namespace controller\home;
use db\TaskQuery;

function get()
{
    $todos = TaskQuery::fetchTodo("test2");
    \view\home\index($todos);
}
 ?>