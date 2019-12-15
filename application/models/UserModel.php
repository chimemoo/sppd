<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class UserModel extends CI_Model {
    
    public function get($unusrmsusr){
        $this->db->where('unusrmsusr', $unusrmsusr); // Untuk menambahkan Where Clause : username='$username'
        $result = $this->db->get('msusr')->row(); // Untuk mengeksekusi dan mengambil data hasil query
        return $result;
    }


    public function worker_list(){
    	$this->db->select('nmwrkmswrk');
		$query = $this->db->get('mswrk');

		return $query;
    }

    function search_worker($title){
        $this->db->like('nmwrkmswrk', $title , 'both');
        $this->db->limit(10);
        return $this->db->get('mswrk')->result();
    }

    function search_function($title){
        $this->db->like('nmfncmsfnc', $title , 'both');
        $this->db->limit(10);
        return $this->db->get('msfnc')->result();
    }

    function search_vendor($title){
        $this->db->like('nmvdrmsvdr', $title , 'both');
        $this->db->limit(10);
        return $this->db->get('msvdr')->result();
    }
}
