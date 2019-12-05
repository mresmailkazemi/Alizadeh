<?php

class Model
{
    public static $conn = '';

    function __construct()
    {

        self::$conn = new PDO('mysql:host=localhost;dbname=alizadeh', 'root', '');
        self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        self::$conn->exec('set names utf8');

    }

    function doselect($sql, $values = [], $fetch = '', $fetchstyle = PDO::FETCH_ASSOC)
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

    function getMember()
    {
        $sql = "SELECT * FROM tbl_user_info";
        return $this->doselect($sql);
    }
    public static function getStatus($id)
    {
        $sql = "SELECT * FROM status where id=?";
        $stmt=self::$conn->prepare($sql);
        $stmt->bindValue(1,$id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);

    }
    public static function getMobile($id)
    {
        $sql = "SELECT * FROM tbl_user where id=?";
        $stmt=self::$conn->prepare($sql);
        $stmt->bindValue(1,$id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);

    }
}