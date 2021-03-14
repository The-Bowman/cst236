<?php

class Database
{
    private $serverName = 'localhost';
    private $dbName = 'cst_236';
    private $username = 'root';
    private $password = 'root';

    function getConnection()
    {
        $con = new mysqli($this->serverName, $this->username, $this->password, $this->dbName);

        if ($con->connect_error) {
            echo "Connection failed " . $con->connect_error . "<br>";
        } else {
            return $con;
        }
    }
}