<?php

namespace application\lib;

use application\core\Views;
use http\Params;
use PDO;


class Database
{
    protected $connect;

    public function __construct()
    {
        $db = require_once 'application/config/database.php';
        $db = $db['mysql'];
        $this->connect = new PDO('mysql:host=' . $db['host'] . ';dbname=' . $db['database'] . '', $db['user'], $db['password']);
    }

    public function query($sql, $params = [])
    {

        $stmt = $this->connect->prepare($sql);
        if(!empty($params)){
            foreach ($params as $key => $val){
                $stmt->bindValue(':'. $key, $val);
            }
        }
        $stmt->execute();
        return $stmt;
    }

    public function row($sql, $params = [])
    {
        $result = $this->query($sql, $params = []);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function column($sql, $params)
    {

        $result = $this->query($sql, $params);
        return $result->fetchColumn();

    }
}

