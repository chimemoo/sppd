<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Manage_partisipant extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
        $this->authenticated();

		$this->load->database();
		$this->load->helper('url');
        $this->load->model('usermodel');
        $this->load->model('Sppdmodel');

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

        public function create_sppd()
    {
        $data = [
            'title_page' => 'PertaminaEP | SPPD',
            'kode_page' => 'manage_sppd',
            'view' => 'page/admin/create_sppd'
        ];

        $this->load->view('template/template2',$data);
    }


    function create_sppd_process(){
        if($this->check_worker($this->input->post())){
            $data = $this->input->post();
            $data['wcspdmsspd'] = $this->session->username;
            $this->usermodel->add_sppd($data);
            redirect(base_url('Admin/Manage_partisipant/list_sppd'));
        }
        else{
            $this->session->set_flashdata('failed','The worker is not avalilable for that time!');
            redirect(base_url('Admin/Manage_partisipant/create_sppd'));
        }
    }

    public function list_sppd(){
        $data = [
            'title_page' => 'PertaminaEP | SPPD',
            'kode_page' => 'list_sppd',
            'view' => 'page/admin/list_sppd',
            'js' => 'page/admin/js_list_sppd'
        ];

        $data['list_worker'] = $this->usermodel->worker_list();
        $this->load->view('template/template2',$data);
    }

    function dtable_get_list(){
        $list = $this->Sppdmodel->get_datatables_admin();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            $no++;
            $row = array(); 
            $row[] = $no;
            $row[] = $field->fcspdmsspd;
            $row[] = $field->stspdmsspd;
            $row[] = $field->vdspdmsspd;
            $row[] = $field->dsspdmsspd;
            $row[] = '
                        <a class="btn btn-sm btn-success m-1" href="'.base_url('admin/manage_partisipant/edit_sppd').$field->nospdmsspd.'"><i class="fa fa-pencil"></i></a>
                        <a class="btn btn-sm btn-danger m-1" href="javascript:void(0)" title="Hapus" onclick="deleteSPPD('."'".$field->nospdmsspd."'".')"><i class="fa fa-trash"></i></a>
                ';
            $data[] = $row;
        }
 
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Sppdmodel->count_all($this->session->username),
            "recordsFiltered" => $this->Sppdmodel->count_filtered($this->session->username),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }


    function delete_sppd($id){
        if($this->Sppdmodel->delete_sppd($id)){
            return true;
        }
        else {
            return false;
        }
    }

    function check_worker($post_array){
        $worker_list = $post_array['wkspdmsspd'];
        $date_start = $post_array['dsspdmsspd'];
        $date_finish = $post_array['dfspdmsspd'];

        $wl = explode(",", $worker_list);
        foreach ($wl as $l) {
            if($this->check_date($l,$date_start,$date_finish)){
                $message = 'A participant with this firstname and lastname already exists';
            $this->form_validation->set_message('wkspdmsspd', $message);
                return false;
            }
            else {
                $message = 'Success';
            $this->form_validation->set_message('wkspdmsspd', $message);
                return true;
            }
        }

    }

    function check_date($id,$ds,$df){
        if($this->usermodel->filter_sppd($id,$ds, $df)){
            return true;
        }else {
            return false;
        }
    }

    function get_worker(){

        //MENDAPATKAN WORKER
        if (isset($_GET['q'])) {
            $worker_in_mswrk = $this->usermodel->search_worker($_GET['q']); // 
            foreach ($worker_in_mswrk as $row){
                $w_result[] = [
                    'id' => $row->idwrkmswrk,
                    'name'   => $row->nmwrkmswrk
                ];
            }

        }

        echo json_encode($w_result);
    }


    function get_function(){
        if (isset($_GET['term'])) {
            $result = $this->usermodel->search_function($_GET['term']);
            if (count($result) > 0) {
                foreach ($result as $row){
                    $arr_result[] = [
                        'data' => (int) $row->idfncmsfnc,
                        'value'   => $row->nmfncmsfnc
                    ];
                }
                echo json_encode($arr_result);
            }
        }
    }
    function get_vendor(){
        if (isset($_GET['term'])) {
            $result = $this->usermodel->search_vendor($_GET['term']);
            if (count($result) > 0) {
                foreach ($result as $row){
                    $arr_result[] = [
                        'data' => (int)$row->idvdrmsvdr,
                        'value'   => $row->nmvdrmsvdr
                    ];
                }
                echo json_encode($arr_result);
            }
        }
    }

    function manage_user(){
        if(! ($this->session->userdata('role') == 'admin'))
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
        $where = "msusr.lvusrmsusr='watcher' OR msusr.lvusrmsusr='leader'";
        $crud->where($where);
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
        $crud->field_type('lvusrmsusr','dropdown', array('leader'=>'leader','watcher'=>'watcher'));
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
        if(! ($this->session->userdata('role') == 'admin' ))
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
        if(! ($this->session->userdata('role') == 'admin'))
            redirect('auth');
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
