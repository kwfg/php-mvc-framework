<?php

//namespace , if we calling outside this file , we have to Core\Database
namespace Core;

//to access PDO , for solving the error that can't access PDO when added the namespace
use PDO;

//Connect to the database, and execute a query
class Database {
    //global variable in this class , if in this class can access
    public $connection;

    //in real life , maybe protected
    public $statement;
    public function __construct($config , $username = 'root' , $password = '') {

        //result : host=localhost;port=3306;dbname=myapp;charset=utf8mb4
        //adding mysql: in front

        //it same as below
        $dsn = 'mysql:' . http_build_query($config,'',';');

        //db info
        //$dsn = "mysql:host={$config['host']};port={$config['port']};dbname={$config['dbname']};charset={$config['charset']}";
        $this->connection = new PDO($dsn , $username, $password,[
            //default to set PDO::FETCH_ASSOC
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }
    public function query($query , $params = []){

        //assign to statement , because it can let any method that need to access
        $this->statement = $this->connection->prepare($query);

        $this->statement->execute($params);

        //return the object itself (Database class)
        return $this;
    }

    //our own method
    public function get(){
        return $this->statement->fetchAll();
    }

    public function find(){
        return $this->statement->fetch();
    }

    public function findOrFail(){
        $result = $this->find();

        if(! $result){
            abort();
        }

        return $result;
    }
}