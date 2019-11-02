<?php
class model_dashboard extends model{


    function __construct()
    {
        parent::__construct();
    }
    function user(){

        $sql="SELECT * from tbl_user";
        $result=$this->doselect($sql);
        return $result;
    }
}