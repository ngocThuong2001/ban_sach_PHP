<?php
class session
{


    public static function set($key,$value)
    {
        $_SESSION[$key]=$value;
    }

    public static function get($key)
    {
        if(isset($_SESSION[$key]))
        {
            return $_SESSION[$key];
        }
        else
        {
            return false;

        }

    }

    public static function check_session()
    {
        
        if(self::get("login") == false)
        {
            self::destroy();
            header("location:dang_nhap.php");
        }
    }

    public static function check_login()
    {
        
        if(self::get("login") == true)
        {
            header("location:../");
        }
    }

    public static function destroy()
    {
        session_destroy();
    }
}
?>