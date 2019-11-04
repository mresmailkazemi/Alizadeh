<?php

class model_addmember extends model{

    function __construct()
    {
        parent::__construct();
    }

    function validation()
    {
        $flag = "";
        if (@$_POST['name'] == null || @$_POST['family'] == null || @$_POST['birthday'] == null || @$_POST['address'] == null || @$_POST['mobile'] == null) {
            return $flag = "فیلد های اجباری نمی تواند خالی باشد";}

            return $flag;

        }
    }
//        function forwardInfo(){
//            $sql="INSERT INTO tbl_user_info ";

//        }
//}
