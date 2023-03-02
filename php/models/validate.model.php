<?php
namespace model;

use function lib\escape;

class ValidateModel
{
    public static function ValidateUserName($val)
    {
        $val = escape($val);
        if($val == "")
        {
            return false;
        }
        if(mb_strlen($val) > 10)
        {
            return false;
        }
        return true;
    }


    public static function isValidUserName($val)
    {
        return static::ValidateUserName(($val));
    }


    public static function ValidatePassword($val)
    {
        $val = escape($val);
        if($val == "")
        {
            return false;
        }
        if(strlen($val) < 4)
        {
            return false;
        }
        return true;
    }


    public static function isValidPassword($user)
    {
        return static::ValidatePassword($user);
    }


    public static function ValidateTitle($val)
    {
        $val = escape($val);
        if($val == "")
        {
            return false;
        }
        if(mb_strlen($val) > 20)
        {
            return false;
        }
        return true;
    }


    public static function isValidTitle($val)
    {
        return static::ValidateTitle($val);
    }



    public static function ValidateDescription($val)
    {
        $val = escape($val);
        if($val == "")
        {
            return false;
        }
        if(mb_strlen($val) > 256)
        {
            return false;
        }
        return true;
    }


    public static function isValidDescription($val)
    {
        return static::ValidateDescription($val);
    }

}
?>