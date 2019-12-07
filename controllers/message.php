<?php

class message extends controller
{
    /**
     * @var model_message
     */
    protected $modelobject;

    function __construct()
    {
        parent::__construct();
        session_start();
        if (!isset($_SESSION['admin']))
            header('location:' . URL . 'login/index');
    }

    function index()
    {
        $this->view('message/index', array(), 1, 1);
    }

    function send()
    {

        if ($_POST['how_to'] == 2)
            $mobile = $this->getMemberMobile();
        else
            $mobile = $this->getDebtorsMobile();

       $check=$this->checkMobile($mobile);
if($check){
        $result = $this->modelobject->sendSms($mobile, $_POST['text']);
        if (!empty($result) && $result!=0) {
            $this->modelobject->infoMessage($result, $mobile);
            header('location:' . URL . 'message/index?success=پیام شما با موفقیت ارسال شد');
        }
}
    }

    function getMemberMobile()
    {
        return $this->modelobject->getMobileAllMember();
    }

    function getDebtorsMobile()
    {
        return $this->modelobject->getMobileDebtorMember();
    }

    function checkMobile($mobile)
    {
        if (empty($_POST['text']) || empty($mobile)) {
            header('location:' . URL . 'message/index?error=گیرنده یا متن پیام یافت نشد');
            return false;
        }
        return true;

    }
}