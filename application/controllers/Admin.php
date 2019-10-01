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

        $this->_example_output($output);

    }

    public function _example_output($output = null)
	{
		$this->load->view('example.php',(array)$output);
	}

}

/* End of file Admin.php */

?>