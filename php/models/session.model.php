<?php
namespace model;

class SessionModel
{

    public static function setSession($val, $session_name=null)
    {
        $_SESSION[$session_name] = $val;
        if(!empty($session_name))
        {
            echo "session_nameを入力してください";
        }
    }

    public static function clearSession()
    {
        static::setSession(null, "_user");
    }

    public static function getSession($session_name=null)
    {
        return $_SESSION[$session_name];
    }
}
?>