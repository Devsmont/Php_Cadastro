<?php 




 namespace App\DAO;

 use \PDO;

 abstract class DAO 
 {

    protected $conexão;

    public function __construct()
    {
        $dsn = "mysql:host=" . $_ENV['db']['host'] . ";dbname=" . $_ENV['db']['database'];

        $this->conexão = new PDO($dsn, $_ENV['db']['user'], $_ENV['db']['pass']);
    }

 }