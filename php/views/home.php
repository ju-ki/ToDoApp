<?php

namespace view\home;
use db\TaskQuery;
function index($todos)
{
?>

<h1>Welcome to Todo App</h1>
<a href="<?php echo BASE_PATH . 'login'; ?>">Login</a>
<a href="<?php echo BASE_PATH . 'register'; ?>">Register</a>
<?php foreach($todos as $todo):?>
    <h3><?php echo $todo["title"] ?></h3>
    <h5><?php echo $todo["description"] ?></h5>
<?php endforeach; ?>
<?php 
};
?>