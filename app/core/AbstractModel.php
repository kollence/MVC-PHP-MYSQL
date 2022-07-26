<?php
require_once('DatabaseConnection.php');

abstract class AbstractModel
{
    //ALL MODELS WITH AbstractModel class WILL HAVE SINGLETONE CONNECTION TO DB
    protected $dbconn;

    public function __construct()
    {
        $dbinstance = DatabaseConnection::getInstance();
        $this->dbconn = $dbinstance->getConnection();
    }



}




?>
