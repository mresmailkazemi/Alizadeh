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
        $userid = $this->modelobject->getUserId();
        if (empty($userid)) {
            $this->modelobject->insertmobile();
            $userid = $this->modelobject->getUserId();
            $this->modelobject->forwardInfo($userid['id']);
            $this->modelobject->insertuition($userid['id']);
            $countImg = count(array_filter(@$_FILES['pic']['name']));
            if (count(@$_FILES['pic']['name']) > 0) {
                       $this->modelobject->uploadImg($countImg, $userid['id']);
            }
            if (!empty($_FILES['personal_pic'])) {
                echo "asd";
                $this->modelobject->uploadPersonalPic($userid['id']);
            }
          //  header('location:' . URL . 'addmember/index?success=باموفقیت ثبت شد');
        }else
            header('location:' . URL . 'addmember/index?error=این شماره قبلا ثبت شده است');
    }
}