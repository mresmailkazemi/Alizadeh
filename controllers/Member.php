<?php

class Member extends controller
{
    /**
     * @var model_member
     */
    protected $modelobject;

    function __construct()
    {
        parent::__construct();
        session_start();
        if (!isset($_SESSION['admin'])) {
            header('location:' . URL . 'login/index');
        }
    }

    function index()
    {
        $Member = $this->modelobject->getMember();
        $data = array($Member);
        $this->view('Member/index', $data, 1, 1);
    }

    function Delete()
    {
        $this->checkChoose();
        $this->modelobject->goDelete();
        header('location:' . URL . 'Member/index');
    }
    function Archive()
{
    $this->checkChoose();
    $this->modelobject->goArchive();
    header('location:' . URL . 'Member/index');
}
    function Inactive()
    {
        $this->checkChoose();
        $this->modelobject->goInactive();
        header('location:' . URL . 'Member/index');
    }
    function Active()
    {
        $this->checkChoose();
        $this->modelobject->goActive();
        header('location:' . URL . 'Member/index');
    }
    function checkChoose(){
       if( empty($_POST['delitem']))
           header('location:' . URL . 'Member/index');
    }
}
