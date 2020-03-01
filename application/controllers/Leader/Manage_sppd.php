<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Manage_sppd extends CI_Controller {

    public function __construct()
	{
		parent::__construct();

		$this->load->database();
        $this->load->helper('url');
        $this->load->model('usermodel');
        

		$this->load->library('grocery_CRUD');

        if($this->session->userdata('role') == 'leader'){ 
        }elseif ($this->session->userdata('role') == '') {
            redirect('auth/login'); 
        }else{
             redirect('auth/login'); 
        }

    }

    public function manage_sppd()
    {
        $crud = new grocery_CRUD();
        $crud->set_theme('tablestrap');
        $crud->set_table('msspd');
        $crud->columns('vdspdmsspd','stspdmsspd','wcspdmsspd','dsspdmsspd','dfspdmsspd');
        $crud->display_as('vdspdmsspd','Vendor')
        ->display_as('wkspdmsspd','Worker')
        ->display_as('stspdmsspd','Status')
        ->display_as('wcspdmsspd','Watcher')
        ->display_as('dsspdmsspd','Date Start')
        ->display_as('dfspdmsspd','Date Finish')
        ->display_as('ptspdmsspd','Proposed Time')
        ->display_as('atspdmsspd','Aproved Time')
        ->display_as('ldspdmsspd','Leader')
        ->display_as('rsspdmsspd','Reason')
        ->display_as('wwspdmsspd','Work/Week')
        ->display_as('tfspdmssdp','Tarif')
        ->display_as('amspdmsspd','Amount');
        
        $crud->set_subject('Management SPPD');
        $crud->callback_read_field('wkspdmsspd',array($this,'getWorker'));

        $crud->add_action('', 'Approve', 'leader/manage_sppd/approve','glyphicon glyphicon-check');

        $crud->unset_add();
        $crud->unset_edit();
        $output = $crud->render();
        $data = [
            'title_page' => 'PertaminaEP | Master SPPD',
            'kode_page' => 'manage_sppd'
        ];
        $output->data = $data;
        $this->_example_output($output);
    }

    function getWorker($workerlist,$row){
        $data = explode(',',$workerlist);
        foreach($data as $dat){
            $wldump = $this->usermodel->getWorker($dat);
            $wl[] = $wldump[0]['nmwrkmswrk'];
        }
        $new = implode($wl,',');
        return $new;
    }

    function approve($id){
        $data = [
            'title_page' => 'PertaminaEP | SPPD',
            'kode_page' => 'approve_sppd',
            'view' => 'page/leader/approve_sppd',
            'tarif' => $this->usermodel->getTarif(),
            'idSppd' => $id
        ];

        $data['sppd_detail'] = $this->usermodel->sppdDetail($id);
        $this->load->view('template/template2',$data);
    }

    function approve_process($id){
        $data = [
            'tfspdmsspd' => $this->input->post('tfspdmssdp'),
            'amspdmsspd' => $this->input->post('amspdmsspd'),
            'stspdmsspd' => 'Sudah',
            'atspdmsspd' => date('Y-m-d H:i:s')
        ];
        if($this->input->post('approve') == 'Approve'){
            if($this->usermodel->approve($data,$id)){
                redirect(base_url('leader/manage_sppd/manage_sppd'));
            }
        }
        else {
            if($this->usermodel->decline($data,$id)){
                redirect(base_url('leader/manage_sppd/manage_sppd'));
            }
        }
    }

    public function _example_output($output = null)
	{
		$this->load->view('template/template.php',(array)$output);
    }
    



}

/* End of file Manage_sppd.php */
