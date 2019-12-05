<?php

class model_option extends model{


    function __construct()
    {
        parent::__construct();
    }
     function option()
    {
        $query = 'SELECT * FROM tbl_option';
        $stmt = $this->doselect($query);
        $options = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $options_arr = array();
        foreach ($options as $row) {
            $option = $row['setting'];
            $value = $row['value'];
            $options_arr[$option] = $value;           //create  array  custom
        }
        return $options_arr;
    }

}