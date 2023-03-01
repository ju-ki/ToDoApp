<?php
namespace controller\logout;

use lib\Auth;

use function lib\redirect;

function get()
{
    $is_success = Auth::logout();
    if ($is_success)
    {
        redirect('home');
    }
    else
    {
        echo "ログアウトに失敗しました";
    }
}
?>