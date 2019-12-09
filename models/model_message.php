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
        return $this->doselect("SELECT u.mobile FROM tbl_tuition AS t LEFT JOIN tbl_user AS u ON t.userId=u.id WHERE end_date<CURDATE() AND sms_count<3", array(), '', PDO::FETCH_COLUMN);
    }

    function sendSms($mobile, $text)
    {
        $check=$this->is_connected();
        if($check==1) {
            $url = "https://ippanel.com/services.jspd";

            $rcpt_nm = $mobile;
            $param = array
            (
                'uname' => 'faraz09196145343',
                'pass' => '0371477905',
                'from' => '+985000125475',
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
            return $res_data;
        }
    }
    function infoMessage ($res_data,$mobile){

        $sql="INSERT INTO tbl_message (balakcode,text,status,numbers,dataCreate,message_type) value(?,?,?,?,?,?)";
        $stmt = self::$conn->prepare($sql);
        $stmt->bindValue(1, $res_data);
        $stmt->bindValue(2, $_POST['text']);
        $stmt->bindValue(3, 3);
        $stmt->bindValue(4,sizeof($mobile));
        $stmt->bindValue(5,date('Y-m-d H:i:s'));
        $stmt->bindValue(6,$_POST['how_to']);
        $stmt->execute();

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