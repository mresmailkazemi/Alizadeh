<?php

class Model{


    public static $conn = '';

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
    public static function generateHash($password)
    {
        if (defined("CRYPT_BLOWFISH") && CRYPT_BLOWFISH) {
            $salt = '$2y$11$' . substr(md5(uniqid(rand(), true)), 0, 22);
            return crypt($password, $salt);
        }
    }

    public static function verify($password, $hashedPassword)
    {
        return crypt($password, $hashedPassword) == $hashedPassword;
    }

}
