<?php
class database
{
private static $dsn = 'mysql:host=localhost;dbname=ban_sach';
private static $username='root';
private static $password='';
private static $db;

private function __construct() 
{
  self::getDB();  
}
public static function getDB()
    {
        if(!isset(self::$db))
        {
             try
              {
                self::$db= new PDO(self::$dsn,self::$username,self::$password);

              }
           catch(PDOException $e)
              {
             $error = $e->getMessage();
              include("../view/loi.php");
              exit();
              }
        }
        return self::$db;    
    }
}
?>