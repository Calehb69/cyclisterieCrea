<?php
namespace Database;

class PdoMySQL 
{

    public static $currentPdo = null;

    /**
    * Retourne un objet PDO pour intéragir avec la base de données
    * 
    * @return \PDO
    * 
    * 
    */
 public static function getPdo():\PDO{

     if(self::$currentPdo === null){

         self::$currentPdo = new \PDO("mysql:host=localhost;dbname=magasinvelos;charset=utf8", "Master","pass", [
             \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
             \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_OBJ
         ]);
     }

   
           return self::$currentPdo;
   
   }
}
