<?php

class model_login extends model
{
    function __construct()
    {
        parent::__construct();
    }

    function goCheckPass($result)
    {
        $bool = self::verify($_POST['password'], $result[0]['password']);
        if ($bool == 1) {
       //     session_destroy();
            if ($result[0]['permission'] == 0)
                $_SESSION['operator'] = $result[0]['id'];
            elseif ($result[0]['permission'] == 1)
                $_SESSION['admin'] = $result[0]['id'];

        }
        return $bool;
    }


    function checkUser()
    {
        $sql = "SELECT * FROM tbl_user WHERE username=?";
        $stmt = self::$conn->prepare($sql);
        $stmt->bindValue(1, @$_POST['username']);
        $stmt->execute();
        $result = $stmt->fetchAll(pdo::FETCH_ASSOC);
        return $result;

    }

    function validation()
    {
        $flag = "";
        if (@$_POST['username'] == null || @$_POST['password'] == null) {
            return $flag = "پسورد یا نام کابری نمی تواند خالی باشد";
        }
        $lenghtuser = strlen(@$_POST['username']);
        $lenghtpass = strlen(@$_POST['password']);
        if ($lenghtpass > 100 || $lenghtuser > 200) {
            return $flag = "مقادیر بیش از انداه استاندارد";
        }
        return $flag;
    }
}
