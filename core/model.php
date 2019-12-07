<?php

class Model
{
    public static $conn = '';

    function __construct()
    {
        self::$conn = new PDO('mysql:host=localhost;dbname=alizadeh', 'root', '');
        self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        self::$conn->exec('set names utf8');
        require_once 'public/Shamsi/jdf.php';
    }
    public static function miladiToShamsi($date, $separate = "")
    {
        $ex = explode('-', $date);
        if ($separate == "") {
            return gregorian_to_jalali($ex[0], $ex[1], $ex[2]);
        } else {
            return gregorian_to_jalali($ex[0], $ex[1], $ex[2], '/');
        }
    }
    public function changeDate($dateShamsi)
    {
        $expire = explode('/', $dateShamsi);
        $expire = jalali_to_gregorian($expire[0], $expire[1], $expire[2], '-');
        return date("Y-m-d", strtotime($expire));
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
    function doQuery($sql, $values = [])
    {

        $stmt = self::$conn->prepare($sql);

        foreach ($values as $key => $value) {

            $stmt->bindValue($key + 1, $value);

        }
        $stmt->execute();
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
    function updateCounterSms($num)
    {
        $this->doQuery("UPDATE tbl_option SET val=val+?",array($num));
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
    public static function getIdGiveCredit($id)
    {
        $sql = "SELECT * FROM tbl_tuition where userId=?";
        $stmt=self::$conn->prepare($sql);
        $stmt->bindValue(1,$id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public static function getAllStatus()
    {
        $sql = 'SELECT * FROM status';
        $stmt = self::$conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(Pdo::FETCH_ASSOC);
    }
}