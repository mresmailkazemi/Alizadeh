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
        print_r($this->getDebtorsMobile());
        $this->view('message/index', array(), 1, 1);
    }

    function send()
    {
        if ($_POST['how_to'] == 2)
            $mobile = $this->getMemberMobile();
        else
            $mobile = $this->getDebtorsMobile();
        $this->modelobject->sendSms($mobile, $_POST['text']);

    }

    function getMemberMobile()
    {
        return $this->modelobject->getMobileAllMember();
    }

    function getDebtorsMobile()
    {
        return $this->modelobject->getMobileDebtorMember();
    }
}