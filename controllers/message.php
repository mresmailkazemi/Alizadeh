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
        $this->modelobject->sendSms($this->getMemberMobile(),$_POST['text']);
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