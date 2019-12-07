<?php
class Debtors extends controller{
    /**
     * @var model_Debtors
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
        if (isset($_GET['pageno'])) {
            $pageno = $_GET['pageno'];
        } else {
            $pageno = 1;
        }
        $offset = $this->modelobject->calcOffset($pageno, no_of_records_per_page);
        $total_page = $this->modelobject->totalPage();
        $Member = $this->modelobject->getDebtors();
        $data = array($Member, 'total_page' => $total_page, 'pageno' => $pageno);
        $this->view('debtors/index', $data, 1, 1);
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
        $this->view('debtors/index', $data, 1, 1);
    }
}
