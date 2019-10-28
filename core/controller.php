<?php

class Controller{

    function __construct()
    {
    }

    function view($viewUrl,$data=array(),$noIncloudheader='',$noIncloudfooter=''){

        if($noIncloudheader==''){
            require 'header.php';

        }


        require ('views/'.$viewUrl.'.php');

        if($noIncloudfooter==''){
            require 'footer.php';
        }



    }
    function model($modelUrl){

        require ('models/model_'.$modelUrl.'.php');
        $classname='model_'.$modelUrl;
        $this->modelobject=new $classname;
    }

}
