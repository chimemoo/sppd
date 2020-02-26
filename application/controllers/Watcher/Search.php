<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller {
     public function __construct()
    {
        parent::__construct();
        $this->load->helper('url_helper');
        $this->load->helper('form');
        $this->load->database();
    }

    public function autocomplete(){
        $this->load->view('template/template2',$data);
    }
 


    public function search_worker(){

        $term = $this->input->get('term');
 
        $this->db->like('nmwrkmswrk', $term);
        
        $data = $this->db->get("mswrk")->result();
        echo json_encode($date);
    }


}

/* End of file Manage_sppd.php */
