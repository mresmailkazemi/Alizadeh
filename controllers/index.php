<?php

class index extends controller
{


    function __construct()
    {
        parent::__construct();

    }

    function index()
    {
//    $slider1=$this->modelobject->getslider1();
//    $slider2=$this->modelobject->getslider2();
//    $onlydigikala=$this->modelobject->only_digikala_slider();
//    $mostviewed=$this->modelobject->mostviewed();
//    $newproduct=$this->modelobject->newproduct();
//    $slider_items=$slider2[0];
//    $date_end=$slider2[1];
//
//    $data=[$slider1,$slider_items,$date_end,$onlydigikala,$mostviewed,$newproduct];
      $this->view('index/index');
    }




}

?>