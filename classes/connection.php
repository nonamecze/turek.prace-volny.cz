<?php

class connection
{
    private $dbname;
    private $user;
    private $password;
    private $connection;

    public function __construct()
    {
       $this->dbname = '366dnizakatrem';
       $this->user = 'postgres';
       $this->password = 'postgres';

       $this->connection = $this->createConnection();
    }

    private function createConnection()
    {

        $connString = $this->createConnectionString();
        $cn = pg_connect($connString);
        if ($cn) {
            return $cn;
        } else {
            echo("connection error");
            return -1;
        }
    }

    private function createConnectionString():string
    {
        return 'host=localhost port=5432 dbname='.$this->dbname.' user='.$this->user.' password='.$this->password;
    }

    public function fetchData($sql): object
    {
        $dataObject = pg_query($this->connection, $sql);
        $rows = pg_fetch_object($dataObject);
        return $rows;
    }

}