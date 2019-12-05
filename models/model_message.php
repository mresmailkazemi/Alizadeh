<?php

class model_message extends model
{

    function __construct()
    {
        parent::__construct();
    }

    function getMobileAllMember()
    {
        return $this->doselect("SELECT mobile FROM tbl_user", array(), '', PDO::FETCH_COLUMN);
    }

    function getMobileDebtorMember()
    {
        return $this->doselect("SELECT id FROM tbl_tuition WHERE end_date<CURDATE() AND sms_count<3", array(), '', PDO::FETCH_COLUMN);
    }

    function sendSms($mobile, $text)
    {
        $url = "https://ippanel.com/services.jspd";

        $rcpt_nm = array($mobile);
        $param = array
        (
            'uname' => 'faraz09196145343',
            'pass' => '0371477905',
            'from' => '+983000505',
            'message' => $text,
            'to' => json_encode($rcpt_nm),
            'op' => 'send'
        );

        $handler = curl_init($url);
        curl_setopt($handler, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($handler, CURLOPT_POSTFIELDS, $param);
        curl_setopt($handler, CURLOPT_RETURNTRANSFER, true);
        $response2 = curl_exec($handler);

        $response2 = json_decode($response2);
        $res_code = $response2[0];
        $res_data = $response2[1];
        $this->updateCounterSms($mobile);
    }
//    function updateCount($ids)
//    {
//        $id=join(',',$ids);
//        return $this->doselect("UPDATE tbl_tuition SET sms_count=sms_count+1 WHERE id IN (' . $id . ') ",array(),'',PDO::FETCH_COLUMN);
//    }
//    function giveMobileGetId()
//    {
//
//    }
}