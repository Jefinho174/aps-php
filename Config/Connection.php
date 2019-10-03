<?php
namespace Config;


 class  Connection{

    public static function GetConnection(){
        try {
            $conn = new \PDO('mysql:host=localhost;dbname=aps_lpw', "root", "root");
            $conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch (\PDOException $e) {
        
            $alert = "<div class='alert alert-danger'><strong>Erro!</strong>{$e->getMessage()}</div";
            echo $alert;
        }
    }
}

