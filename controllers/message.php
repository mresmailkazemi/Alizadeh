<?php
class message extends controller{

    function __construct()
    {
        parent::__construct();
    }
    function index(){


        $this->view('message/index',array(),1,1);
    }
}