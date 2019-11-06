<?php
class Member extends controller{
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
return;
        }
    }

    function index()
    {
        $Member=$this->modelobject->getMember();
        $data=array($Member);
        $this->view('Member/index',$data,1,1);
    }


}
