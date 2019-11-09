<?php

class addmember extends controller
{
    /**
     * @var model_addMember
     */
    protected $modelobject;

    function __construct()
    {
        parent::__construct();
        session_start();
        if (!isset($_SESSION['admin']))

            header('location:' . URL . 'login/index');
    }

    function index()
    {

        $this->view('addMember/index', array(), 1, 1);
    }

    function insert()
    {
        $error = $this->modelobject->validation();
        if ($error != "") {
            header('location:' . URL . 'addmember/index?error=' . $error);
            return;
        }
        //$userid = $this->modelobject->getUserId();
        if (empty($userid)) {
            $this->modelobject->insertmobile();
            $userid = $this->modelobject->getUserId();
            $this->modelobject->forwardInfo($userid['id']);
            $this->modelobject->insertuition($userid['id']);
            $countImg = count(array_filter(@$_FILES['pic']['name']));
            if (count(@$_FILES['pic']['name']) > 0) {
                echo $countImg;
                       $this->modelobject->uploadImg($countImg, $userid['id']);
            }
       //     header('location:' . URL . 'Member/index?success=  با موفقیت ثبت شد');
         //   return;
        }
        //header('location:' . URL . 'addmember/index?error=این فرد قبلا ثبت نام شده است');
       // return;
    }
}