<?php
defined("_Can_access_") or die("Inclusion directe non autorisée");
class Database
{
    const DB_HOST = 'mysql:host=db5000728484.hosting-data.io;dbname=dbs665344;charset=utf8';
    const DB_USER = 'dbu854994';
    const DB_PASS = '@WelcomeToMyNightmare2020';

    public function getConnection()
    {
        try{
            $connection = new PDO(self::DB_HOST, self::DB_USER, self::DB_PASS);
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $connection;
        }
        catch(Exception $errorConnection)
        {
            die ('Erreur de connection :'.$errorConnection->getMessage());
        }
    }
}
