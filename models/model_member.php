<?php
class model_member extends model{

    function __construct()
    {
        parent::__construct();
    }

    function getMember(){
        $sql="SELECT * FROM tbl_user_info";
        $stmt = self::$conn->prepare($sql);

       $result = $stmt->fetchAll();
        print_r($result);
//        return $this->doselect($sql);
    }
}
