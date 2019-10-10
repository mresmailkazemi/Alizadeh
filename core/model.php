<?php

class Model{



    function __construct()
    {

        $servername = 'localhost';
        $username = 'root';
        $password = '';
        $dbname = 'test';
        self::$conn = new PDO('mysql:host=' . $servername . ';dbname=' . $dbname, $username, $password);
        self::$conn->exec('set names utf8');

    }
    function doselect($sql, $values=[],$fetch='',$fetchstyle=PDO::FETCH_ASSOC)
    {

        $stmt = self::$conn->prepare($sql);

        foreach ($values as $key => $value) {

            $stmt->bindValue($key + 1, $value);

        }
        $stmt->execute();
        if ($fetch == '') {
            $result = $stmt->fetchAll($fetchstyle);
        } else {
            $result = $stmt->fetch($fetchstyle);
        }
        return $result;
    }


}
