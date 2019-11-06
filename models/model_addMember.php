<?php


class model_addMember extends model
{


    function __construct()
    {
        parent::__construct();
    }

    function validation()
    {
        $flag = "";
        if (@$_POST['name'] == null || @$_POST['family'] == null || @$_POST['mobile'] == null) {
            return $flag = "فیلد های اجباری نمی تواند خالی باشد";
        }

        return $flag;

    }


    function insertmobile(){

        $pass=Model::generateHash('alizadeh');
        $sql = "INSERT INTO tbl_user (mobile, password, statusId) VALUES (?,?,?)";
        $stmt = self::$conn->prepare($sql);
        $stmt->bindValue(1, $_POST['mobile']);
        $stmt->bindValue(2, $pass);
        $stmt->bindValue(3, 3);
        $stmt->execute();
    }
    function insertuition($userId){

        $sql = "INSERT INTO tbl_tuition (userid,start_date,end_date) VALUES (?,?,?)";
        $stmt = self::$conn->prepare($sql);
        $stmt->bindValue(1,$userId );
        $stmt->bindValue(2, $_POST['start_date']);
        $stmt->bindValue(3, $_POST['end_date']);
        $stmt->execute();
    }

    function getUserId(){

        return $this->doselect('SELECT  id FROM tbl_user where mobile=?',array($_POST['mobile']),1);
    }
    function forwardInfo($userId)
    {
        $sql = "INSERT INTO tbl_user_info ( sex, birthday, dateCreat, family,parentname,name,Address,status,userid) VALUES (?,?,?,?,?,?,?,?,?)";
        $stmt = self::$conn->prepare($sql);
        $stmt->bindValue(1, $_POST['sex']);
        $stmt->bindValue(2, $_POST['birthday']);
        $stmt->bindValue(3, date('Y-m-d H:i:s'));
        $stmt->bindValue(4, $_POST['family']);
        $stmt->bindValue(5, $_POST['parentname']);
        $stmt->bindValue(6, @$_POST['name']);
        $stmt->bindValue(7, $_POST['Address']);
        $stmt->bindValue(8, 3);
        $stmt->bindValue(9, $userId);

        $stmt->execute();
    }
}