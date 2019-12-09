<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Manage_sppd extends CI_Controller {

    public function create_sppd()
    {
        $data = [
            'title_page' => 'PertaminaEP | SPPD',
            'kode_page' => 'manage_sppd'
        ];
        $this->load->view('template/template2',$data);
    }

    public function index(){
        echo "test";
    }

}

/* End of file Manage_sppd.php */
