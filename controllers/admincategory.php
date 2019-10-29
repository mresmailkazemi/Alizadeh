<?php

class Admincategory extends controller {


    function __construct()
    {
        parent::__construct();
    }

    function index(){

        $category=$this->modelobject->getcategory();
        $data=['category'=>$category];
        $this->view('admin/category/index',$data);
    }

    function showchild($idcategory){

        $child=$this->modelobject->getchild($idcategory);
        $parents=$this->modelobject->getparent($idcategory);
        $categoryinfo=$this->modelobject->categoryinfo($idcategory);
        $data=['categoryinfo'=>$categoryinfo,'category'=>$child,'parents'=>$parents];
        $this->view('admin/category/index',$data);

    }
}



?>
