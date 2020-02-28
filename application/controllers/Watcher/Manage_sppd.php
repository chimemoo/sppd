<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Manage_sppd extends CI_Controller {
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


     public function authenticated()
     { 
        // Fungsi ini berguna untuk mengecek apakah user sudah login atau belum
        // Pertama kita cek dulu apakah controller saat ini yang sedang diakses user adalah controller Auth apa bukan
        // Karena fungsi cek login hanya kita berlakukan untuk controller selain controller Auth
        if($this->uri->segment(1) != 'auth' && $this->uri->segment(1) != ''){
            // Cek apakah terdapat session dengan nama authenticated
            if( ! $this->session->userdata('authenticated')) // Jika tidak ada / artinya belum login
                redirect('auth'); // Redirect ke halaman login
        }
    }


    public function create_sppd()
    {
        $data = [
            'title_page' => 'PertaminaEP | SPPD',
            'kode_page' => 'manage_sppd',
            'view' => 'page/watcher/create'
        ];

        $this->load->view('template/template2',$data);
    }


    function create_sppd_process(){
        if($this->check_worker($this->input->post())){
            $data = $this->input->post();
            $data['ptspdmsspd'] = date('Y-m-d H:i:s');
            $data['wcspdmsspd'] = $this->session->username;
            $this->usermodel->add_sppd($data);
            redirect(base_url('watcher/manage_sppd/list_sppd'));
        }
        else{
            $this->session->set_flashdata('failed','The worker is not avalilable for that time!');
            redirect(base_url('watcher/Manage_sppd/create_sppd'));
        }
    }

    public function list_sppd(){
        $data = [
            'title_page' => 'PertaminaEP | SPPD',
            'kode_page' => 'list_sppd',
            'view' => 'page/watcher/list_sppd',
            'js' => 'page/watcher/js_list_sppd'
        ];

        $data['list_worker'] = $this->usermodel->worker_list();
        $this->load->view('template/template2',$data);
    }

    function dtable_get_list(){
        $list = $this->Sppdmodel->get_datatables($this->session->username);
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
                        <a class="btn btn-sm btn-success m-1" href="'.base_url('watcher/manage_sppd/edit_sppd').$field->nospdmsspd.'"><i class="fa fa-pencil"></i></a>
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

}

/* End of file Manage_sppd.php */
