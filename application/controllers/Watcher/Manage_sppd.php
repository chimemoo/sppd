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


    public function create_sppd()
    {
        $data = [
            'title_page' => 'PertaminaEP | SPPD',
            'kode_page' => 'manage_sppd'
        ];

        $data['list_worker'] = $this->usermodel->worker_list();
        $this->load->view('template/template2',$data);
    }

    function get_worker(){
        // MEMISAH TANGGAL
        if (isset($_GET['date'])) {
            $date = $_GET['date'];
            $pisah = explode('-',$date);
            $start_date = $pisah[0];
            $end_date = $pisah[1];
            $start_date = date("Y-m-d H:i:s", strtotime($start_date));
            $end_date = date("Y-m-d H:i:s", strtotime($end_date));
        }

        //MENDAPATKAN WORKER
        if (isset($_GET['term'])) {
            $worker_in_mswrk = $this->usermodel->search_worker($_GET['term']); // Mencari worker pada mswrk
            if (count($worker_in_mswrk) > 0) {
                //$sppd_that_accepted = $this->usermodel->filter_sppd($worker_in_mswrk); //Mencari sppd yang diterima dan nama workernya sama
                foreach ($worker_in_mswrk as $row){
                    $arr_result[] = $row->nmwrkmswrk;
                    $id_result[]  = $row->idwrkmswrk;
                }
            }
        }
        $no = 0;
        foreach ($id_result as $nr){
            if($this->usermodel->filter_sppd($nr,$start_date, $end_date)){
                $w_result[] = $arr_result[$no];
            }
            $no++;
        }


        echo json_encode($w_result);
    }

    function get_function(){
        if (isset($_GET['term'])) {
            $result = $this->usermodel->search_function($_GET['term']);
            if (count($result) > 0) {
            foreach ($result as $row)
                $arr_result[] = $row->nmfncmsfnc;
                echo json_encode($arr_result);
            }
        }
    }
    function get_vendor(){
        if (isset($_GET['term'])) {
            $result = $this->usermodel->search_vendor($_GET['term']);
            if (count($result) > 0) {
            foreach ($result as $row)
                $arr_result[] = $row->nmvdrmsvdr;
                echo json_encode($arr_result);
            }
        }
    }

    public function index(){
        echo "test";
    }


    public function _example_output($output = null)
    {
        $this->load->view('template/template.php',(array)$output);
    }

    function add_sppd(){
        $data = [
            'nmspd' => $this->input->post('worker')
        ];
    }

}

/* End of file Manage_sppd.php */
