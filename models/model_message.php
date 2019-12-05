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
    function getMobileDebtorMember()
    {
        return $this->doselect("SELECT mobile FROM tbl_tuition WHERE end_date<CURDATE() AND sms_count<3",array(),'',PDO::FETCH_COLUMN);
    }
    function sendSms($mobile)
    {










    }
    function updateCount($ids)
    {
        $id=join(',',$ids);
        return $this->doselect("UPDATE tbl_tuition SET sms_count=sms_count+1 WHERE id IN (' . $id . ') ",array(),'',PDO::FETCH_COLUMN);
    }
}