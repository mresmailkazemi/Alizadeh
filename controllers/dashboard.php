<?php
class dashboard extends controller
{


    function __construct()
    {
        parent::__construct();
    }

    function index()
    {

        $this->view('dashboard/index',array(),1,1);
    }
}