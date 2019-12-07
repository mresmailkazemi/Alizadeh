<?php

class Member extends controller
{
    /**
     * @var model_member
     */
    protected $modelobject;

    function __construct()
    {
        parent::__construct();
        session_start();
        if (!isset($_SESSION['admin'])) {
            header('location:' . URL . 'login/index');
        }
    }

    function index()
    {
        if (isset($_GET['pageno'])) {
            $pageno = $_GET['pageno'];
        } else {
            $pageno = 1;
        }
        $offset = $this->modelobject->calcOffset($pageno, no_of_records_per_page);
        $total_page = $this->modelobject->totalPage();
        $Member = $this->modelobject->getMember();
        $data = array($Member, 'total_page' => $total_page, 'pageno' => $pageno);
        $this->view('Member/index', $data, 1, 1);
    }

    function Delete()
    {
        $this->modelobject->goDelete();
        header('location:' . URL . 'Member/index');
    }

    function Archive()
    {
        $this->modelobject->goArchive();
        header('location:' . URL . 'Member/index');
    }

    function Inactive()
    {
        $this->modelobject->goInactive();
        header('location:' . URL . 'Member/index');
    }

    function Active()
    {
        $this->modelobject->goActive();
        header('location:' . URL . 'Member/index');
    }

    function search()
    {
        if (isset($_GET['pageno'])) {
            $pageno = $_GET['pageno'];
        } else {
            $pageno = 1;
        }
        $offset = $this->modelobject->calcOffset($pageno, no_of_records_per_page);
        $salter = $this->modelobject->searchUser(@$_POST['id'], @$_POST['mobile'], @$_POST['name'], @$_POST['family'], @$_POST['end_date'], @$_POST['status']);
        $total_page = $this->modelobject->totalPage();

        $data = array(0 => $salter, 'total_page' => $total_page, 'pageno' => $pageno);
        $this->view('Member/index', $data, 1, 1);
    }
}
