<?php
class model_member extends model{

    function __construct()
    {
        parent::__construct();
    }

    function getMember(){

        $sql="SELECT * FROM tbl_user";
        $result=$this->doselect($sql);
        return $result;

    }
}
