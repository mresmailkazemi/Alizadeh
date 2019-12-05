<?php
class message extends controller{

    function __construct()
    {
        parent::__construct();
        session_start();
        if (isset($_SESSION['admin']))
            header('location:' . URL . 'login/index');
    }

    function index(){


        $this->view('message/index',array(),1,1);
    }
}