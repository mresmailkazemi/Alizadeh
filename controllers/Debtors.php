<?php
class Debtors extends controller{


    function __construct()
    {
        parent::__construct();
        session_start();
        if (!isset($_SESSION['admin']))
            header('location:' . URL . 'login/index');
    }

    function index()
    {

        $this->view('Debtors/index',array(),1,1);
    }
}
