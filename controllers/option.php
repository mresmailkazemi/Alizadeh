<?php
class option extends controller{


    function __construct()
    {
        parent::__construct();
    }

function index(){

        $this->view('option/index',array(),1, 1);
}

}