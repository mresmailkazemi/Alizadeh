<?php
class model_message extends model{

    function __construct()
    {
        parent::__construct();
    }
    function getMobileAllMember()
    {
        $this->doselect("SELECT mobile FROM tbl_user",array(),'',PDO::FETCH_COLUMN);
    }
}