<?php
class Member extends controller{
    /**
     * @var model_member
     */
    protected $modelobject;
    function __construct()
    {
        parent::__construct();
    }
    function index()
    {
        $Member=$this->modelobject->getMember();
        $data=array($Member);
//        print_r($data);
//        $this->view('Member/index',$data,1,1);
    }


}
