<?php

/**
 * Dashboard
 * Author : Hekky Nurhikmat
 */
class Dashboard extends MY_Controller
{

    function __construct()
    {
       parent::__construct();
       $this->account = $this->authentikasi();
    }

    public function index()
    {

        
        $this->load_theme("dashboard/index");
    }


}
