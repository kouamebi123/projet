<?php

namespace Core\Database;

use \PDO;

class MysqlDatabase extends Database {
    private $db_name;
    private $db_user;
    private $db_pass;
    private $db_host;
    private $pdo;


    public function __construct($db_name, $db_user, $db_pass, $db_host){
        $this->db_name = $db_name;
        $this->db_user = $db_user;
        $this->db_pass = $db_pass;
        $this->db_host = $db_host;
    }

    private function getPDO(){
        if($this->pdo === null){
            $pdo = new PDO('mysql:dbname=test;host=localhost','root','');
            $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo = $pdo;
            
        }
        return $this->pdo;
    }

    public function query($statement, $class_name = null, $one = false){
        $res = $this->getPDO()->query($statement);
        if(
            strpos($statement, 'UPDATE') === 0||
            strpos($statement, 'UPDATE') === 0||
            strpos($statement, 'UPDATE') === 0
            ){
                return $res;
            }
        if($class_name ===null){
            $req->setFetchMode(PDO::FETCH_OBJ);
        }else{
            $req->setFetchMode(PDO::FETCH_CLASS, $class_name);
        }
        
        if($one){
            $datas = $req->fetch();
        } else{
            $datas = $req->fetchAll();
        }
        return $datas;
    }   

    public function insert($statement, $attributes){
        $inserer = $this->getPDO()->prepare($statement);
        $inserer = $inserer->execute($attributes);
    }

    public function prepare($statement, $attributes,$class_name = null, $one = false){
        $req = $this->getPDO()->prepare($statement);
        $res = $req->execute($attributes);
        if(
            strpos($statement, 'UPDATE') === 0||
            strpos($statement, 'UPDATE') === 0||
            strpos($statement, 'UPDATE') === 0
            ){
                return $res;
            }
        if($class_name ===null){
            $req->setFetchMode(PDO::FETCH_OBJ);
        }else{
            $req->setFetchMode(PDO::FETCH_CLASS, $class_name);
        }
        if($one){
            $datas = $req->fetch();
            
        } else{
            $datas = $req->fetchAll();
        }
        
        return $datas;


    }


}