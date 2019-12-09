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

    function index($edit='')
    {
        $data=array();
        if($edit!='') {
            $info = $this->modelobject->getMemberInfo($edit);
            $data = array('info' => $info);
        }
        $this->view('addMember/index', $data, 1, 1);
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
                $this->modelobject->uploadPersonalPic($userid['id']);
            }
            if($_POST['send_sms']==1)
                $this->modelobject->sendSms($_POST['mobile'],$_POST['family'],$userid['id']);

            header('location:' . URL . 'addmember/index?success=باموفقیت ثبت شد');
            return;
        }
        else
            header('location:' . URL . 'addmember/index?error=این شماره قبلا ثبت شده است');
        return;
    }

    function update($id)
    {
        $user=$this->modelobject->getMobile($id);
        $this->modelobject->updateInfo($id);
        $this->modelobject->updateTuition($id);

        if($user['mobile']!=$_POST['mobile']) {
            $userid = $this->modelobject->getUserId();
            if (empty($userid))
                $this->modelobject->updateMobile($id);
            else
                header('location:' . URL . 'addmember/index/'.$id.'?error=این شماره قبلا ثبت شده است');
        }
        if (!empty($_FILES['personal_pic'])) {
            $this->modelobject->uploadPersonalPic($id);
        }
        $countImg = count(array_filter(@$_FILES['pic']['name']));
        if (count(@$_FILES['pic']['name']) > 0) {
            $this->modelobject->uploadImg($countImg, $userid['id'],$id);
        }

        header('location:' . URL . 'addmember/index/'.$id.'?success=باموفقیت ثبت شد');
    }
}