<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Manage_partisipant extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
        $this->authenticated();

		$this->load->database();
		$this->load->helper('url');

		$this->load->library('grocery_CRUD');

    }

    public function authenticated(){ // Fungsi ini berguna untuk mengecek apakah user sudah login atau belum
        // Pertama kita cek dulu apakah controller saat ini yang sedang diakses user adalah controller Auth apa bukan
        // Karena fungsi cek login hanya kita berlakukan untuk controller selain controller Auth
        if($this->uri->segment(1) != 'auth' && $this->uri->segment(1) != ''){
            // Cek apakah terdapat session dengan nama authenticated
            if( ! $this->session->userdata('authenticated')) // Jika tidak ada / artinya belum login
                redirect('auth'); // Redirect ke halaman login
        }
    }


    public function index()
    {

    }

    function manage_user(){
        if(! ($this->session->userdata('role') == 'superadmin'))
            redirect('auth');
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
        $crud->set_rules('unusrmsusr','Username','required|is_unique[msusr.unusrmsusr]',array('is_unique' => 'The username is already exist'));
        $crud->set_rules('pwusrmsusr','Password','required');
        $crud->set_rules('nmusrmsusr','Nama lengkap','required');
        $crud->set_rules('lvusrmsusr','Level','required');
        $crud->set_rules('emusrmsusr','Email','valid_email');
        $crud->set_rules('hpusrmsusr','Nomor Hp','numeric');
        $crud->unique_fields(array('emusrmsusr'));
        $crud->change_field_type('pwusrmsusr','password')
            ->callback_before_insert(array($this,'encrypt_password_callback'));
        $output = $crud->render();

        #ADD DETAIL FUNCTION
        $data = [
            'title_page' => 'PertaminaEP | Master User',
            'kode_page' => 'manage_user'
        ];
        $output->data = $data;
        $this->_example_output($output);

    }

    function encrypt_password_callback($post_array, $primary_key = null)
    {
        $post_array['pwusrmsusr'] = md5($post_array['pwusrmsusr']);
        return $post_array;
    }

    function manage_worker(){
        if(! ($this->session->userdata('role') == 'admin'))
            redirect('auth');
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
            'title_page' => 'PertaminaEP | Master Worker',
            'kode_page' => 'manage_worker'
        ];
        $output->data = $data;
        $this->_example_output($output);
    }

    function manage_vendor(){
        //DATABASE BLM DIBIKIN!
        $crud = new grocery_CRUD();
        $crud->set_theme('tablestrap');
        $crud->set_table('msvdr');
        $crud->columns('nmvdrmsvdr','lcvdrmsvdr','hpvdrmsvdr','emvdrmsvdr');
        $crud->display_as('nmvdrmsvdr','Nama Vendor')
                ->display_as('lcvdrmsvdr','Location')
                ->display_as('dcvdrmsvdr','Description')
                ->display_as('hpvdrmsvdr','No Handphone')
                ->display_as('emvdrmsvdr','Email');
        $crud->set_subject('Vendor');
        $output = $crud->render();
        $data = [
            'title_page' => 'PertaminaEP | Master Vendor',
            'kode_page' => 'manage_vendor'
        ];
        $output->data = $data;
        $this->_example_output($output);
    }

    public function _example_output($output = null)
	{
		$this->load->view('template/template.php',(array)$output);
	}

}

/* End of file Controllername.php */
?>
