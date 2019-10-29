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
        $sql = "SELECT * FROM tbl_user WHERE mobile=?";
        $stmt = self::$conn->prepare($sql);
        $stmt->bindValue(1, @$_POST['mobile']);
        $stmt->execute();
        $result = $stmt->fetchAll(pdo::FETCH_ASSOC);
        return $result;
        

    }

    function validation()
    {
        $flag = "";
        if (@$_POST['mobile'] == null || @$_POST['password'] == null) {
            return $flag = "پسورد یا نام کابری نمی تواند خالی باشد";
        }
        $lenghtmobile = strlen(@$_POST['mobile']);
        $lenghtpass = strlen(@$_POST['password']);
        if ($lenghtmobile !=11) {
            return $flag = "شماره موبایل به صورت صحیح وارد شود";
        }
        if
            ($lenghtpass >20)
        {
            return $flag="رمز عبور بیش از حد مجاز است";
        }
        if
        ($lenghtpass < 6)
        {
            return $flag="رمز عبور حداقل 6 رقمی باید باشد";
        }
        if (!is_numeric($_POST['mobile']))
        return $flag="شماره همراه نامعتبر است";

        return $flag;
    }
}
