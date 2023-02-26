<?php
namespace view\register;
?>

<h1>Register Page</h1>
<form action="<?php ?>" method="post">
    <div class="user_name">
        <label for="user_name">ユーザー名</label>
        <input type="text" name="user_name" id="user_name">
    </div>
    <div class="password">
        <label for="password">パスワード</label>
        <input type="password" name="password" id="password">
    </div>
    <div class="email">
        <label for="email">メールアドレス</label>
        <input type="email" name="email" id="email" placeholder="test@example.com">
    </div>
    <div class="submit">
        <input type="submit" value="Register">
    </div>

</form>