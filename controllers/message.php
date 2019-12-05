<?php
class message extends controller{
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

    function index(){
        $this->view('message/index',array(),1,1);
    }
    function getMember(){
        return $this->modelobject->getMobileAllMember();
    }
}