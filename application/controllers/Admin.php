<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');

		$this->load->library('grocery_CRUD');
    }

    public function index()
    {

    }

    function manage_user(){
        #AUTOMATION
        $crud = new grocery_CRUD();
        $crud->set_theme('tablestrap');
        $crud->set_table('msusr');
        $crud->columns('nmusrmsusr','fcusrmsusr','lvusrmsusr','emusrmsusr','hpusrmsusr');
        $crud->display_as('unusrmsusr','Username')
                ->display_as('pwusrmsusr','Password')
                ->display_as('nmusrmsusr','Nama User')
                ->display_as('fcusrmsusr','Function')
                ->display_as('lcusrmsusr','Location')
                ->display_as('lvusrmsusr','Level')
                ->display_as('ldusrmsusr','Leader')
                ->display_as('emusrmsusr','Email')
                ->display_as('hpusrmsusr','No Telp');
        $crud->set_subject('User');
        $crud->set_relation('fcusrmsusr','msfnc','nmfncmsfnc');
        $crud->set_relation('ldusrmsusr','msusr','nmusrmsusr', array('lvusrmsusr' => 'leader'));

        $output = $crud->render();

        #ADD DETAIL FUNCTION
        $data = [
            'title_page' => 'Manage User',
            'kode_page' => 'manage_user'
        ];
        $output->data = $data;
        $this->_example_output($output);

    }

    function manage_worker(){
        $crud = new grocery_CRUD();
        $crud->set_theme('tablestrap');
        $crud->set_table('mswrk');
        $crud->columns('nmwrkmswrk','fcwrkmswrk','glwrkmswrk','rtwrkmswrk','tlwrkmswrk');
        $crud->display_as('nmwrkmswrk','Nama Worker')
                ->display_as('fcwrkmswrk','Function')
                ->display_as('glwrkmswrk','Golongan')
                ->display_as('rtwrkmswrk','Rate')
                ->display_as('hpwrkmswrk','No. Hp')
                ->display_as('alwrkmswrk','Alamat')
                ->display_as('tlwrkmswrk','Tanggal Lahir');
        $crud->set_subject('Worker');
        $crud->set_relation('fcwrkmswrk','msfnc','nmfncmsfnc');
        $crud->set_relation('glwrkmswrk','msgol','nmgolmsgol');
        $output = $crud->render();
        $data = [
            'title_page' => 'Manage Worker',
            'kode_page' => 'manage_worker'
        ];
        $output->data = $data;
        $this->_example_output($output);
    }

    function manage_vendor(){
        //DATABASE BLM DIBIKIN!
    }

    public function _example_output($output = null)
	{
		$this->load->view('template/template.php',(array)$output);
	}

}

/* End of file Admin.php */

?>
