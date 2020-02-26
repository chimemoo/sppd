<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Manage_information extends CI_Controller {

    public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');

		$this->load->library('grocery_CRUD');

        if($this->session->userdata('role') == 'admin' || 'superadmin'){ 
        }elseif ($this->session->userdata('role') == '') {
            redirect('auth/login'); 
        }else{
             redirect('auth/login'); 
        }

    }

    public function index()
    {
        
    }

    function manage_function(){
        //DATABASE BLM DIBIKIN!
        $crud = new grocery_CRUD();
        $crud->set_theme('tablestrap');
        $crud->set_table('msfnc');
        $crud->columns('nmfncmsfnc');
        $crud->display_as('nmfncmsfnc','Nama Function');
        $crud->set_subject('Function');
        $output = $crud->render();
        $data = [
            'title_page' => 'PertaminaEP | Master Function',
            'kode_page' => 'manage_function'
        ];
        $output->data = $data;
        $this->_example_output($output);
    }

    function manage_golongan(){
        //DATABASE BLM DIBIKIN!
        $crud = new grocery_CRUD();
        $crud->set_theme('tablestrap');
        $crud->set_table('msgol');
        $crud->columns('nmgolmsgol');
        $crud->display_as('nmgolmsgol','Nama Golongan');
        $crud->set_subject('Golongan');
        $output = $crud->render();
        $data = [
            'title_page' => 'PertaminaEP | Master Golongan',
            'kode_page' => 'manage_golongan'
        ];
        $output->data = $data;
        $this->_example_output($output);
    }

    function manage_tarif(){
        $crud = new grocery_CRUD();
        $crud->set_theme('tablestrap');
        $crud->set_table('mstrf');
        $crud->columns('jktrfmstrf','tftrfmstrf','sttrfmstrf','dttrfmstrf');
        $crud->display_as('jktrfmstrf','Jarak')
        ->display_as('tftrfmstrf','Tarif')
        ->display_as('sttrfmstrf','Kota Asal')
        ->display_as('dttrfmstrf','Kota Tujuan');
        $crud->set_subject('Tarif');
        $output = $crud->render();
        $data = [
            'title_page' => 'PertaminaEP | Master Tarif',
            'kode_page' => 'manage_tarif'
        ];
        $output->data = $data;
        $this->_example_output($output);
    }

    

    public function _example_output($output = null)
	{
		$this->load->view('template/template.php',(array)$output);
	}

}

/* End of file Manage_information.php */
