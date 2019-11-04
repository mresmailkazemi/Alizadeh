<?php
 class Addmember extends controller{

     function __construct()
     {

     }
     function index()
     {

         $this->view('addMember/index',array(),1,1);
     }


 }