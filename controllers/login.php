<?php

class login extends Controller
{
    /**
     * @var model_login
     */
    protected $modelobject;
    function __construct()
    {
        parent::__construct();
        session_start();
        if (isset($_SESSION['admin']))
            header('location:' . URL . 'admincreate/index');
        elseif (isset($_SESSION['operator']))
            header('location:' . URL . 'operatorsalt/index');
    }

    function index()
    {

        $data = array('');
        $this->view('login/index', $data, 1, 1);
    }
    function logout()
    {
            session_destroy();
            header('location:' . URL . 'index');
    }

    function checkUser()
    {
        $error = $this->modelobject->validation();
        if ($error != "") {
            header('location:' . URL . 'login/index?error=' . $error);
            return;
        }
     $result= $this->modelobject->checkUser();
        if(sizeof($result)>0){
            $login= $this->modelobject->goCheckPass($result);
            if($login==1){
                header('location:' . URL . 'index/index');
            }else
                header('location:' . URL . 'index/index?error=نام کاربری یا کلمه عبور اشتباه است');
        } else
            header('location:' . URL . 'index/index?error=نام کاربری یا کلمه عبور اشتباه است');
    }
}

