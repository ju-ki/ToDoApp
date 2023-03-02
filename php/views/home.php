<?php

namespace view\home;

function index($todos)
{
?>
<?php
if(!empty($_SESSION['_user']["user_name"]))
{
    echo $_SESSION['_user']["user_name"] . "でログイン中です";
}
else
{
    echo "ログインしていません";
}
?>

<a href="<?php echo BASE_PATH . 'login'; ?>">Login</a>
<a href="<?php echo BASE_PATH . 'register'; ?>">Register</a>
<a href="<?php echo BASE_PATH . 'logout'; ?>">Logout</a>

<?php if(!empty($_SESSION['_user']["user_name"])) :?>
<h3>タスクの追加</h3>
<form action="<?php ?>" method="POST">
    <div class="title">
        <input type="text" name="title" id="">
    </div>
    <div class="description">
        <input type="text" name="description" id="">
    </div>
    <div class="add todo">
        <input type="hidden" name="add button" value="add">
        <input type="submit" value="Add">
    </div>
</form>
<h3>タスクリスト</h3>
<?php foreach($todos as $todo):?>
    <form action="" method="post">
        <input type="text" name="<?php echo $todo['id']?>_title" value="<?php echo $todo["title"] ?>">
        <input type="text" name="<?php echo $todo['id']?>_description" value="<?php echo $todo["description"] ?>">
        <input type="hidden" name="fix button" value="<?php echo $todo['id']?>">
        <input type="submit" value="Fix">
    </form>
    <form action="" method="POST">
        <input type="hidden" name="done button" value="<?php echo $todo['status']?>">
        <input type="submit" value="Done">
    </form>
    <form action="" method="POST">
        <input type="hidden" name="delete button" value="<?php echo $todo['id']?>">
        <input type="submit" value="Delete">
    </form>
<?php endforeach; ?>
<?php else: ?>
<h1>Welcome to Todo App</h1>
<?php endif; ?>
<?php
};
?>