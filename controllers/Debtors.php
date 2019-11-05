<?php
class Debtors extends controller{


    function __construct()
    {
        parent::__construct();
    }

    function index()
    {

        $this->view('Debtors/index',array(),1,1);
    }
}
