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

    function sendAll()
    {
        $this->modelobject->sendSms($this->getMemberMobile());
    }

    function sendDebtors()
    {
        $this->modelobject->sendSms($this->getMemberMobile());
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